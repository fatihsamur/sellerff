<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderProcessing extends Mailable
{
    use Queueable, SerializesModels;

    public $order_number;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->order_number = $data['order_number'];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('theme::emails.order-processing', [
          'order_number' => $this->order_number,
        ])
        ->subject('Siparişiniz Depoya Ulaştı.');
        ;
    }
}
