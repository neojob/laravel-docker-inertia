<?php

namespace App\ViewComposers\front;

use Illuminate\View\View;
use App\Models\Menu;
class MenuComposer
{

    protected $all_menus;

    /**
     * Create a new profile composer.
     * @return void
     */
    public function __construct()
    {
        $all_menus = Menu::all();
        $this->all_menus = $all_menus;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('all_menus', $this->all_menus);
    }
}