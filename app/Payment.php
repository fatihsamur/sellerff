<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
  use HasFactory;
  public $table = "service_payments";

  public function method()
  {
    return $this->hasOne('App\PaymentMethod', 'id');
  }
  public function deposit()
  {
    return $this->belongsTo('App\Deposit');
  }
}
