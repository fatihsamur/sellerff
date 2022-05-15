<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\Box;
use Livewire\WithPagination;

class BoxSettings extends Component
{
    use WithPagination;
    public $box_expanded;




    public function render()
    {
        $boxes = Box::with('order_items.order.order_items')->withCount('order_items')->paginate(10);
        return view('livewire.box-settings', [
            'boxes' => $boxes
        ]);
    }

    public function toggleBox($id)
    {
        if (isset($this->box_expanded[$id])) {
            $this->box_expanded[$id] = !$this->box_expanded[$id];
        } else {
            $this->box_expanded[$id] = true;
        }
    }

    public function createNewBox()
    {
        Box::create();
    }
}
