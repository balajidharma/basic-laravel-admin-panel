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
    public $classactive;

    public function __construct($route = '',$title = '',$classactive = '')
    {
        $this->title = $title;
        $this->route = $route;
        $this->classactive = $classactive;
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
