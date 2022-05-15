<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemsBuyerInfo extends Model
{
    use HasFactory;

    protected $table = 'order_buyer_order_infos';

    public function order_items()
    {
        return $this->belongsTo('App\OrderItems');
    }
}
