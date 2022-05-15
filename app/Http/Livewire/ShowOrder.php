<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerAddedBoxLabel;
use App\Model\UserActivity;
use App\Model\Order;
use App\Mail\ProductsArrived;
use App\Model\User;

class ShowOrder extends Component
{
    use WithFileUploads;
    use LivewireAlert;


    public $orderId;
    public $boxLabels;
    public $referrer_url;
    public $sktRequired = [];
    public function mount()
    {
        $orders = Order::with(['order_items'])->get();
        foreach ($orders as $order) {
            foreach ($order->order_items as $item_key => $order_item) {
                $this->sktRequired[$order_item->order_id][$item_key] = $order_item->skt_required;
            }
        }
        $this->referrer_url = request()->headers->get('referer');
    }
    public function updatingSktRequired($name, $value)
    {
        $order_arr = explode('.', $value);
        $order_items = Order::find($order_arr[0])->order_items()->get();
        foreach ($order_items as $order_itemkey => $order_item) {
            if ($order_itemkey == $order_arr[1]) {
                $order_item->skt_required = !$order_item->skt_required;
                $order_item->save();
            }
        }
    }
    public function render()
    {
        $order = \App\Model\Order::with(['order_items', 'boxes.order_items', 'boxes.box_items.order_item'])->find($this->orderId);
        return view('livewire.show-order', compact('order'));
    }


    public function updateBoxLabel($boxId)
    {
        $this->validate(
            [
        'boxLabels' => 'required|array|min:1',
        'boxLabels.*' => 'required|mimes:pdf|max:10000',
      ]
        );
        $box = \App\Box::find($boxId);
        $boxLabelNames = [];

        foreach ($this->boxLabels as $key => $boxLabel) {
            $boxLabel->storeAs('public/boxlabels', $box->id . '_' . $key . '.pdf');
            $boxLabelNames[] = $box->id . '_' . $key . '.pdf';
        }

        Mail::to(env('SF_WAREHOUSE_MAIL'))->send(new CustomerAddedBoxLabel(['order_id' => $this->orderId ]));

        $box->box_label = json_encode($boxLabelNames);
        $box->save();

        $this->flash('success', 'Koli Etiketleri Yüklendi.', [
      'position' => 'top-end',
      'timer' => 5000,
      'toast' => true,
      'timerProgressBar' => true,
    ], $this->referrer_url);
    }

    public function payOrder()
    {
        $order = \App\Model\Order::find($this->orderId);


        $user = auth()->user();
        if ($user->balance > $order->order_total) {
            $user_old_balance = $user->balance;
            $price = $order->order_total;
            $order_id =$order->id;
            $user->balance -= $order->order_total;
            $user->save();
            $order->paid = 1;
            $order->save();

            if (!$order->anyFnskuOrLabelMissing() && !$order->anyMissingBuyerOrderId() && $order->paid) {
                $order->status = 'Kargo Bekleniyor';
                $order->save();
            }
            if ($order->anyFnskuOrLabelMissing() || $order->anyMissingBuyerOrderId()) {
                $order->status = 'Eksik Bilgileri Tamamlayın';
                $order->save();
            }

            UserActivity::create([
              'user_id' => auth()->user()->id,
              'activity_type' => 'Sipariş Ödemesi Yapıldı',
              'activity_data' => json_encode(['old_balance' => number_format($user_old_balance, 2), 'new_balance' => number_format(auth()->user()->balance, 2), 'price' => number_format($price, 2), 'order_id' => $order_id]),
            ]);

            return $this->flash('success', 'Sipariş Ödemesi Tamamlandı.', [
              'position' => 'top-end',
              'timer' => 5000,
              'toast' => true,
              'timerProgressBar' => true,
            ], $this->referrer_url);
        }

        return $this->flash('warning', 'Yetersiz Bakiye.', [
          'position' => 'top-end',
          'timer' => 5000,
          'toast' => true,
          'timerProgressBar' => true,
        ], $this->referrer_url);
    }

    public function productsArrived($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        Mail::to(env('SF_WAREHOUSE_MAIL'))->send(new ProductsArrived(['order_number' => $order->id ,'user' => $user->name]));
        $this->flash('success', 'Depo Ürünlerinizle İlgili Bilgilendirilmiştir.', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true,
      ], $this->referrer_url);
    }
}
