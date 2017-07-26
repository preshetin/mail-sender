<?php
namespace Preshetin\MailSender\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Laraflock\Dashboard\Controllers\BaseDashboardController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Preshetin\MailSender\Mail\CustomMail;
use Preshetin\MailSender\Model\MailableEntity;
use Preshetin\MailSender\Model\MailTemplate;
use Preshetin\MailSender\Service\MailGenerator;

class MailController extends BaseDashboardController
{
    use ValidatesRequests;

    /**
     * Sens email and store mail log.
     * 
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'mailable_entity_id' => 'required',
            'mailable_entity_class' => 'required',
            'from' => 'required|email',
            'to' => 'required|email',
        ]);

        $mailable_entity = self::getMailableEntity($request->mailable_entity_id, $request->mailable_entity_class);
        $mailable_entity->mail_logs()->create($request->all());

        \Mail::to($request->to)->send(new CustomMail($request->from, $request->subject, $request->body, $request->attachments));
        
        Flash::success('Mail sent!');

        return Redirect::to(URL::previous() . "#mail");
    }

    /**
     * Generate email subject & body from template.
     * 
     * @param Request $request
     * @param MailGenerator $mailGenerator
     * @return array
     */
    public function generate(Request $request, MailGenerator $mailGenerator)
    {
        $mailableEntity = self::getMailableEntity($request->mailable_entity_id, $request->mailable_entity_class);
        $template = MailTemplate::find($request->template_id);
        
        return [
            'subject' => $mailGenerator->getSubject($template, $mailableEntity),
            'body' => $mailGenerator->getBody($template, $mailableEntity)
        ];
    }

    /**
     * Get mailable entity.
     *
     * @param integer $mailable_entity_id
     * @param string $mailable_entity_class
     * @return MailableEntity
     */
    private static function getMailableEntity($mailable_entity_id, $mailable_entity_class)
    {
        $mailable_entity = $mailable_entity_class::find($mailable_entity_id);

        return $mailable_entity;
    }
}
