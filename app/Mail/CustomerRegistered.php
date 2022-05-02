<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $user_id;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user_id = $data['user_id'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('theme::emails.customer-registered', [
          'user_id' => $this->user_id,
        ])
        ->subject('Yeni Müşteri Kaydoldu');
        ;
    }
}
