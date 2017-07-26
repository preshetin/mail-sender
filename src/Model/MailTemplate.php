<?php

namespace Preshetin\MailSender\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string body
 * @property string subject
 */
class MailTemplate extends Model
{
    protected $fillable = ['slug', 'name', 'subject', 'body'];
}
