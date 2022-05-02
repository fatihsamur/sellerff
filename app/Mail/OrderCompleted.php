<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCompleted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $order_number;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->user = $data['user'];
        $this->order_number = $data['order_number'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('theme::emails.order-completed', ['user'=>$this->user, 'order_number'=>$this->order_number])
        ->subject($this->order_number . ' No\'lu Siparişiniz Tamamlandı');
        ;
    }
}
