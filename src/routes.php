<?php

// Mail Templates
$this->app['router']->group([

    'prefix' => 'mail-sender',
    'as' => 'mail-sender.',
    'namespace' => 'Preshetin\MailSender\Controller',
    'middleware' => ['web', 'user']

], function () {

    // Mails
    $this->app['router']->group(['prefix' => 'mails', 'as' => 'mails.'], function () {

        $this->app['router']->post('/',        ['as' => 'store',    'uses' => 'MailController@store']);
        $this->app['router']->post('generate', ['as' => 'generate', 'uses' => 'MailController@generate']);
    });

    // Mail templates
    $this->app['router']->group(['prefix' => 'templates', 'as' => 'templates.'], function () {

        $this->app['router']->get('/',          ['as' => 'index',  'uses' => 'MailTemplateController@index']);
        $this->app['router']->get('{id}/edit',  ['as' => 'edit',   'uses' => 'MailTemplateController@edit']);
        $this->app['router']->post('{id}/edit', ['as' => 'update', 'uses' => 'MailTemplateController@update']);
    });
});

