<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Model\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ApplyAffiliate extends Component
{
    use LivewireAlert;
    public $affiliate_code;
    public function render()
    {
        return view('livewire.apply-affiliate');
    }

    public function checkAffCodeValidity()
    {
        $user = User::where('affiliate_code', $this->affiliate_code)->first();
        if ($user) {
            $this->alert('success', 'Başarıyla Uygulandı', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
          ]);
        } else {
            $this->alert('error', 'Maalesef bu kodu bulamadık', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
          ]);
        }
    }
}
