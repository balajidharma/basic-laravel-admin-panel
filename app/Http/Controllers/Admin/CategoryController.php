<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\Category\CategoryCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\Category\CategoryUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\Category\CategoryCreateData;
use BalajiDharma\LaravelAdminCore\Data\Category\CategoryUpdateData;
use BalajiDharma\LaravelAdminCore\Grid\CategoryItemGrid;
use BalajiDharma\LaravelCategory\Models\Category;
use BalajiDharma\LaravelCategory\Models\CategoryType;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(CategoryType $type)
    {
        if (request()->has('search') && request()->has('autocomplete')) {
            return $this->autocomplete($type);
        }
        $this->authorize('adminViewAny', Category::class);

        if ($type->is_flat) {
            $categories = (new Category)->newQuery()->whereRelation('categoryType', 'id', $type->id);
            $crud = (new CategoryItemGrid);
            $crud->setAddtional(['type' => $type]);
            $crud = $crud->list($categories);

            return view('admin.crud.index', compact('crud'));
        }
        $items = (new Category)->toTree($type->id, true);

        return view('admin.category.item.index', compact('items', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(CategoryType $type)
    {
        $this->authorize('adminCreate', Category::class);
        $categoryItemGrid = (new CategoryItemGrid);
        $categoryItemGrid->setAddtional(['type' => $type]);
        $crud = $categoryItemGrid->form();

        return view('admin.crud.edit', compact('crud'));
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
    public function edit(CategoryType $type, Category $item)
    {
        $this->authorize('adminUpdate', $item);
        $categoryItemGrid = (new CategoryItemGrid);
        $categoryItemGrid->setAddtional(['type' => $type]);
        $crud = $categoryItemGrid->form($item);

        return view('admin.crud.edit', compact('crud'));
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

    public function autocomplete(CategoryType $type)
    {
        $categories = (new Category)->where('name', 'like', '%'.request()->search.'%')
            ->where('category_type_id', $type->id)
            ->limit(5)
            ->get(['id', 'name']);

        $formattedCategories = $categories->map(function ($category) {
            return [
                'value' => $category->name,
            ];
        });

        return response()->json($formattedCategories);
    }
}
