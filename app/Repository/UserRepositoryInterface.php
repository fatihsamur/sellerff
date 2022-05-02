<?php

namespace App\Repository;
use App\User;

interface UserRepositoryInterface
{
  public function getCompletedOrdersRate(User $user);
  public function getCurrentMonthsOrdersGroupedByDate(User $user);
  public function getTopUsers();
}
