<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class NewInvestmentEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
   
    public function __construct($user){
        $this->user = $user;   
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $from_email = Setting::get('email_from_address');
        $from_name = Setting::get('email_from_name');

        return $this
            ->from($from_email, $from_name)
            ->subject("We Received Your MCIL Subscription")
            ->markdown('emails.newInvestmentEmail');
                
        //return $this->view('view.name');
    }
}
