<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    public $table = "tickets";
    public $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function conversations()
    {
        return $this->hasMany('App\Model\TicketConversations');
    }
}
