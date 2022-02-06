<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CronMail extends Mailable
{
    use Queueable, SerializesModels;
    public $messageText;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($messageText)
    {
        $this->messageText = $messageText;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('helenKim@gmail.com')
            ->subject('Test emails')
            ->with([
                'messageText' => $this->messageText
            ])
            ->view('mails.cron');
    }
}
