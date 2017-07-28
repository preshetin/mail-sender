<?php

namespace Preshetin\MailSender;

trait MailSenderTrait
{
    /**
     * Morph many mail logs.
     *
     * @return mixed
     */
    public function mail_logs()
    {
        return $this->morphMany(\Preshetin\MailSender\Model\MailLog::class, 'mailable');
    }
}
