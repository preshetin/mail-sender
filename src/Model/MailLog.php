<?php

namespace Preshetin\MailSender\Model;

use Illuminate\Database\Eloquent\Model;

class MailLog extends Model
{
    protected $fillable = ['from', 'to', 'subject', 'body', 'attachments'];
    
    protected $casts = [
        'attachments' => 'array'
    ];
}
