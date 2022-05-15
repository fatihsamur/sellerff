<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    public $table = "affiliates";
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'user_id');
    }

    public function owner()
    {
        return $this->belongsTo('App\Model\User', 'owner_user_id');
    }
}
