<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use BalajiDharma\LaravelAdminCore\Actions\Role\RoleCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Role\RoleUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Role\RoleCreateData;
use BalajiDharma\LaravelAdminCore\Data\Role\RoleUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\RoleGrid;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Role::class);
        $roles = (new Role)->newQuery()->with(['permissions']);

        $crud = (new RoleGrid)->list($roles);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Role::class);
        $crud = (new RoleGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleCreateData $data, RoleCreateAction $roleCreateAction)
    {
        $this->authorize('adminCreate', Role::class);
        $roleCreateAction->handle($data);

        return redirect()->route('admin.role.index')
            ->with('message', 'Role created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Role $role)
    {
        $this->authorize('adminView', $role);
        $crud = (new RoleGrid)->show($role);

        return view('admin.crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Role $role)
    {
        $this->authorize('adminUpdate', $role);

        $crud = (new RoleGrid)->form($role);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleUpdateData $data, Role $role, RoleUpdateAction $roleUpdateAction)
    {
        $this->authorize('adminUpdate', $role);
        $roleUpdateAction->handle($data, $role);

        return redirect()->route('admin.role.index')
            ->with('message', 'Role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $this->authorize('adminDelete', $role);
        $role->delete();

        return redirect()->route('admin.role.index')
            ->with('message', __('Role deleted successfully'));
    }
}
