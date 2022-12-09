<?php

namespace App\Http\Controllers\Ecom;

use App\Http\Controllers\Controller;
use App\Models\Ecom\Products;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('admin.products.create');

    }
}
