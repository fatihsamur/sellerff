<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Order;
use App\OrderItem;
use App\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderItemsUpdated;
use App\UserActivity;

class EditOrder extends Component
{
    use LivewireAlert;
    public $order_id;
    public $order;
    public $order_model;
    public $referrer_url;



    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $order_model = Order::with(['country','order_items'])->find($this->order_id);

        $order = $order_model->toArray();

        $this->order_model = $order_model;
        $this->order = $order;
    }

    public function render()
    {
        return view('livewire.edit-order');
    }



    public function editOrder()
    {
        $user = User::find($this->order_model->user_id);
        $total_weight = 0;
        $total_quantity = 0;
        $total_price = 0;
        $total_prime = 0;
        $priceIncreased = null;
        $total_weight_f = 0;

        foreach ($this->order['order_items'] as $order_item) {
            $weight = $order_item['weight'];
            $height = $order_item['height'];
            $length = $order_item['length'];
            $width = $order_item['width'];
            $dimensional_weight = ($length * $width * $height) / 139;
            $base_weight = $weight > $dimensional_weight ? $weight : $dimensional_weight;
            $total_weight +=  $base_weight * $order_item['quantity'];
            $total_quantity += $order_item['quantity'];
            $total_weight_f += $base_weight * $order_item['quantity'];
        }



        //set prices for canada
        if ($this->order['country']['country_code'] == 'ca') {
            $label_price = setting('shipping.default_label_service_price_for_canada');
            $shipping_price = setting('shipping.default_measure_based_service_price_for_canada');
            $default_shipping_service_price = setting('shipping.default_shipping_service_price_for_canada');


            $total_price =
            ($total_weight * $shipping_price)
            + ($total_quantity * $label_price)
            + $default_shipping_service_price;

            $total_prime = $total_price -  ($total_price / 100
            * setting('marketing.prime_discount_rate'));



            $total_prime = $total_prime;
            $total_price_basic = $total_price;

            if ($user->isPrime()) {
                $total_price = $total_prime;
            } else {
                $total_price = $total_price;
            }
        }

        //set prices for usa
        if ($this->order['country']['country_code'] == 'us') {
            $label_price = setting('shipping.default_label_service_price_for_usa');
            $shipping_price = setting('shipping.default_measure_based_service_price_for_usa');
            $default_shipping_service_price = setting('shipping.default_shipping_service_price_for_usa');


            $total_price =
            ($total_weight * $shipping_price)
            + ($total_quantity * $label_price)
            + $default_shipping_service_price;

            $total_prime = $total_price -  ($total_price / 100
            * setting('marketing.prime_discount_rate'));


            $total_prime = $total_prime;
            $total_price_basic = $total_price;

            if ($user->isPrime()) {
                $total_price = $total_prime;
            } else {
                $total_price = $total_price;
            }
        }


        if ($total_weight_f > 50) {
            $total_box_count = ceil($total_weight_f / 50);
            $extra_box_count = ceil($total_weight_f / 50) - 1;
            $extra_box_setting = $this->order['country'] == 'us' ? setting('shipping.default_shipping_service_for_extrabox_price_for_usa') : setting('shipping.default_shipping_service_for_extrabox_price_for_canada');
            $extra_charge_amount = $extra_box_count * $extra_box_setting;
            $total_price += $extra_charge_amount;
            $total_prime += $extra_charge_amount;
            $total_price_basic += $extra_charge_amount;
        }

        if ($total_price > abs($this->order_model->order_total)) {
            $priceIncreased = true;
        }
        if ($total_price < abs($this->order_model->order_total)) {
            $priceIncreased = false;
        }



        $price_compared = abs($total_price - abs($this->order_model->order_total));


        if ($priceIncreased == true) {
            $user->balance -= $price_compared;
            $user->save();
        }
        if ($priceIncreased == false) {
            $user->balance += $price_compared;
            $user->save();
        }

        $this->order_model->total_weight = $total_weight;
        $this->order_model->total_quantity = $total_quantity;
        $this->order_model->order_total = $total_price;
        $this->order_model->order_total_prime = $total_prime;
        $this->order_model->order_total_basic = $total_price_basic;

        $this->order_model->save();

        foreach ($this->order['order_items'] as $order_item) {
            $order_item_model = OrderItem::find($order_item['id']);
            $order_item_model->quantity = $order_item['quantity'];
            $order_item_model->width = $order_item['width'];
            $order_item_model->height = $order_item['height'];
            $order_item_model->length = $order_item['length'];
            $order_item_model->weight = $order_item['weight'];
            $order_item_model->save();
        }
        UserActivity::create([
          'user_id' => $user->id,
          'activity_type' => 'Sipariş Değişikliği Yapıldı',
          'activity_data' => json_encode(['total_quantity' => $this->order_model->total_quantity ,'price' => number_format($this->order_model->order_total, 2), 'order_id' => $this->order_model->id]),
        ]);

        $this->flash('success', 'Sipariş  Başarıyla Güncellendi.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true,
          ], $this->referrer_url);

        if (app()->environment('production')) {
            Mail::to($user->email)->send(new OrderItemsUpdated(['order_number' => $this->order_model->id ,'user' => $user->name]));
        }
    }



    public function decreaseAmountFromAccount($user, $amount)
    {
        $user->balance -= $amount;
        $user->save();
    }
    public function increaseAmountFromAccount($user, $amount)
    {
        $user->balance += $amount;
        $user->save();
    }
}
