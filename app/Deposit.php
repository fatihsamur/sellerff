<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
  use HasFactory;
  public $table = "deposits";
  public $guarded = [];
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function payment_method()
  {
    return $this->hasOne('App\PaymentMethod', 'id', 'service_payment_method_id');
  }
}
