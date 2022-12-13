<?php

namespace App\Http\Controllers\Ecom;

use App\Actions\Ecom\CategoryProducts\CreateCategoryProduct;
use App\Actions\Ecom\Products\CreateProduct;
use App\Actions\Ecom\Products\UpdateProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ecom\CategoryProducts\StoreCategoryProductRequest;
use App\Http\Requests\Ecom\CategoryProducts\StoreProductRequest;
use App\Http\Requests\Ecom\CategoryProducts\UpdateProductRequest;
use App\Models\Ecom\CategoryProducts;
use App\Models\Ecom\Products;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = (new Products)->newQuery();

        if (request()->has('search')) {
            $products->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';

            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }

            $products->orderBy($attribute, $sort_order);
        }
        else {
            $products->latest();
        }

        $products = $products->paginate(5)->onEachSide(2);

        return view('admin.products.index', compact('products'));
    }



    public function create()
    {
        $category = CategoryProducts::all();
        return view('admin.products.create')
            ->with('categoryProd',$category);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @param CreateProduct $createProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store( Request $request, CreateProduct $createProduct)
    {


        $createProduct->handle($request);
        toastr()->success('products created successfully.');

        return redirect()->route('products.index');
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param $id
     * @param UpdateProduct $updateCategoryProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit( $id)
    {

        $product = Products::find($id);
        $category = CategoryProducts::all();

        return view('admin.products.edit')
            ->with('products',$product)
            ->with('categoryProd',$category);;
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateProductRequest $request
     * @param $id
     * @param UpdateProduct $updateCategoryProduct
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProductRequest $request, $id, UpdateProduct $updateProduct)
    {

        $product = Products::find($id);
        $updateProduct->handle($request, $product);

        toastr()->success('Product updated successfully.');
        return redirect()->route('products.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy( $product)
    {

        $Product = Products::find($product);

        $Product->delete();

        toastr()->success('Products deleted successfully.');
        return redirect()->route('products.index');

    }
}
