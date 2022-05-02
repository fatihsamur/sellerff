<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SettingsGeneral extends Component
{

  public $IsDefaultCreditCard = false;


  public function mount()
  {
    $this->IsDefaultCreditCard = auth()->user()->subscription_charge_method == 'credit_card' ? true : false;
  }

    public function render()
    {
        return view('livewire.settings-general');
    }

    public function updatedIsDefaultCreditCard()
    {

      $user = auth()->user();
      $user->subscription_charge_method = $this->IsDefaultCreditCard ? 'credit_card' : 'balance';
      $user->save();
    }
}
