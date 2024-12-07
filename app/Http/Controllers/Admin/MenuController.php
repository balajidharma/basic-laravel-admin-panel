<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Menu\MenuCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Menu\MenuUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Menu\MenuCreateData;
use BalajiDharma\LaravelAdminCore\Data\Menu\MenuUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\MenuGrid;
use BalajiDharma\LaravelMenu\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Menu::class);
        $menus = (new Menu)->newQuery()->with(['menuItems']);

        $crud = (new MenuGrid)->list($menus);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Menu::class);
        $crud = (new MenuGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuCreateData $data, MenuCreateAction $menuCreateAction)
    {
        $this->authorize('adminCreate', Menu::class);
        $menuCreateAction->handle($data);

        return redirect()->route('admin.menu.index')
            ->with('message', 'Menu created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu)
    {
        $this->authorize('adminUpdate', $menu);
        $crud = (new MenuGrid)->form($menu);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MenuUpdateData $data, Menu $menu, MenuUpdateAction $menuUpdateAction)
    {
        $this->authorize('adminUpdate', $menu);
        $menuUpdateAction->handle($data, $menu);

        return redirect()->route('admin.menu.index')
            ->with('message', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu)
    {
        $this->authorize('adminDelete', $menu);
        $menu->delete();

        return redirect()->route('admin.menu.index')
            ->with('message', __('Menu deleted successfully'));
    }
}
