<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Attribute\AttributeCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Attribute\AttributeUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Attribute\AttributeCreateData;
use BalajiDharma\LaravelAdminCore\Data\Attribute\AttributeUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\AttributeGrid;
use BalajiDharma\LaravelAttributes\Models\Attribute;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', Attribute::class);
        $attributes = (new Attribute)->newQuery();
        $crud = (new AttributeGrid)->list($attributes);

        return view('admin.crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('adminCreate', Attribute::class);
        $crud = (new AttributeGrid)->form();

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AttributeCreateData $data, AttributeCreateAction $attributeCreateAction)
    {
        $this->authorize('adminCreate', Attribute::class);
        $attributeCreateAction->handle($data);

        return redirect()->route('admin.attribute.index')
            ->with('message', 'Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function show(Attribute $attribute)
    {
        $this->authorize('adminView', $attribute);
        $crud = (new AttributeGrid)->show($attribute);

        return view('admin.crud.show', compact('crud'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(Attribute $attribute)
    {
        $this->authorize('adminUpdate', $attribute);
        $crud = (new AttributeGrid)->form($attribute);

        return view('admin.crud.edit', compact('crud'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AttributeUpdateData $data, Attribute $attribute, AttributeUpdateAction $attributeUpdateAction)
    {
        $this->authorize('adminUpdate', $attribute);
        $attributeUpdateAction->handle($data, $attribute);

        return redirect()->route('admin.attribute.index')
            ->with('message', 'Attribute updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Attribute $attribute)
    {
        $this->authorize('adminDelete', $attribute);
        $attribute->delete();

        return redirect()->route('admin.attribute.index')
            ->with('message', __('Attribute deleted successfully'));
    }
}
