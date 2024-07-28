<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Actions\CategoryType\CategoryTypeCreateAction;
use BalajiDharma\LaravelAdminCore\Actions\CategoryType\CategoryTypeUpdateAction;
use BalajiDharma\LaravelAdminCore\Data\CategoryType\CategoryTypeCreateData;
use BalajiDharma\LaravelAdminCore\Data\CategoryType\CategoryTypeUpdateData;
use BalajiDharma\LaravelCategory\Models\CategoryType;
use BalajiDharma\LaravelFormBuilder\FormBuilder;

class CategoryTypeController extends Controller
{
    protected $title = 'Category Types';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('adminViewAny', CategoryType::class);
        $categoryTypes = (new CategoryType)->newQuery();

        if (request()->has('search')) {
            $categoryTypes->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';
            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }
            $categoryTypes->orderBy($attribute, $sort_order);
        } else {
            $categoryTypes->latest();
        }

        $categoryTypes = $categoryTypes->paginate(config('admin.paginate.per_page'))
            ->onEachSide(config('admin.paginate.each_side'));

        return view('admin.category.type.index', compact('categoryTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(FormBuilder $formBuilder)
    {
        $this->authorize('adminCreate', CategoryType::class);

        $form = $formBuilder->create(\App\Forms\Admin\CategoryTypeForm::class, [
            'method' => 'POST',
            'url' => route('admin.category.type.store'),
        ]);

        $title = $this->title;

        return view('admin.form.edit', compact('form', 'title'));
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
    public function edit(CategoryType $type, FormBuilder $formBuilder)
    {
        $this->authorize('adminUpdate', $type);

        $form = $formBuilder->create(\App\Forms\Admin\CategoryTypeForm::class, [
            'method' => 'PUT',
            'url' => route('admin.category.type.update', $type->id),
            'model' => $type,
        ]);

        $title = $this->title;

        return view('admin.form.edit', compact('form', 'title'));
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
