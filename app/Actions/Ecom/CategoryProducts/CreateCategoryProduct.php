<?php

namespace App\Actions\Ecom\CategoryProducts;

use App\Models\Ecom\CategoryProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateCategoryProduct
{
    public function handle(Request $request): CategoryProducts
    {

       $fileName = time().'.'.$request->image->extension();
       $img =  $request->image->storeAs('products_category', $fileName);

        $categoryProducts = CategoryProducts::create([
            'name' => $request->name,
            'image' => $img,
        ]);


        return $categoryProducts;
    }
}
