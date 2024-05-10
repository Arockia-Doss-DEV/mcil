<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Setting;

class SendReInvestmentSuccessNotice extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $attach, $base_path, $fileName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $attach, $base_path, $fileName)
    {
        $this->data = $data;
        $this->attach = $attach;
        $this->attachmentFile = $base_path.$fileName;
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
        
        if(!empty($this->attachmentFile)){

            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Your re-investment was created successfully")
                ->attach($this->attach, [
                    'as' => 'Reinvestment Pfia.pdf',
                    'mime' => 'application/pdf',
                ])
                ->markdown('emails.sendReInvestmentSuccessNotice');
        }else{
            return $this
                ->from($fromConfig, $fromNameConfig)
                ->subject("Your re-investment was created successfully")
                ->markdown('emails.sendReInvestmentSuccessNotice');
        }

        
    }
}
