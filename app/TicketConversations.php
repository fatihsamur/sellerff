<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketConversations extends Model
{
    use HasFactory;

    public $table = "ticket_conversations";
    public $guarded = [];

    public function ticket()
    {
        return $this->belongsTo('App\Ticket');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
