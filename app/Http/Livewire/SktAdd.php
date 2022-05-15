<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\Order;

class SktAdd extends BaseComponent
{
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

        $this->successAlert('Son Kullanım Tarihleri Eklendi.', $this->referrer_url);
    }
}
