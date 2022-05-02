<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Storage;

class User extends \Wave\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'phone_number','address','name', 'email', 'username', 'password', 'verification_code', 'verified', 'trial_ends_at','line1','line2','state','city','zip_code','address','phone_number','billing_line1','billing_line2','billing_state','billing_city','billing_zip_code','billing_address','billing_phone_number'
  ];

    protected $dates = [
    'created_at',
    'updated_at',
    'trial_ends_at'
  ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
  ];

    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }
    public function shipping_address_line()
    {
        return setting('site.warehouse_address');
    }
    public function shipping_address_line_2()
    {
        return  '#FBA' . $this->id;
    }
    public function invoices()
    {
        return $this->hasMany('App\UserInvoice');
    }
}
