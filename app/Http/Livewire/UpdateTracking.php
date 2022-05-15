<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\Order;

class UpdateTracking extends BaseComponent
{
    public $buyer_list = [];
    public $referrer_url;

    public function render()
    {
        return view('livewire.update-tracking');
    }

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $order_model = Order::with('order_items')->find($this->order_id);
        $order = $order_model->toArray();
        $this->order_model = $order_model;
        $this->order = $order;
        /* foreach ($order['order_items'] as $item) {
            $list = json_decode($item['buyer_order_id']);
            if($list){
              foreach($list as $list_item){
                $this->buyer_list[] = $list_item;
              }
            }

        } */
    }

    public function updateTracking()
    {
        $this->validate([
      'buyer_list' => 'required|array|min:1',
    ]);


        foreach ($this->order_model->order_items as $order_item_key => $order_item) {
            $order_item->buyer_order_id = isset($this->buyer_list[$order_item_key]) ? [$this->buyer_list[$order_item_key]] : null;
            $order_item->save();
        }

        if (!$this->order_model->anyMissingBuyerOrderId() && !$this->order_model->anyFnskuOrLabelMissing() && $this->order_model->paid) {
            $this->order_model->status = 'Kargo Bekleniyor';
            $this->order_model->save();
        }

        $this->successAlert('Buyer ve Tracking Id Ekleme Başarılı', $this->referrer_url);
    }
}
