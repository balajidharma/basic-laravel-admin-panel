<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\CategoryType\CategoryTypeCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\CategoryType\CategoryTypeUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\CategoryType\CategoryTypeCreateData;
use BalajiDharma\LaravelAdminCore\Data\CategoryType\CategoryTypeUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\CategoryTypeGrid;
use BalajiDharma\LaravelCategory\Models\CategoryType;

class CategoryTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', CategoryType::class);
        $categoryTypes = (new CategoryType)->newQuery()->with(['categories']);
        $crud = (new CategoryTypeGrid)->list($categoryTypes);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', CategoryType::class);
        $crud = (new CategoryTypeGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryTypeCreateData $data, CategoryTypeCreateAction $categoryTypeCreateAction)
    {
        $this->authorize('adminCreate', CategoryType::class);
        $categoryTypeCreateAction->handle($data);

        return redirect()->route('admin.category.type.index')
            ->with('message', 'Category type created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BalajiDharma\LaravelCategory\Models\CategoryType  $categoryType
     * @return \Illuminate\View\View
     */
    public function edit(CategoryType $type)
    {
        $this->authorize('adminUpdate', $type);
        $crud = (new CategoryTypeGrid)->form($type);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \BalajiDharma\LaravelCategory\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryTypeUpdateData $data, CategoryType $type, CategoryTypeUpdateAction $categoryTypeUpdateAction)
    {
        $this->authorize('adminUpdate', $type);
        $categoryTypeUpdateAction->handle($data, $type);

        return redirect()->route('admin.category.type.index')
            ->with('message', 'Category type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BalajiDharma\LaravelCategory\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CategoryType $type)
    {
        $this->authorize('adminDelete', $type);
        $type->delete();

        return redirect()->route('admin.category.type.index')
            ->with('message', __('Category type deleted successfully'));
    }
}
