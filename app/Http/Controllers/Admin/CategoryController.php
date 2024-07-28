<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Category\CategoryCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Category\CategoryUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Category\CategoryCreateData;
use BalajiDharma\LaravelAdminCore\Data\Category\CategoryUpdateData;
use BalajiDharma\LaravelCategory\Models\Category;
use BalajiDharma\LaravelCategory\Models\CategoryType;
use BalajiDharma\LaravelFormBuilder\FormBuilder;

class CategoryController extends Controller
{
    protected $title = 'Categories';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(CategoryType $type)
    {
        $this->authorize('adminViewAny', Category::class);
        $items = (new Category)->toTree($type->id, true);

        return view('admin.category.item.index', compact('items', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(CategoryType $type, FormBuilder $formBuilder)
    {
        $this->authorize('adminCreate', Category::class);

        $form = $formBuilder->create(\App\Forms\Admin\CategoryItemForm::class, [
            'method' => 'POST',
            'url' => route('admin.category.type.item.store', ['type' => $type->id]),
        ], ['type' => $type]);

        $title = $this->title;

        return view('admin.form.edit', compact('form', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryCreateData $data, CategoryType $type, CategoryCreateAction $categoryCreateAction)
    {
        $this->authorize('adminCreate', Category::class);
        $categoryCreateAction->handle($data, $type);

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', 'Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(CategoryType $type, Category $item, FormBuilder $formBuilder)
    {
        $this->authorize('adminUpdate', $item);

        $form = $formBuilder->create(\App\Forms\Admin\CategoryItemForm::class, [
            'method' => 'PUT',
            'url' => route('admin.category.type.item.update', ['type' => $type->id, 'item' => $item->id]),
            'model' => $item,
        ], ['type' => $type]);

        $title = $this->title;

        return view('admin.form.edit', compact('form', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CategoryUpdateData $data, CategoryType $type, Category $item, CategoryUpdateAction $categoryUpdateAction)
    {
        $this->authorize('adminUpdate', $item);
        $categoryUpdateAction->handle($data, $item);

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BalajiDharma\LaravelCategory\Models\Category  $typeItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CategoryType $type, Category $item)
    {
        $this->authorize('adminDelete', $item);
        $item->delete();

        return redirect()->route('admin.category.type.item.index', $type->id)
            ->with('message', __('Category deleted successfully'));
    }
}
