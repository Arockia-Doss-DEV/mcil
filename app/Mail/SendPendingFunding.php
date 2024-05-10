<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendPendingFunding extends Mailable
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
        $fromConfig = Setting::get('email_from_address');
        $fromNameConfig = Setting::get('email_from_name');
        
        if(!empty($this->attach)){
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Account Pending Funding")
                ->attach($this->attach, [
                    'as' => 'Bank Instruction.pdf',
                    'mime' => 'application/pdf',
                ])
                ->markdown('emails.sendPendingFunding');

        } else {
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Account Pending Funding")
                ->markdown('emails.sendPendingFunding');

        }
    }
}
