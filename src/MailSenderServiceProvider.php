<?php

namespace Preshetin\MailSender;

use Illuminate\Support\ServiceProvider;

class MailSenderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
//         $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/Resource/views', 'mail-sender');

        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
