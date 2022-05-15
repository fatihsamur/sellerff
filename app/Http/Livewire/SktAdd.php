<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Order;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SktAdd extends Component
{
    use LivewireAlert;

    public $orderId;
    public $skt;
    public $order;
    public $referrer_url;

    public function mount($id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->orderId = $id;
        $order = Order::with(['order_items' => function ($query) {
            $query->where('skt_required', '=', 1);
        }])->where('id', $this->orderId)->first();
        $this->order= $order;
    }
    public function render()
    {
        $order = Order::with(['order_items' => function ($query) {
            $query->where('skt_required', '=', 1);
        }])->where('id', $this->orderId)->first();
        $this->order= $order;
        return view('livewire.skt-add', [
          'order' => $order
        ]);
    }
    public function saveSkt()
    {
        $this->validate([
        'skt.*' => 'required|date|date_format:Y-d-m'
      ]);

        $order = Order::with(['order_items' => function ($query) {
            $query->where('skt_required', '=', 1);
        }])->where('id', $this->orderId)->first();

        foreach ($order->order_items as $order_item_key => $order_item) {
            $date = date_create($this->skt[$order_item_key]);
            $order_item->skt = $date;
            $order_item->save();
        }

        $this->flash('success', 'Son Kullanım Tarihleri Eklendi.', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true,
      ], $this->referrer_url);
    }
}
