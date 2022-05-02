<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerAddedBoxLabel extends Mailable
{
    use Queueable, SerializesModels;


    public $order_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {

        $this->order_id = $data['order_id'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('theme::emails.customer-added-boxlabel', [

          'order_id' => $this->order_id
        ])
        ->subject('Box Label Eklendi');
        ;
    }
}
