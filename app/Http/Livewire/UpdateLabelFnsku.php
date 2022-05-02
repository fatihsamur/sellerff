<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Order;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;

class UpdateLabelFnsku extends Component
{
    use LivewireAlert, WithFileUploads;

    public $fnsku_list = [];
    public $referrer_url;
    public $labels = [];

    public function render()
    {
        return view('livewire.update-label-fnsku');
    }

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $order_model = Order::with('order_items')->find($this->order_id);
        $order = $order_model->toArray();
        $this->order_model = $order_model;
        $this->order = $order;
        foreach ($order['order_items'] as $item) {
            if ($item['fnsku']) {
                $this->fnsku_list[]['fnsku'] = $item['fnsku'];
            }
        }
    }

    public function updateAll()
    {
        $this->validate([
      'fnsku_list' => 'required|array|min:1',
      'fnsku_list.*.fnsku' => 'required',
    ]);


        foreach ($this->order_model->order_items as $order_item_key => $order_item) {
            $order_item->fnsku = isset($this->fnsku_list[$order_item_key]) ? $this->fnsku_list[$order_item_key]['fnsku'] : null;
            $order_item->save();
        }

        $label_paths = [];
        if (count($this->labels) > 0) {
            foreach ($this->labels as $labelkey => $label) {
                $label_path = $label->storeAs('public/label', $this->order_model->id . '_' . $labelkey . '.pdf');
                $label_paths[] = $this->order_model->id . '_' . $labelkey . '.pdf';
            }

            $this->order_model->labels = count($label_paths) > 0 ? json_encode($label_paths) : null;
            $this->order_model->save();
        }

        if (!$this->order_model->anyMissingBuyerOrderId() && !$this->order_model->anyFnskuOrLabelMissing() && $this->order_model->paid) {
            $this->order_model->status = 'Kargo Bekleniyor';
            $this->order_model->save();
        }

        $this->flash('success', 'Fnsku ve Label Ekleme Başarılı', [
      'position' => 'top-end',
      'timer' => 5000,
      'toast' => true,
      'timerProgressBar' => true,
    ], $this->referrer_url);
    }
}
