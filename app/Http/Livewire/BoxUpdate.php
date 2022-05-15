<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\Box;
use App\Model\Order;
use App\Model\OrderItem;

class BoxUpdate extends BaseComponent
{
    public $boxInputs = [];
    public $referrer_url;

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $boxes = Order::with('boxes')->find($this->order_id)->boxes;
        foreach ($boxes as $box) {
            $this->boxInputs[$box->id] = $box;
        }
    }


    public function render()
    {
        $boxes = Order::with('boxes')->find($this->order_id)->boxes;
        return view(
            'livewire.box-update',
            [
            'boxes' => $boxes,
          ]
        );
    }
    public function updateBox()
    {
        foreach ($this->boxInputs as $box) {
            $box = Box::find($box['id']);
            $box->update(
                [
            'weight_lbs' => $this->boxInputs[$box->id]['weight_lbs'],
            'length_in' => $this->boxInputs[$box->id]['length_in'],
            'width_in' => $this->boxInputs[$box->id]['width_in'],
            'height_in' => $this->boxInputs[$box->id]['height_in'],
            'tracking_number' => $this->boxInputs[$box->id]['tracking_number'],
            'status' => $this->boxInputs[$box->id]['status'],
          ]
            );
        }


        $this->successAlert('Box ID : '. $box->id .' Boxlar Başarıyla Güncellendi.', $this->referrer_url);
    }

    public function deleteBox($box_id)
    {
        $box = Box::find($box_id);
        OrderItem::where('box_id', $box_id)->update(['box_id' => null]);
        $box->delete();
        $this->successAlert(' Başarıyla Silindi.', $this->referrer_url);
    }
}
