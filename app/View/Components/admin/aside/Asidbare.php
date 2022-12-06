<?php

namespace App\View\Components\admin\aside;

use Illuminate\View\Component;

class Asidbare extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $route;
    public $title;

    public function __construct($route = '',$title = '')
    {
        $this->title = $title;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.aside.asidbare');
    }
}
