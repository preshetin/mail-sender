# mail-sender
Mail block that sends email by template for Laravel 5.3 / Laraflock Dashboard

## Install

1. Require in composer:
```
composer require preshetin/mail-sender:dev-master
```

2. Then register in `config/app.php` 
```
providers' => [
    ...
    Preshetin\MailSender\MailSenderServiceProvider::class,
];
```

3. Add `MailableEntity` interface & `MailSenderTrait` trait in any Eloquent model:
```
use Preshetin\MailSender\MailSenderTrait;
use Preshetin\MailSender\Model\MailableEntity;

class Order extends Model implements MailableEntity
{
    use MailSenderTrait;
    
    // ...
}
```

4. `MailableEntity` interface will require you to add a couple of methods:

This is where email sends TO:
```
public function getEmail()
{
    return $this->user->email;
}
```

And `getMailTemplateReplacements`  which gets values for mail template variables:

```
public function getMailTemplateReplacements()
{
    return [
        '[ORDER_ID]' => $this->id,
        '[NAME]'     => $this->user->name,
        ...     
    ];
}
```

That's it! Now you may insert Blade templates and get mail send functionality!

## Usage

Add in blade templates:
```
@include('mail-sender::partials.mail', ['mailable_entity' => $order])
```

Also, you may add to your sidebar:
```
@include('mail-sender::partials.sidebar')
```

## Configuration

You may `php artisan vendor:publish` config `mail-sender.php`. There you may ajust a view for emails:

```
'mail_view' => 'emails.your_custom_view',
```
