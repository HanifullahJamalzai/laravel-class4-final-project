<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EditButtonComponent extends Component
{
    public $route;
    public $routeKey;
    public $routeName;

    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct($route, $routeKey, $routeName)
    {
        // dd($route);
        $this->$route = $route;
        $this->$routeKey = $routeKey;
        $this->$routeName = $routeName;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->route);
        return view('components.edit-button-component');
    }
}
