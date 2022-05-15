<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\User;
use App\Model\Order;

class ShowUser extends Component
{
    public $order_id;
    public $order;
    public $referrer_url;

    public function mount($order_id)
    {
        $this->referrer_url = request()->headers->get('referer');
        $this->order_id = $order_id;
        $this->order = Order::find($this->order_id);
    }
    public function render()
    {
        return view('livewire.show-user');
    }
}
