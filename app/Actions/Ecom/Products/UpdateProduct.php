<?php

namespace App\Actions\Ecom\Products;

use App\Models\Ecom\Products;
use Illuminate\Http\Request;


class UpdateProduct
{
    public function handle(Request $request, Products $products): Products
    {

        $products->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'count' => $request->count,
        ]);

        return $products;
    }
}
