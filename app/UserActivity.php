<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    use HasFactory;

    public $table = 'user_activity';
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
