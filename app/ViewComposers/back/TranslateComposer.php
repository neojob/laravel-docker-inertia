<?php
namespace App\ViewComposers\back;

use Illuminate\View\View;
use App\Library\Translate;

class TranslateComposer
{

    protected $translate;

    /**
     * Create a new profile composer.
     * @return void
     */
    public function __construct()
    {
        $this->translate = Translate::instance();

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('translate', $this->translate);
    }
}