<?php

namespace App\Repository;

use App\Model\User;

interface UserRepositoryInterface
{
    public function getCompletedOrdersRate(User $user);
    public function getCurrentMonthsOrdersGroupedByDate(User $user);
    public function getTopUsers();
}
