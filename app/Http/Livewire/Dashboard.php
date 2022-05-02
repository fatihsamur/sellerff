<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Repository\UserRepositoryInterface;
use App\User;
use Asantibanez\LivewireCharts\Models\LineChartModel;

class Dashboard extends Component
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

    $topUsers = $this->userRepository->getTopUsers();

    return view('livewire.dashboard', compact('user', 'completedOrdersRate', 'lineChartModel', 'currentMonthsOrdersGroupedByDate', 'topUsers'));
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
