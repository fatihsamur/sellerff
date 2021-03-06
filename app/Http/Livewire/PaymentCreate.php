<?php

namespace App\Http\Livewire;

use App\Jobs\SendPaymentRequestCreated;
use App\Http\Livewire\BaseComponent;
use App\Model\User;
use App\Model\PaymentMethod;
use App\Model\Deposit;
use Stripe\Stripe;
use Stripe\Charge;
use App\Model\UserActivity;

class PaymentCreate extends BaseComponent
{
    public $selectedPaymentMethod = '';
    public $depositAmount = 0;
    public $referrer_url;
    public $payoneerTransferNumber;
    public $fullName;
    public $stripeName;
    public $card;
    public $cvv;
    public $expMonth;
    public $expYears;
    public $receipt_url;


    public function mount()
    {
        $this->referrer_url = request()->headers->get('referer');
    }
    public function render()
    {
        $paymentMethods = PaymentMethod::where('code', '!=', 'yönetim')->get();
        return view('livewire.payment-create', [
      'paymentMethods' => $paymentMethods,
    ]);
    }

    public function createDepositRequest()
    {
        $validatedData = $this->validate([
      'selectedPaymentMethod' => 'required',
      'depositAmount' => 'required|numeric|min:1'
    ]);


        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $waitingDepositRequests = Deposit::where('status', 'Onay Bekliyor')->where('user_id', $user_id)->get();
        if ($waitingDepositRequests->count() > 2) {
            $this->alert('error', 'Bekleyen Bakiye Yükleme Taleplerinizin Sonlanmasını Bekleyiniz!', [
        'position' => 'top-end',
        'timer' => 5000,
        'toast' => true,
        'timerProgressBar' => true
      ]);
            return;
        }




        Deposit::create([
      'user_id' => auth()->user()->id,
      'sender_name' => $this->fullName??null,
      'service_payment_method_id' => PaymentMethod::where('code', $validatedData['selectedPaymentMethod'])->first()->id,
      'amount' => $validatedData['depositAmount'],
      'status' => 'Onay Bekliyor',
      'transfer_number' => $this->payoneerTransferNumber ?? null
    ]);

        if (app()->environment('production')) {
            SendPaymentRequestCreated::dispatch(env('SF_PAYMENT_MAIL'));
        }
        $this->success('Bakiye Yükleme Talebiniz Başarıyla Oluşturuldu.', $this->referrer_url);
    }


    public function chargeUserViaStripe($id)
    {
        $validatedData = $this->validate([
        'stripeName' => 'required',
        'card' => 'required|min:16|max:16',
        'cvv' => 'required|min:3|max:3',
        'expMonth' => 'required',
        'expYears' => 'required',

      ]);

        $user = User::find($id);
        if (!$validatedData) {
            $this->alert('error', 'Lütfen Geçerli Bilgi Giriniz', [
          'position' => 'top-end',
          'timer' => 5000,
          'toast' => true,
          'timerProgressBar' => true
        ]);
            return;
        }

        if ($this->depositAmount < 1) {
            $this->alert('error', 'Lütfen Geçerli Bir miktar belirtin!', [
          'position' => 'top-end',
          'timer' => 5000,
          'toast' => true,
          'timerProgressBar' => true
        ]);
        }
        $stripe = new \Stripe\StripeClient(env('STRIPE_LIVE_SECRET'));
        try {
            $tokens = $stripe->tokens->create([
          'card' => [
            'number' => $this->card,
            'exp_month' => $this->expMonth,
            'exp_year' => $this->expYears,
            'cvc' => $this->cvv,
          ],
        ]);

            $stripe = Stripe::setApiKey(env('STRIPE_LIVE_SECRET'));
            $extra_fee = $this->depositAmount / 100 * 2.5;
            $charge = Charge::create([
          "amount" => ($this->depositAmount + $extra_fee) * 100,
          "currency" => "usd",
          "source" => $tokens,
          "description" => "Deposit Payment Created USERID:".$user->id
        ]);
            if ($charge->status != 'succeeded') {
                $this->alert('error', 'Ödeme Alınırken Bir hata Oluştu.', [
            'position' => 'top-end',
            'timer' => 5000,
            'toast' => true,
            'timerProgressBar' => true
          ]);
                return;
            }

            $this->receipt_url = $charge->receipt_url;


            $user->balance += $this->depositAmount;
            $user->save();

            UserActivity::create([
          'user_id' => $user->id,
          'activity_type' => 'Bakiye Yükleme İşlemi',
          'activity_data' => json_encode(['payment_method' => 'stripe','transfer_number' => $this->receipt_url, 'amount' => $this->depositAmount ]),
        ]);

            $this->successAlert('Bakiye Yükleme İşlemi Başarıyla Gerçekleştirildi.', route('payment'));
        } catch (\Throwable $th) {
            $this->failAlert('Ödeme Alınırken Bir hata Oluştu.' .$th->getMessage(), route('payment'));
        }
    }
}
