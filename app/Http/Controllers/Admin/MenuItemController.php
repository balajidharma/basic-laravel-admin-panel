<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use BalajiDharma\LaravelAdminCore\Actions\MenuItem\MenuItemCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\MenuItem\MenuItemUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\MenuItem\MenuItemCreateData;
use BalajiDharma\LaravelAdminCore\Data\MenuItem\MenuItemUpdateData;
use BalajiDharma\LaravelMenu\Models\Menu;
use BalajiDharma\LaravelMenu\Models\MenuItem;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Menu $menu)
    {
        $this->authorize('adminViewAny', MenuItem::class);
        $items = (new MenuItem)->toTree($menu->id, true);

        return view('admin.menu.item.index', compact('items', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Menu $menu)
    {
        $this->authorize('adminCreate', MenuItem::class);
        $item_options = MenuItem::selectOptions($menu->id, null, true);
        $roles = Role::all();

        return view('admin.menu.item.create', compact('menu', 'item_options', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MenuItemCreateData $data, Menu $menu, MenuItemCreateAction $menuItemCreateAction)
    {
        $this->authorize('adminCreate', MenuItem::class);
        $menuItemCreateAction->handle($data, $menu);

        return redirect()->route('admin.menu.item.index', $menu->id)
            ->with('message', 'Menu created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Menu $menu, MenuItem $item)
    {
        $this->authorize('adminUpdate', $item);
        $item_options = MenuItem::selectOptions($menu->id, $item->parent_id ?? $item->id);
        $roles = Role::all();
        $itemHasRoles = array_column(json_decode($item->roles, true), 'id');

        return view('admin.menu.item.edit', compact('menu', 'item', 'item_options', 'roles', 'itemHasRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(MenuItemUpdateData $data, Menu $menu, MenuItem $item, MenuItemUpdateAction $menuItemUpdateAction)
    {
        $this->authorize('adminUpdate', $item);
        $menuItemUpdateAction->handle($data, $item);

        return redirect()->route('admin.menu.item.index', $menu->id)
            ->with('message', 'Menu Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BalajiDharma\LaravelMenu\Models\MenuItem  $menuItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Menu $menu, MenuItem $item)
    {
        $this->authorize('adminDelete', $item);
        $item->delete();

        return redirect()->route('admin.menu.item.index', $menu->id)
            ->with('message', __('Menu deleted successfully'));
    }
}
