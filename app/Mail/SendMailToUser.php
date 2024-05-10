<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendMailToUser extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $subject;
    public $attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $subject, $attach)
    {
        $this->data = $data;
        $this->subject = $subject;
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
                ->subject($this->subject)
                ->attach($this->attach)
                ->markdown('emails.sendMailToUser');

        } else {
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject($this->subject)
                ->markdown('emails.sendMailToUser');

        }
    }
}
