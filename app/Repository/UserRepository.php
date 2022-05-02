<?php

namespace App\Repository;

use App\User;
use App\Repository\UserRepositoryInterface;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class UserRepository implements UserRepositoryInterface
{
    public function getCompletedOrdersRate(User $user)
    {
      $completedOrdersCount = $user->orders()->where('status', '=', 'Tamamlandı')->get()->count();
      $totalOrdersCount = $user->orders()->get()->count();
      if($totalOrdersCount == 0 || $completedOrdersCount == 0) {
        return 0;
      }
      $completedOrdersRate = ceil($completedOrdersCount / $totalOrdersCount * 100);
      return (int) $completedOrdersRate;
    }

    public function getCurrentMonthsOrdersGroupedByDate(User $user)
    {
      $start = Carbon::now()->startOfMonth();
      $end = Carbon::now()->endOfMonth();
      $period = CarbonPeriod::create($start, $end);
      $currentMonthsOrdersGroupedByDate = null;
      foreach($period as $date)
      {
        $currentMonthsOrdersGroupedByDate[$date->format('Y-m-d')] = $user->orders()->whereDay('created_at', $date->format('d'))->get();
      }
      return $currentMonthsOrdersGroupedByDate;
    }

    public function getTopUsers()
    {
      return User::has('orders')->withCount('orders')->where('role_id','!=','7')->where('role_id','!=','1')->orderBy('orders_count', 'DESC')->take(5)->get();

    }
}
