<?php

namespace Wave\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Wave\Model\Plan;
use Wave\Model\User;
use Wave\Model\PaddleSubscription;
use TCG\Voyager\Models\Role;
use App\Model\Order;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Model\UserActivity;
use App\Model\UserInvoice;

class SubscriptionController extends Controller
{
    private $paddle_checkout_url;
    private $paddle_vendors_url;
    private $endpoint = 'https://vendors.paddle.com/api';

    private $vendor_id;
    private $vendor_auth_code;

    public function __construct()
    {
        $this->vendor_auth_code = config('wave.paddle.auth_code');
        $this->vendor_id = config('wave.paddle.vendor');

        $this->paddle_checkout_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-checkout.paddle.com/api' : 'https://checkout.paddle.com/api';
        $this->paddle_vendors_url = (config('wave.paddle.env') == 'sandbox') ? 'https://sandbox-vendors.paddle.com/api' : 'https://vendors.paddle.com/api';
    }


    public function webhook(Request $request)
    {

    // Which alert/event is this request for?
        $alert_name = $request->alert_name;
        $subscription_id = $request->subscription_id;
        $status = $request->status;


        // Respond appropriately to this request.
        switch ($alert_name) {

      case 'subscription_created':
        break;
      case 'subscription_updated':
        break;
      case 'subscription_cancelled':
        $this->cancelSubscription($subscription_id);
        return response()->json(['status' => 1]);
        break;
      case 'subscription_payment_succeeded':
        break;
      case 'subscription_payment_failed':
        $this->cancelSubscription($subscription_id);
        return response()->json(['status' => 1]);
        break;
    }
    }

    public function cancel(Request $request)
    {
        return response()->json(['status' => 1]);
    }

    private function cancelSubscription($subscription_id)
    {
        /* $subscription = PaddleSubscription::where('subscription_id', $subscription_id)->first();
        $subscription->status = 'cancelled';
        $subscription->save();
        $user = User::find($subscription->user_id);
        $cancelledRole = Role::where('name', '=', 'cancelled')->first();
        $user->role_id = $cancelledRole->id;
        $user->save(); */

        $user = auth()->user()->subscription('main');
        dd($user);
    }

    public function checkout(Request $request)
    {

    //PaddleSubscriptions
        $response = Http::get($this->paddle_checkout_url . '/1.0/order?checkout_id=' . $request->checkout_id);
        $status = 0;
        $message = '';
        $guest = (auth()->guest()) ? 1 : 0;

        if ($response->successful()) {
            $resBody = json_decode($response->body());

            if (isset($resBody->order)) {
                $order = $resBody->order;

                $plans = Plan::all();

                if ($order->is_subscription && $plans->contains('plan_id', $order->product_id)) {
                    $subscriptionUser = Http::post($this->paddle_vendors_url . '/2.0/subscription/users', [
            'vendor_id' => $this->vendor_id,
            'vendor_auth_code' => $this->vendor_auth_code,
            'subscription_id' => $order->subscription_id
          ]);

                    $subscriptionData = json_decode($subscriptionUser->body());
                    $subscription = $subscriptionData->response[0];

                    if (auth()->guest()) {
                        if (User::where('email', $subscription->user_email)->exists()) {
                            $user = User::where('email', $subscription->user_email)->first();
                        } else {
                            // create a new user
                            $registration = new \Wave\Http\Controllers\Auth\RegisterController;

                            $user_data = [
                'name' => '',
                'email' => $subscription->user_email,
                'password' => Hash::make(uniqid())
              ];

                            $user = $registration->create($user_data);

                            Auth::login($user);
                        }
                    } else {
                        $user = auth()->user();
                    }

                    $plan = Plan::where('plan_id', $subscription->plan_id)->first();

                    // add associated role to user
                    $user->role_id = $plan->role_id;
                    $user->save();

                    $subscription = PaddleSubscription::create([
            'subscription_id' => $order->subscription_id,
            'plan_id' => $order->product_id,
            'user_id' => $user->id,
            'status' => 'active', // https://paddle.com/docs/subscription-status-reference/
            'next_bill_data' => \Carbon\Carbon::now()->addMonths(1)->toDateTimeString(),
            'cancel_url' => $subscription->cancel_url,
            'update_url' => $subscription->update_url
          ]);

                    $status = 1;
                } else {
                    $message = 'Error locating that subscription product id. Please contact us if you think this is incorrect.';
                }
            } else {
                $message = 'Error locating that order. Please contact us if you think this is incorrect.';
            }
        } else {
            $message = $response->serverError();
        }

        return response()->json([
      'status' => $status,
      'message' => $message,
      'guest' => $guest
    ]);
    }

    /* public function invoices(User $user)
    {

      $invoices = [];

      if (isset($user->subscription->subscription_id)) {
        $response = Http::post($this->paddle_vendors_url . '/2.0/subscription/payments', [
          'vendor_id' => $this->vendor_id,
          'vendor_auth_code' => $this->vendor_auth_code,
          'subscription_id' => $user->subscription->subscription_id,
          'is_paid' => 1
        ]);

        $invoices = json_decode($response->body());
      }

      return $invoices;
    } */

    public function switchPlans(Request $request)
    {
        $plan = Plan::where('plan_id', $request->plan_id)->first();
        $user = auth()->user();

        if ($plan->slug == 'basic') {
            $user->wants_renew = 0;
            $user->save();
            return back()->with(['message' => 'Ücretsiz Plana Geçişiniz Tamamlandı.', 'message_type' => 'success']);
        }
        if ($plan->slug == 'prime') {
            $user->wants_renew = 1;
        }

        if (isset($plan->id)) {
            if ($user->balance <= $plan->price) {
                return back()->with(['message' => 'Bu işlem için Yeterli Bakiyeniz Bulunmamaktadır.', 'message_type' => 'danger']);
            }
            $user->balance -= $plan->price;
            $old_plan = Plan::where('role_id', $user->role_id)->first();
            $user->role_id = $plan->role_id;
            if ($plan->role_id == 5) {
                $user->subscription_date = \Carbon\Carbon::now();
            } else {
                $user->subscription_date = null;
            }

            $user->save();

            if ($plan->role_id == 5) {
                $client = new Party([
          'name'          => 'BRK EXPRESS LLC SELLERFULFILMENT',
          'phone'         => '+ 1 (786) 238-5215',
          'email'         => 'support@sellerfulfilment.com',
          'address'      => '5659 W TAYLOR ST CHICAGO,IL 60644',
          'custom_fields' => [
            'website'        => 'www.sellerfulfilment.com',
          ],
        ]);

                $customer = new Party([
          'name'          => $user->name,
          'email'       => $user->email,
          'address'      => implode(' ', $user->billing_address())
        ]);

                $invoice_items = [];
                $invoice_items[] = (new InvoiceItem())->title('Monthly Prime Subscription Fee')->pricePerUnit($plan->price)->quantity(1);

                $user_invoice = new UserInvoice();
                $user_invoice->user_id = $user->id;
                $user_invoice->box_id = '';
                $user_invoice->invoice_date = now();
                $user_invoice->invoice_amount = $plan->price;
                $user_invoice->save();

                $notes = [
          'Thank you for your business!',
        ];
                $notes = implode("<br>", $notes);

                $invoice = Invoice::make('invoice')
        ->series('A')
        ->sequence($user_invoice->id)
        ->serialNumberFormat('{SERIES}/{SEQUENCE}')
        ->seller($client)
        ->buyer($customer)
        ->date(now())
        ->dateFormat('m/d/Y')
        ->currencySymbol('$')
        ->currencyCode('USD')
        ->currencyFormat('{SYMBOL}{VALUE}')
        ->currencyThousandsSeparator('.')
        ->currencyDecimalPoint(',')
        ->filename($user_invoice->id)
        ->addItems($invoice_items)
        ->notes($notes)
        ->logo(public_path('logos/seller_logo.png'))
        ->save('invoices');
                $user_invoice->invoice_number = $invoice->getSerialNumber();
                $user_invoice->save();
            }


            UserActivity::create([
        'user_id' => $user->id,
        'activity_type' => 'Plan Değiştirildi',
        'activity_data' => json_encode([
          'old_plan' => $old_plan->name??'',
          'new_plan' => $plan->name??'',
          'old_plan_price' => $old_plan->price,
          'new_plan_price' => $plan->price
        ])
      ]);


            // Update the user plan with Paddle
            /*         $response = Http::post($this->paddle_vendors_url . '/2.0/subscription/users/update', [
                      'vendor_id' => $this->vendor_id,
                      'vendor_auth_code' => $this->vendor_auth_code,
                      'subscription_id' => auth()->user()->subscription->subscription_id,
                      'plan_id' => $request->plan_id
                  ]); */

            // Next, update the user role associated with the updated plan





            return back()->with(['message' => 'Planınız Başarıyla ' . $plan->name . ' olarak güncellenmiştir.', 'message_type' => 'success']);
        }

        return back()->with(['message' => 'Planınızı Güncellerken Bir Sorun Oluşturuldu.', 'message_type' => 'danger']);
    }
}
