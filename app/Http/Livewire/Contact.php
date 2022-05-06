<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Contact extends Component
{
    use LivewireAlert;
    public $sender;
    public $email;
    public $subject;
    public $message;
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
        ]);

        Mail::to(env('SF_INFO_MAIL'))->send(new ContactForm(['sender' => $this->sender, 'email' => $this->email, 'subject' => $this->subject, 'message' => $this->message]));
        return $this->flash('success', 'Mesajınız Başarıyla Gönderildi.', [
            'position' => 'top-end',
            'timeout' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
