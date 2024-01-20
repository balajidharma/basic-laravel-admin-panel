<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use BalajiDharma\LaravelAdminCore\Requests\StoreMenuItemRequest;
use BalajiDharma\LaravelAdminCore\Requests\UpdateMenuItemRequest;
use BalajiDharma\LaravelMenu\Models\Menu;
use BalajiDharma\LaravelMenu\Models\MenuItem;

class MenuItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:menu list', ['only' => ['index', 'show']]);
        $this->middleware('can:menu create', ['only' => ['create', 'store']]);
        $this->middleware('can:menu edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:menu delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Menu $menu)
    {
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
        $item_options = MenuItem::selectOptions($menu->id, null, true);
        $roles = Role::all();

        return view('admin.menu.item.create', compact('menu', 'item_options', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreMenuItemRequest $request, Menu $menu)
    {
        if (! $request->has('enabled')) {
            $request['enabled'] = false;
        }

        $menu->menuItems()->create($request->except(['roles']));

        $roles = $request->roles ?? [];
        $menu->assignRole($roles);

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
    public function update(UpdateMenuItemRequest $request, Menu $menu, MenuItem $item)
    {
        if (! $request->has('enabled')) {
            $request['enabled'] = false;
        }

        $item->update($request->except(['roles']));

        $roles = $request->roles ?? [];
        $item->syncRoles($roles);

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
        $item->delete();

        return redirect()->route('admin.menu.item.index', $menu->id)
            ->with('message', __('Menu deleted successfully'));
    }
}
