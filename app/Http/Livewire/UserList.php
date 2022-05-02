<?php

namespace App\Http\Livewire;

use Livewire\{Component,WithPagination};
use App\User;

class UserList extends Component
{
  use WithPagination;

  public $search;

  public function render()
    {
        $users = User::
        when($this->search, function ($query) {
          return
          $query->where('id', 'like', "%{$this->search}%")
          ->orWhere('email', 'like', "%{$this->search}%")
          ->orWhere('name', 'like', "%{$this->search}%");
        })
        ->paginate(10);
        return view('livewire.user-list',compact('users'));
    }


}
