<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;

class Subscribe extends BaseComponent
{
    public $email;

    public function render()
    {
        return view('livewire.subscribe');
    }

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email',
        ]);
        $this->alert('error', 'Bültenler Henüz Aktif Değil', [
          'position' => 'top-end',
          'timer' => 3000,
          'toast' => true,
          'timerProgressBar' => true,
        ]);
    }
}
