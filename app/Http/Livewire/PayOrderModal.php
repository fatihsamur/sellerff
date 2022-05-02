<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class PayOrderModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.pay-order-modal');
    }
}
