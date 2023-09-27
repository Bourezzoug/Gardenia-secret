<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email,$firstName,$lastName,$options,$emailMessage,$city,$country;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $firstName,$lastName,$options,$emailMessage,$city,$country)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->options = $options;
        $this->emailMessage = $emailMessage;
        $this->city = $city;
        $this->country = $country;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to('lamyae@wib.co')
                    ->from('contact@gardeniasecret.com', $this->firstName . ' ' . $this->lastName)
                    ->subject('Gardenia Secret : ' . $this->options)
                    ->view('emails.contactmail');
    }
}
