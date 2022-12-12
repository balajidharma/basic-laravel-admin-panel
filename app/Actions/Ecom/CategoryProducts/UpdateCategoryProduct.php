<?php

namespace App\Actions\Ecom\CategoryProducts;

use App\Models\Ecom\CategoryProducts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateCategoryProduct
{
    public function handle(Request $request, CategoryProducts $categoryProducts): CategoryProducts
    {

        $categoryProducts->update([
            'name' => $request->name,
        ]);

        return $categoryProducts;
    }
}
