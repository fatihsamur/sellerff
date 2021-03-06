<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\Order;
use App\Model\UserInvoice;
use App\Model\User;
use App\Model\Box;
use App\Model\UserActivity;
use App\Model\Country;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Str;
use App\Jobs\SendOrderProcessing;
use App\Jobs\SendOrderCompleted;
use App\Jobs\SendMissingFields;
use App\Jobs\SendMissingBoxLabel;

class StatusChange extends BaseComponent
{
    public $order_id;
    public $status;
    public $referrer_url;

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $order = Order::with('order_items')->find($this->order_id);
        $this->status = $order->status;
    }


    public function render()
    {
        $order = Order::with('order_items')->find($this->order_id);
        return view('livewire.status-change', compact('order'));
    }

    public function updateStatus()
    {
        $this->validate([
      'status' => 'required',
    ]);


        $order = Order::with('order_items')->find($this->order_id);

        $user = User::find($order->user_id);
        if ($this->status == 'Koli Etiketi Bekliyor' && !$order->boxes()->exists()) {
            $this->alert('error', 'Henüz Koli Atanmamış!', [
        'position' => 'top-end',
        'timeout' => 3000,
        'toast' => true,
        'timerProgressBar' => true,
      ]);
            return;
        }

        if ($this->status == 'Koli Etiketi Bekliyor') {
            if (app()->environment('production')) {
                SendMissingBoxLabel::dispatch($user->email, $order->id, $user->name);
                $order->missing_box_label_sent = true;
                $order->update();
            }
        }

        if ($this->status != 'İptal Edildi' && $order->status == 'Ödeme Bekliyor') {
            $this->alert('error', 'Ödemesi Tamamlanmamış Ürün', [
      'position' => 'top-end',
      'timeout' => 3000,
      'toast' => true,
      'timerProgressBar' => true,
    ]);
            return;
        }

        if ($order->status == 'Tamamlandı' && $this->status == 'İptal Edildi') {
            $this->alert('error', 'Tamamlanmış Siparişlerde İşlem Yapılamaz', [
            'position' => 'top-end',
            'timeout' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
          ]);
            return;
        }
        $order->status = $this->status;
        $user = User::find($order->user_id);
        $order->save();
        if ($order->status == 'Tamamlandı') {
            $client = new Party([
        'name'          => 'BRK EXPRESS LLC SELLERFULFILMENT',
        'phone'         => '+ 1 (786) 238-5215',
        'email'         => 'support@sellerfulfilment.com',
        'address'      => '5659 W TAYLOR ST CHICAGO,IL 60644',
        'custom_fields' => [
          'website'        => 'www.sellerfulfilment.com',
        ],
      ]);

            $customer = new Party([
        'name'          => $order->user->name,
        'email'       => $order->user->email,
        'custom_fields' => [
          'order number' => $order->id,
          'box id list' => $order->boxes()->pluck('id')->implode(', '),
          'tracking number' => Box::where('order_id', $order->id)->pluck('tracking_number')->implode(', ') ?? ''
        ],
        'address'      => implode(' ', $order->user->billing_address())

      ]);
            $country = Country::where('id', $order->service_country_id)->pluck('country_code')->first();
            $invoice_items = [];
            $total_quantity = 0;
            foreach ($order->order_items as $order_item) {
                $invoice_items[] = (new InvoiceItem())->title(Str::limit($order_item->product_name, 25) . ' ' . $order_item->unique_identifier)
          ->pricePerUnit(0)
          ->quantity($order_item->quantity);
                $total_quantity += $order_item->quantity;
            }


            $prep_fee = $total_quantity * setting('shipping.default_label_service_price');
            $shipping_fee = abs($order->order_total - $prep_fee);


            if ($country == 'us') {
                $invoice_items[] = (new InvoiceItem())->title('Total Prep Fee')->pricePerUnit($shipping_fee)->quantity(1);
            }
            if ($country == 'ca') {
                $invoice_items[] = (new InvoiceItem())->title('Total Prep Fee')->pricePerUnit((int) setting('shipping.default_label_service_price'))->quantity($total_quantity);
                $invoice_items[] = (new InvoiceItem())->title('Total Shipping Fee')->pricePerUnit($shipping_fee)->quantity(1);
            }


            $notes = [
        'Thank you for your business!',
      ];
            $notes = implode("<br>", $notes);

            $user_invoice = new UserInvoice();
            $user_invoice->user_id = $order->user_id;
            $user_invoice->box_id = $order->boxes()->get()->implode(', ');
            $user_invoice->invoice_date = now();
            $user_invoice->invoice_amount = $order->order_total;
            $user_invoice->save();



            $invoice = Invoice::make('invoice')
        ->series('A')
        ->sequence($user_invoice->id)
        ->serialNumberFormat('{SERIES}/{SEQUENCE}')
        ->seller($client)
        ->buyer($customer)
        ->date(now())
        ->dateFormat('m/d/Y')
        ->currencySymbol('$')
        ->currencyCode('USD')
        ->currencyFormat('{SYMBOL}{VALUE}')
        ->currencyThousandsSeparator('.')
        ->currencyDecimalPoint(',')
        ->filename($user_invoice->id)
        ->addItems($invoice_items)
        ->notes($notes)
        ->logo(public_path('logos/seller_logo.png'))
        ->save('invoices');

            $user_invoice->invoice_number = $invoice->getSerialNumber();
            $user_invoice->save();
        }



        if ($order->status == 'Eksik Bilgileri Tamamlayın') {
            if (app()->environment('production')) {
                SendMissingFields::dispatch($user->email, $order->id, $user->name);
                $order->missing_field_sent = true;
                $order->update();
            }
        }

        if ($order->status == 'Depoda İşleniyor') {
            if (app()->environment('production')) {
                SendOrderProcessing::dispatch($user->email, $order->id);
            }
        }
        if ($order->status == 'Tamamlandı') {
            if (app()->environment('production')) {
                SendOrderCompleted::dispatch($user->email, $order->id, $user->name);
            }
        }


        if ($this->status == 'İptal Edildi') {
            $user = User::find($order->user_id);
            $old_balance = $user->balance;
            $user->balance += $order->order_total;
            $user->save();

            UserActivity::create([
            'user_id' => $order->user_id,
            'activity_type' => 'Sipariş İadesi Yapıldı',
            'activity_data' => json_encode([
              'order' => $order->id,
              'price' => $order->order_total,
              'old_balance' => $old_balance,
              'new_balance' => $user->balance

            ])
          ]);
        }

        return $this->successAlert('Ürün Durumu Başarıyla Güncellendi.', $this->referrer_url);
    }
}
