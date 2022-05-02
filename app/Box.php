<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    public $table="boxes";
    public $guarded = [];

    public function  order()
    {
        return $this->belongsTo('App\Order');
    }

    public function order_items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function box_items()
    {
        return $this->hasMany('App\BoxItem');
    }
}
