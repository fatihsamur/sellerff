<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CallToAction extends Component
{
    public function render()
    {

        if(session()->get('show-prime-banner') != 'deactived') session()->put('show-prime-banner', true);

        return view('livewire.call-to-action');
    }

    public function closeBanner()
    {
        session()->put('show-prime-banner', 'deactived');
    }
}
