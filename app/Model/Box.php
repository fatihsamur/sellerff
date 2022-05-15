<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    public $table="boxes";
    public $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Model\Order');
    }

    public function order_items()
    {
        return $this->hasMany('App\Model\OrderItem');
    }

    public function box_items()
    {
        return $this->hasMany('App\Model\BoxItem');
    }
}
