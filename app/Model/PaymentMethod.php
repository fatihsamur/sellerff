<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\PaymentMethodScope;

class PaymentMethod extends Model
{
    use HasFactory;
    public $table = "service_payment_methods";

    public function payment()
    {
        return $this->belongsTo('App\Model\Payment');
    }

    public function deposit()
    {
        return $this->belongsTo('App\Model\Deposit');
    }
}
