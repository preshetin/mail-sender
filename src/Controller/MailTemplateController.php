<?php

namespace Preshetin\MailSender\Controller;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Laraflock\Dashboard\Controllers\BaseDashboardController;
use Preshetin\MailSender\Model\MailTemplate;

class MailTemplateController extends BaseDashboardController
{
    use ValidatesRequests;

    /**
     * List of resources.
     * 
     * @return Response
     */
    protected function index()
    {
        return view('mail-sender::templates.mail.index', [
            'mail_templates' => MailTemplate::all(),
        ]);
    }

    /**
     * Edit resource.
     * 
     * @param $id
     * @return Response
     */
    protected function edit($id)
    {
        return view('mail-sender::templates.mail.edit', [
            'template' => MailTemplate::findOrFail($id)
        ]);
    }

    /**
     * Update resource.
     * 
     * @param $id
     * @param Request $request
     * @return Response
     */
    protected function update($id, Request $request)
    {
        $this->validate($request, [
            'slug' => 'required|alpha_dash|unique:mail_templates,slug,' . $id,
            'name' => 'required',
        ]);

        $template = MailTemplate::find($id);

        $template->update($request->all());

        Flash::success('Template updated!');

        return redirect()->route('mail-sender.templates.index');
    }
}
