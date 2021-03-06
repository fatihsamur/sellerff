<?php

namespace App\Http\Livewire;

use App\Http\Livewire\BaseComponent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Jobs\SendContactForm;

class Contact extends BaseComponent
{
    public $sender;
    public $email;
    public $subject;
    public $message;
    public $agree;
    public function render()
    {
        return view('livewire.contact');
    }

    public function sendEmail()
    {
        $this->validate([
            'sender' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'agree' => 'required',
        ]);

        SendContactForm::dispatch(env('SF_INFO_MAIL'), $this->email, $this->sender, $this->subject, $this->message);
        return $this->successAlert('Mesajınız Başarıyla Gönderildi.');
    }
}
