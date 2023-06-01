<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class TranslateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],'App\ViewComposers\back\TranslateComposer');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
