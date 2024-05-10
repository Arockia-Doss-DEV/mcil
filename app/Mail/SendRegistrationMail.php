<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fromConfig = Setting::get('email_from_address');
        $fromNameConfig = Setting::get('email_from_name');
        
        return $this
            ->from($fromConfig, $fromNameConfig)
            ->subject("We Received Your MCIL Subscription")
            ->markdown('emails.sendRegistrationMail');
    }
}
