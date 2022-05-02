<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  use HasFactory;
  public $table='order_items';
  public $guarded = [];

  public function order()
  {
    return $this->belongsTo(Order::class);
  }
  public  function box()
  {
    return $this->belongsTo(Box::class);
  }

  public function buyer_infos()
  {
    return $this->hasMany(OrderItemsBuyerInfo::class);
  }
  public function marketplace()
  {
    return $this->hasOne(Marketplace::class , 'id','service_marketplace_id');
  }
}
