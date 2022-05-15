<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use App\Model\User;
use App\Model\PaymentMethod;
use App\Model\Deposit;

use App\Model\UserActivity;

class DepositUser extends BaseComponent
{
    public $depositAmount = 0;
    public $usermail;
    public $description;
    public $depositType = 'Artış';
    public function render()
    {
        $paymentMethods = PaymentMethod::all();
        return view('livewire.deposit-user', [
      'paymentMethods' => $paymentMethods
    ]);
    }


    public function depositUser()
    {
        $this->validate([
      'depositAmount' => 'required|numeric|min:1',
      'usermail' => 'required|email'
    ]);

        $user = User::where('email', $this->usermail)->first();
        if (!$user) {
            $this->alert('error', 'Kullanıcı Bulunamadı', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
            return;
        }
        $paymentMethod = PaymentMethod::where('code', 'yönetim')->first();
        $deposit = new Deposit;
        $deposit->user_id = $user->id;
        $deposit->service_payment_method_id = $paymentMethod->id;
        $deposit->status = 'Onaylandı';
        $deposit->amount = $this->depositAmount;
        $deposit->description = $this->description??null;

        $deposit->save();
        $user_old_balance = $user->balance;
        if ($this->depositType == 'Artış') {
            $user->balance += $this->depositAmount;
        }
        if ($this->depositType == 'Azaltma') {
            $user->balance -= $this->depositAmount;
        }
        $user->save();
        $this->alert('success', 'Bakiye Kullanıcıya Aktarıldı', [
      'position' => 'top-end',
      'timer' => 5000,
      'toast' => true,
      'timerProgressBar' => true
    ]);
        UserActivity::create([
      'user_id' => $user->id,
      'activity_type' => 'Yönetim Bakiye Düzenleme İşlemi',
      'activity_data' => json_encode(['old_balance' => number_format($user_old_balance, 2), 'new_balance' => number_format($user->balance, 2), 'description' => $this->description??null ,'process_type' => $this->depositType ]),
    ]);
        $this->reset();
    }
}
