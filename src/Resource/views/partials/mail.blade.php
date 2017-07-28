
<div class="row">
    <div class="col-md-6">

        {!! BootForm::open()->post()->action(route('mail-sender.mails.store')) !!}

            <h4>From: <a href="mailto:{{ \Cartalyst\Sentinel\Laravel\Facades\Sentinel::getUser()->email }}">{{ \Cartalyst\Sentinel\Laravel\Facades\Sentinel::getUser()->email }}</a></h4>
            <h4>To: <a href="mailto:{{ $mailable_entity->getEmail() }}">{{ $mailable_entity->getEmail() }}</a></h4>

            {!! BootForm::hidden('mailable_entity_id')
                    ->value($mailable_entity->id) !!}

            {!! BootForm::hidden('mailable_entity_class')
                    ->value(get_class($mailable_entity)) !!}

            {!! BootForm::hidden('from')
                    ->value(\Cartalyst\Sentinel\Laravel\Facades\Sentinel::getUser() ? \Cartalyst\Sentinel\Laravel\Facades\Sentinel::getUser()->email : '') !!}

            {!! BootForm::hidden('to')->value($mailable_entity->getEmail()) !!}

            {!! BootForm::select('Template', 'template')
                    ->id('mail-template')
                    ->options(['' => ' - '] + \Preshetin\MailSender\Model\MailTemplate::all()->pluck('name', 'id')->toArray())
                    ->data('mailable-entity-id', $mailable_entity->id)
                    ->data('mailable-entity-class', get_class($mailable_entity)) !!}

            {!! BootForm::text('Subject', 'subject')
                    ->id('mail-subject') !!}

            {!! BootForm::textarea('Body', 'body')
                ->id('mail-body') !!}
        
            {!! BootForm::submit('Send Mail', 'send_mail')
                    ->class('btn btn-success') !!}

        {!! BootForm::close() !!}

    </div>
    <div class="col-md-6">
        @if($mailable_entity->mail_logs->count())
            @foreach($mailable_entity->mail_logs as $mail_log)
                <div class="box box-default collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $mail_log->subject }}</h3>
                        <div class="box-tools pull-right">
                            {{ $mail_log->created_at->diffForHumans() }}
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="box-body" style="display: none;">
                        From: <a href="mailto:{{ $mail_log->from }}">{{ $mail_log->from }}</a><br>
                        To: <a href="mailto:{{ $mail_log->to }}">{{ $mail_log->to }}</a><br>
                        Subject: {{ $mail_log->subject }}<br>
                        Sent at: {{ $mail_log->created_at }}<br>
                            @if($mail_log->attachments)
                            Attachments:
                                <ul>
                                    @foreach($mail_log->attachments as $attachment)
                                        <li>
                                            <?php
                                                $arr = explode('/', $attachment);
                                                echo end($arr);
                                            ?>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                        <hr>
                        {!! nl2br(e($mail_log->body)) !!}
                    </div>
                </div>
            @endforeach
        @else
            <p class="lead">No mails yet.</p>
        @endif
    </div>
</div>


@section('footer-extras')
    @parent

    <script type="text/javascript">
        $(function () {

            $('#mail-template').on('change', function () {

                var templateId = $(this).val();
                var mailableEntityId = $(this).data('mailable-entity-id');
                var mailableEntityClass = $(this).data('mailable-entity-class');

                $.ajax({
                    url: '{{ route('mail-sender.mails.generate') }}',
                    type: "POST",
                    dataType: 'json',
                    data: {
                        'template_id': templateId,
                        'mailable_entity_id': mailableEntityId,
                        'mailable_entity_class': mailableEntityClass
                    },
                    success: function(data){
                        $('#mail-subject').val(data.subject);
                        $('#mail-body').val(data.body);
                    }
                });
            });
        });
    </script>
@stop