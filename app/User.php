<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \Storage;

class User extends \Wave\User
{
    use Notifiable;

    protected $guarded = [];

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
