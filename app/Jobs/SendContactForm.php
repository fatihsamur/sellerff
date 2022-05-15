<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;

class SendContactForm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email;
    public $sender;
    public $message;
    public $subject;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($sender_mail, $email, $sender, $subject, $message)
    {
        $this->email = $email;
        $this->sender_mail = $sender_mail;
        $this->sender = $sender;
        $this->subject = $subject;
        $this->message = $message;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->sender_mail)->send(new ContactForm(['sender' => $this->sender, 'email' => $this->email, 'subject' => $this->subject, 'message' => $this->message]));
    }
}
