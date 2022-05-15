<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Ticket as TicketModel;

class ShowTicket extends Component
{
    public $ticket_id;

    public function mount($id)
    {
        $this->ticket_id = $id;
    }
    public function render()
    {
        $ticket = TicketModel::with('conversations.user', )
        ->find($this->ticket_id);
        return view('livewire.show-ticket', compact('ticket'));
    }
}
