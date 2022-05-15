<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public $table = "affiliates";
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'owner_user_id');
    }
}
