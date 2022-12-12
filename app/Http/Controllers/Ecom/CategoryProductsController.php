<?php

namespace App\Http\Controllers\Ecom;

use App\Actions\Ecom\CategoryProducts\CreateCategoryProduct;
use App\Actions\Ecom\CategoryProducts\UpdateCategoryProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Ecom\CategoryProducts\StoreCategoryProductRequest;
use App\Http\Requests\Ecom\CategoryProducts\UpdateCategoryProductRequest;
use App\Models\Ecom\CategoryProducts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CategoryProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categoryProducts = (new categoryProducts)->newQuery();

        if (request()->has('search')) {
            $categoryProducts->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';

            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }

            $categoryProducts->orderBy($attribute, $sort_order);
        }
        else {
            $categoryProducts->latest();
        }

        $categoryProducts = $categoryProducts->paginate(5)->onEachSide(2);

        return view('admin.category_products.index', compact('categoryProducts'));
    }



    public function create()
    {
        return view('admin.category_products.create');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryProductRequest $request
     * @param CreateCategoryProduct $createCategoryProduct
     * @return Response
     */
    public function store(StoreCategoryProductRequest $request, CreateCategoryProduct $createCategoryProduct)
    {
        $createCategoryProduct->handle($request);
        toastr()->success('Category created successfully.');

        return redirect()->route('categoryProducts.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryProductRequest $request
     * @param CreateCategoryProduct $createCategoryProduct
     * @return Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param CategoryProducts $categoryProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categoryProduct = CategoryProducts::find($id);
        return view('admin.category_products.edit')->with('categoryProducts',$categoryProduct);

    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCategoryProductRequest $request
     * @param $id
     * @param UpdateCategoryProduct $updateCategoryProduct
     * @return RedirectResponse
     */
    public function update(UpdateCategoryProductRequest $request, $id, UpdateCategoryProduct $updateCategoryProduct)
    {

        $categoryProduct = CategoryProducts::find($id);
        $updateCategoryProduct->handle($request, $categoryProduct);

        toastr()->success('User updated successfully.');
        return redirect()->route('categoryProducts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $categoryProducts)
    {
        $categoryProduct = CategoryProducts::find($categoryProducts);

        $categoryProduct->delete();

        toastr()->success('Category products deleted successfully.');
        return redirect()->route('categoryProducts.index');
    }


}
