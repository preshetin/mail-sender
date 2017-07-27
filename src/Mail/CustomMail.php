<?php

namespace Preshetin\MailSender\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fromEmail;
    public $subject;
    public $body;
    public $paperAttachments;

    /**
     * Create a new message instance.
     *
     * @param $fromEmail
     * @param $subject
     * @param $body
     * @param $paperAttachments
     */
    public function __construct($fromEmail, $subject, $body, $paperAttachments = [])
    {
        $this->fromEmail = $fromEmail;
        $this->subject = $subject;
        $this->body = nl2br(e($body));
        $this->paperAttachments = $paperAttachments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $message = $this->from($this->fromEmail)
            ->subject($this->subject)
            ->view(config('mail-sender.mail_view'));

        if (count($this->paperAttachments) == 0) {
            return $message;
        }

        foreach ($this->paperAttachments as $filePath) {
            $message->attach($filePath);
        }

        return $message;
    }
}
