<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendDividendPayoutNotice extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $attach;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $attach)
    {
        $this->user = $user;
        $this->attach = $attach;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        $fromConfig = Setting::get('email_from_address');
        $fromNameConfig = Setting::get('email_from_name');
        
        if(!empty($this->attach)){

            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Dividend Payout Details")
                ->attach($this->attach, [
                    'as' => 'Dividend Payout Report.pdf',
                    'mime' => 'application/pdf',
                ])
                ->markdown('emails.sendDividendPayoutNotice');
        }else{
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Dividend Payout Details")
                ->markdown('emails.sendDividendPayoutNotice');
        }
    }
}
