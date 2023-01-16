<?php
 
namespace App\View\Composers;
 
use BalajiDharma\LaravelMenu\Models\Menu;
use Illuminate\View\View;
 
class MenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var \BalajiDharma\LaravelMenu\Models\Menu
     */
    protected $menu;
 
    /**
     * Create a new profile composer.
     *
     * @param  \BalajiDharma\LaravelMenu\Models\Menu  $menu
     * @return void
     */
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menus', $this->menu::getMenuTree('admin'));
    }
}