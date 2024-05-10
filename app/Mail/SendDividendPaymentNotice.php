<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendDividendPaymentNotice extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $attach;
    public $subscriptionData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $attach, $subscriptionData)
    {
        $this->user = $user;
        $this->attach = $attach;
        $this->subscriptionData = $subscriptionData;
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
        
        if(!empty($this->attach)){

            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Dividend Payment Details")
                ->attach($this->attach, [
                    'as' => 'Dividend Payment Report.pdf',
                    'mime' => 'application/pdf',
                ])
                ->markdown('emails.sendDividendPaymentNotice');
        }else{
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Dividend Payment Details")
                ->markdown('emails.sendDividendPaymentNotice');
        }
    }
}
