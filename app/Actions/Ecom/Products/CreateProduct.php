<?php

namespace App\Actions\Ecom\Products;

use App\Models\Ecom\CategoryProducts;
use App\Models\Ecom\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateProduct
{
    public function handle(Request $request): Products
    {


        $fileName = time().'.'.$request->image->extension();
        $request->image->storeAs('products', $fileName);


        $categoryProducts = Products::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'count' => $request->count,
            'image' => $request->image,
        ]);


        return $categoryProducts;
    }
}
