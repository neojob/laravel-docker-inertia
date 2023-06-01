<?php
namespace App\ViewComposers\back;

use Illuminate\View\View;
use App\Library\Settings;


class SettingsComposer
{

    protected $settings;

    /**
     * Create a new profile composer.
     * @return void
     */
    public function __construct()
    {
        $this->settings = Settings::instance();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('settings', $this->settings);
    }
}