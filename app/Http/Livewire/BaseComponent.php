<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class BaseComponent extends Component
{
    use LivewireAlert;

    public function successAlert($message, $referrer)
    {
        return $this->flash('success', $message, [
            'position' => 'top-end',
            'timeout' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ], $referrer ?? null);
    }

    public function failAlert($message)
    {
        return $this->flash('error', $message, [
            'position' => 'top-end',
            'timeout' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ], $referrer ?? null);
    }
    public function warningAlert($message)
    {
        return $this->flash('warning', $message, [
            'position' => 'top-end',
            'timeout' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ], $referrer ?? null);
    }
}
