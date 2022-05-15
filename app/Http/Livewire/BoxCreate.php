<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Box;
use App\Model\Order;
use App\Model\OrderItem;
use App\Model\BoxItem;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BoxCreate extends Component
{
    use LivewireAlert;

    public $order_id;
    public $weight;
    public $length;
    public $width;
    public $height;
    public $tracking_number;
    public $status;
    public $inputs = [];
    public $i = 0;
    public $box_items = [];
    public $referrer_url;

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
    }

    public function render()
    {
        $box = Box::where('order_id', $this->order_id)->first();
        $order = Order::with('order_items')->find($this->order_id);
        $order_raw = Order::find($this->order_id);
        $data = [];
        if ($box) {
            $data = $box;
        }
        return view(
            'livewire.box-create',
            [
        'box' => $data,
        'order' => $order
      ]
        );
    }
    public function createBox($order_items, $order)
    {
        $order_raw = Order::find($this->order_id);
        /* $this->validate([
          'weight' => 'required',
          'length' => 'required',
          'width' => 'required',
          'height' => 'required',
          'tracking_number' => 'required_if:status,==,Aracı Firmaya Teslim Edildi',
          'status' => 'required'
        ]); */
        $box = Box::create(
            [
        'order_id' => $this->order_id,
        'weight_lbs' => $this->weight,
        'length_in' => $this->length,
        'width_in' => $this->width,
        'height_in' => $this->height,
        'tracking_number' => $this->tracking_number,
        'status' => $this->status
      ]
        );


        foreach ($this->box_items as $box_item) {
            $order_item = OrderItem::where('unique_identifier', $box_item['sku'])->first();
            $order_item_id = $order_item->id;
            $box_item = BoxItem::create(
                [
          'box_id' => $box->id,
          'order_item_id' => $order_item_id,
          'quantity' => $box_item['quantity']
        ]
            );
        }







        $this->flash('success', 'Box No :'.$box->id.' Box Başarıyla Atandı.', [
      'position' => 'top-end',
      'timer' => 5000,
      'toast' => true,
      'timerProgressBar' => true,
    ], $this->referrer_url);
    }

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs, $i);
    }

    public function remove($i)
    {
        unset($this->inputs[$i]);
        /* unset($this->box_items[$i]); */
    }
}
