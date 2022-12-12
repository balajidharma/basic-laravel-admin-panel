<?php

namespace App\Actions\Ecom\CategoryProducts;

use App\Models\Ecom\CategoryProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CreateCategoryProduct
{
    public function handle(Request $request): CategoryProducts
    {
        $categoryProducts = CategoryProducts::create([
            'name' => $request->name,
        ]);


        return $categoryProducts;
    }
}
