<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Wave\User;
use App\{OrderItem, Box, Country};

class Order extends Model
{
  use HasFactory;
  public $guarded = [];
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function order_items()
  {
    return $this->hasMany(OrderItem::class);
  }
  public function boxes()
  {
    return $this->hasMany(Box::class);
  }


  public function cancellable()
  {
    if ($this->status == 'Ödeme Bekliyor') {
      return true;
    }
    return false;
  }

  public function anyMissingBuyerOrderId()
  {
    if ($this->order_items()->where('buyer_order_id', null)->count() > 0) {
      return true;
    }
    return false;
  }

  public function anyFnskuOrLabelMissing()
  {
    if ($this->order_items()->where('fnsku', null)->count() > 0 || $this->labels == null) {
      return true;
    }
    return false;
  }
  public function anySktRequired()
  {
    if ($this->order_items()->where('skt_required', 1)->count() > 0 ) {
      return true;
    }
    return false;
  }
  public function sktNotCompleted()
  {
    if ($this->order_items()->where('skt_required',1)->where('skt',null)->count() > 0 ) {
      return true;
    }
    return false;
  }

  public function country()
  {
    return $this->hasOne(Country::class, 'id', 'service_country_id');
  }

}
