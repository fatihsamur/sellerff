<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Model\User;
use App\Model\UserActivity;
use App\Model\UserInvoice;
use Wave\Model\{Plan};
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class DailySubscriptionControl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptioncontrol:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('role_id', 5)->get();
        foreach ($users as $user) {
            $now = Carbon::now();
            $subscription_date = Carbon::parse($user->subscription_date);
            if ($now->isSameDay($subscription_date)) {
                $plan = Plan::where('role_id', $user->role_id)->first();
                if (!$user->wants_renew) {
                    $plan = Plan::where('role_id', 3)->first();
                }
                if ($plan->price > $user->balance) {
                    $user->role_id = 3;
                    $user->save();
                    continue;
                }
                $user->balance -= $plan->price;
                $user->role_id = $plan->role_id;
                $user->save();

                if ($plan->price > 0) {
                    $client = new Party([
          'name'          => 'BRK EXPRESS LLC SELLERFULFILMENT',
          'phone'         => '+ 1 (786) 238-5215',
          'email'         => 'support@sellerfulfilment.com',
          'address'      => '5659 W Taylor St CHICAGO,IL 60644',
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
            }
        }
        $this->info('Daily Subscription Control Command Successfully Sent.');
        Log::info('Daily Subscription Control Command Successfully Sent.');
    }
}
