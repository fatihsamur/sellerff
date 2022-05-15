<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use Livewire\WithPagination;
use App\Model\Order;
use App\Model\Ticket as TicketModel;

class Ticket extends BaseComponent
{
    use WithPagination;
    public $search;
    public $activeFilter;
    public $showBoxInstruction = [];




    public function render()
    {
        $tickets = TicketModel::with('conversations', 'user')->where('user_id', auth()->user()->id)->get();
        $closed_tickets_count = TicketModel::where('user_id', auth()->user()->id)->where('status', 'Kapandı')->count();
        $latest_ticket = TicketModel::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        return view('livewire.ticket', [
      'tickets' =>
      $tickets,
      'ticket_count' => $tickets->count(),
      'closed_ticket_count' => $closed_tickets_count,
      'latest_ticket_time' => $latest_ticket->created_at,
    ]);
    }
}
