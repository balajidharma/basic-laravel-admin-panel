<?php

namespace App\Http\Controllers\Ecom;

use App\Models\Ecom\Stores;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = (new Stores)->newQuery();

        if (request()->has('search')) {
            $stores->where('name', 'Like', '%'.request()->input('search').'%');
        }

        if (request()->query('sort')) {
            $attribute = request()->query('sort');
            $sort_order = 'ASC';

            if (strncmp($attribute, '-', 1) === 0) {
                $sort_order = 'DESC';
                $attribute = substr($attribute, 1);
            }

            $stores->orderBy($attribute, $sort_order);
        }
        else {
            $stores->latest();
        }

        $stores = $stores->paginate(5)->onEachSide(2);

        return view('admin.store.index', compact('stores'));
    }
}
