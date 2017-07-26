<?php
namespace Preshetin\MailSender\Service;

use Preshetin\MailSender\Model\MailableEntity;
use Preshetin\MailSender\Model\MailTemplate;

class MailGenerator
{
    /**
     * Generates mail subject text from template and order.
     *
     * @param MailTemplate $template
     * @param MailableEntity $mailableEntity
     * @return string
     */
    public function getSubject(MailTemplate $template, MailableEntity $mailableEntity)
    {
        return $this->replaceTextWithValues($template->subject, $mailableEntity);
    }

    /**
     * Generates mail body text from template and order.
     *
     * @param MailTemplate $template
     * @param MailableEntity $mailableEntity
     * @return string
     */
    public function getBody(MailTemplate $template, MailableEntity $mailableEntity)
    {
        return $this->replaceTextWithValues($template->body, $mailableEntity);
    }

    /**
     * Returns text string with filled values for available variables.
     *
     * @param string $text
     * @param MailableEntity $mailableEntity
     * @return string
     */
    private function replaceTextWithValues($text, MailableEntity $mailableEntity)
    {
        return strtr($text, $mailableEntity->getMailTemplateReplacements());
    }
}
