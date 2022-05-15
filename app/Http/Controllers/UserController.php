<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\UserActivity;
use App\Model\User;
use Wave\Plan;

class UserController extends Controller
{
    public function cancel_subscription(Request $request, $id)
    {
        $user = User::find($id);
        $old_plan  = Plan::where('role_id', $user->role_id)->first();
        $user->role_id = 3;
        $plan = Plan::where('role_id', $user->role_id)->first();
        $user->save();
        UserActivity::create([
        'user_id' => $user->id,
        'activity_type' => 'Plan İptal Edildi',
        'activity_data' => json_encode([
          'old_plan' => $old_plan->name,
          'new_plan' => $plan->name,
          'old_plan_price' => $old_plan->price,
          'new_plan_price' => $plan->price
        ])
      ]);
        return redirect()->back()->with('success', 'Üyeliğiniz iptal edildi.');
    }
}
