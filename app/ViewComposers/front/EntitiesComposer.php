<?php

namespace App\ViewComposers\front;

use Illuminate\View\View;
use App\Models\Entity;

class EntitiesComposer
{

    protected $all_entities;

    /**
     * Create a new profile composer.
     * @return void
     */
    public function __construct()
    {
        $all_entities = Entity::all();
        $this->all_entities = $all_entities;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('all_entities', $this->all_entities);
    }
}