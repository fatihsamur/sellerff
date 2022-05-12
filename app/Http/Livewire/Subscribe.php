<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Subscribe extends Component
{
    use LivewireAlert;
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
