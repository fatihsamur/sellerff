<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ApplyAffiliate extends BaseComponent
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
            $this->successAlert('Başarıyla Uygulandı');
        } else {
            $this->failAlert('Kod Geçersiz');
        }
    }
}
