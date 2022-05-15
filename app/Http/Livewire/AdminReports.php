<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repository\UserRepositoryInterface;
use App\Model\{User};
use Wave\Plan;
use Asantibanez\LivewireCharts\Models\LineChartModel;

class AdminReports extends Component
{
    private UserRepositoryInterface $userRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function render(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
        $user = auth()->user();
        $completedOrdersRate = $this->userRepository->getCompletedOrdersRate($user);
        $currentMonthsOrdersGroupedByDate = $this->userRepository->getCurrentMonthsOrdersGroupedByDate($user);
        $lineChartModel = (new LineChartModel());

        foreach ($currentMonthsOrdersGroupedByDate as $date => $orders) {
            $lineChartModel->addPoint($date, $orders->count());
        }
        $primes = User::where('role_id', 5)->count();
        $users = User::with('orders')
    ->withCount('orders')
    ->withSum('orders', 'order_total')
    ->withSum('invoices', 'invoice_amount')
    ->withMax('orders', 'order_total')
    ->orderBy('orders_count', 'DESC')
    ->paginate(10);
        $user_count = User::count();
        $user_max_balance = User::max('balance');
        //return plans name field as string list
        $plans = Plan::all()->pluck('name')->implode(', ');
        $topUsers = $this->userRepository->getTopUsers();


        return view('livewire.admin-reports', compact('user', 'completedOrdersRate', 'lineChartModel', 'currentMonthsOrdersGroupedByDate', 'topUsers', 'primes', 'users', 'user_count', 'user_max_balance', 'plans'));
    }

    public function goToOrders()
    {
        return redirect()->to('/fba');
    }
    public function goToPayments()
    {
        return redirect()->to('/payments');
    }
}
