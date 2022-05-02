<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\{User};



class Deposits extends Component
{

  public $paginate = 10;

  public function render()
  {

    $user_id = auth()->user()->id;
    $deposits = User::find($user_id)->deposits()->with('payment_method')->orderBy('id', 'DESC')->paginate($this->paginate);
    return view('livewire.deposits', [
      'deposits' => $deposits
    ]);
  }
}
