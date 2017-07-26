<?php

namespace Preshetin\MailSender\Model;

interface MailableEntity
{
    /**
     * An email, to which an email is sending.
     * 
     * @return string
     */
    public function getEmail();

    /**
     * Morph many mail logs.
     * 
     * @return mixed
     */
    public function mail_logs();

    /**
     * Get replacements for mail template.
     * 
     * Example:
     * [
     * '[NAME]' => $this->getName(),
     * '[ADDRESS]' => $this->getAddress()
     * ]
     * 
     * @return array
     */
    public function getMailTemplateReplacements();

}
