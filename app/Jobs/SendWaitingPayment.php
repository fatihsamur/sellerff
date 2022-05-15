<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\WaitingPayment;

class SendWaitingPayment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $email;
    public $name;
    public $order_number;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $name, $order_number)
    {
        $this->email = $email;
        $this->name = $name;
        $this->order_number = $order_number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new WaitingPayment(['order_number' => $this->order_number ,'user' => $this->name]));
    }
}
