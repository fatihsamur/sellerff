<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInvoice extends Model
{
  use HasFactory;

  public $table = 'user_invoices';
  public $guarded = [];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
