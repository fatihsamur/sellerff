<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxItem extends Model
{
  use HasFactory;
  public $table = 'box_items';
  public $guarded = [];

  public function box()
  {
    return $this->belongsTo(Box::class);
  }
  public function order_item()
  {
    return $this->hasOne(OrderItem::class, 'id', 'order_item_id');
  }
}
