<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use App\User;

class UserLoginAt
{
  /**
   * Create the event listener.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Handle the event.
   *
   * @param  Login  $event
   * @return void
   */
  public function handle(Login $event)
  {

    $user = User::find($event->user->id);
    $user->last_login_at = Carbon::now();
    $user->last_login_ip_address = request()->getClientIp();
    $user->save();
  }
}
