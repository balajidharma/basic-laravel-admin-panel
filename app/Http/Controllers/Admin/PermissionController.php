<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use BalajiDharma\LaravelAdminCore\Actions\Permission\PermissionCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Permission\PermissionUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Permission\PermissionCreateData;
use BalajiDharma\LaravelAdminCore\Data\Permission\PermissionUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\PermissionGrid;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Permission::class);
        $permissions = (new Permission)->newQuery();

        $crud = (new PermissionGrid)
            ->setDisplaySearch(true)
            ->setDisplayFilters(false)
            ->list($permissions);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Permission::class);
        $crud = (new PermissionGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PermissionCreateData $data, PermissionCreateAction $permissionCreateAction)
    {
        $this->authorize('adminCreate', Permission::class);
        $permissionCreateAction->handle($data);

        return redirect()->route('admin.permission.index')
            ->with('message', __('Permission created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Permission $permission)
    {
        $this->authorize('adminView', $permission);
        $crud = (new PermissionGrid)->show($permission);

        return view('admin.crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Permission $permission)
    {
        $this->authorize('adminUpdate', $permission);
        $crud = (new PermissionGrid)->form($permission);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PermissionUpdateData $data, Permission $permission, PermissionUpdateAction $permissionUpdateAction)
    {
        $this->authorize('adminUpdate', $permission);
        $permissionUpdateAction->handle($data, $permission);

        return redirect()->route('admin.permission.index')
            ->with('message', __('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Permission $permission)
    {
        $this->authorize('adminDelete', $permission);
        $permission->delete();

        return redirect()->route('admin.permission.index')
            ->with('message', __('Permission deleted successfully'));
    }
}
