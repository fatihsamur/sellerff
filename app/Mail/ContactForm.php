<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $sender;
    public $email;
    public $subject;
    public $sender_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->sender = $data['sender'];
        $this->email = $data['email'];
        $this->subject = $data['subject'];
        $this->sender_message = $data['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('theme::emails.contact-form', [
          'sender' => $this->sender,
          'email' => $this->email,
          'subject' => $this->subject,
          'sender_message' => $this->sender_message,
        ])
        ->subject('Iletişim Formu Mesajı');
        ;
    }
}
