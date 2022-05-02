<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminUserList extends Component
{
    public $user;
    public function mount($user)
    {
        $this->user = $user;
    }
    public function render()
    {
        return view('livewire.admin-user-list', ['user' => $this->user]);
    }
}
