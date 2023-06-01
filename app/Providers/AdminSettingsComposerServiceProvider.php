<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AdminSettingsComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {

        // Using class based composers...
        View::composer(
            [
                'layouts.back',
                'back.main.main',

                'back.categories.add',
                'back.categories.edit',
                'back.categories.list',

                'back.settings.add',
                'back.settings.edit',
                'back.settings.list',

                'back.main.add',
                'back.main.edit',
                'back.main.list',

                'back.users.add',
                'back.users.edit',
                'back.users.list',

                'back.settings.add',
                'back.settings.edit',
                'back.settings.list',

                'back.menus.add',
                'back.menus.edit',
                'back.menus.list',

                'back.entities.add',
                'back.entities.edit',
                'back.entities.list',

                'back.articletypes.add',
                'back.articletypes.edit',
                'back.articletypes.list',

                'back.articles.add',
                'back.articles.edit',
                'back.articles.list',

                'back.sliders.add',
                'back.sliders.edit',
                'back.sliders.list',


            ], 'App\ViewComposers\back\SettingsComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
