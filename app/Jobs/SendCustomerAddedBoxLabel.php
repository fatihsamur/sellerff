<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerAddedBoxLabel;

class SendCustomerAddedBoxLabel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $order_number;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $order_number)
    {
        $this->email = $email;
        $this->order_number = $order_number;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new CustomerAddedBoxLabel(['order_id' => $this->order_number ]));
    }
}
