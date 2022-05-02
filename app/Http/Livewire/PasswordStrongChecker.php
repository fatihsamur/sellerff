<?php

namespace App\Http\Livewire;

use Livewire\Component;
use ZxcvbnPhp\Zxcvbn;

class PasswordStrongChecker extends Component
{
  public $password = '';
  public $password_confirmation;


    public function render()
    {
      $zxcvbn = new Zxcvbn();
      $score = $zxcvbn->passwordStrength($this->password);
      $score = $score['score'] ;

        return view('livewire.password-strong-checker', compact('score'));
    }
}
