<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class StripeController extends Controller
{
    public function charge(Request $request)
    {
        dd($request);

        /*   if($this->depositAmount < 1){

          } */
        $user = User::find($request->id);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create([
      "amount" => 1,
      "currency" => "usd",
      "description" => ""
]);
    }
}
