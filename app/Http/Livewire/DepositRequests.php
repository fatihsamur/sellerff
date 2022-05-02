<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Deposit;
use App\User;
use App\PaymentMethod;
use App\UserActivity;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class DepositRequests extends Component
{
  use LivewireAlert;

    public function render()
    {
      $waitingDepositRequests = Deposit::with('user','payment_method')->where('status', 'Onay Bekliyor')->paginate(10);

        return view('livewire.deposit-requests',compact('waitingDepositRequests'));
    }

    public function approveDepositRequest($id)
    {

      $deposit = Deposit::with('payment_method')->find($id);
      $deposit->status = 'Onaylandı';
      $user = $deposit->user;
      $user->balance += $deposit->amount;
      $user->save();
      $deposit->save();
      $this->emit('deposit_approved');
      $this->alert('success', 'Bakiye Yükleme İşlemi Onaylandı!', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);


      UserActivity::create([
        'user_id' => $user->id,
        'activity_type' => 'Bakiye Yükleme İşlemi',
        'activity_data' => json_encode(['payment_method' => $deposit->payment_method->name,'transfer_number' => $deposit->transfer_number, 'amount' => number_format($deposit->amount, 2)]),
      ]);
    }
    public function denyDepositRequest($id)
    {
      $deposit = Deposit::find($id);
      $deposit->status = 'Reddedildi';
      $deposit->save();
      $this->emit('deposit_denied');
      $this->alert('error', 'Bakiye Yükleme İşlemi Reddedildi!', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
    }
}
