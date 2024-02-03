<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BalajiDharma\LaravelAdminCore\Requests\StoreCategoryTypeRequest;
use BalajiDharma\LaravelAdminCore\Requests\UpdateCategoryTypeRequest;
use BalajiDharma\LaravelCategory\Models\CategoryType;

class CategoryTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:category.type list', ['only' => ['index']]);
        $this->middleware('can:category.type create', ['only' => ['create', 'store']]);
        $this->middleware('can:category.type edit', ['only' => ['edit', 'update']]);
        $this->middleware('can:category.type delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
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
    public function create()
    {
        return view('admin.category.type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCategoryTypeRequest $request)
    {
        if (! $request->has('is_flat')) {
            $request['is_flat'] = false;
        }

        CategoryType::create([
            'name' => $request->name,
            'machine_name' => $request->machine_name,
            'description' => $request->description,
            'is_flat' => $request->is_flat,
        ]);

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
        return view('admin.category.type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \BalajiDharma\LaravelCategory\Models\CategoryType  $categoryType
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCategoryTypeRequest $request, CategoryType $type)
    {
        if (! $request->has('is_flat')) {
            $request['is_flat'] = false;
        }

        $type->update($request->all());

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
        $type->delete();

        return redirect()->route('admin.category.type.index')
            ->with('message', __('Category type deleted successfully'));
    }
}
