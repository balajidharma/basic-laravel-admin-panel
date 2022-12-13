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

        if ($request->hasFile('image')){

            $fileName = time().'.'.$request->image->extension();
            $img =  $request->image->storeAs('products_category', $fileName);

            if(file_exists('storage/' . $request->image_name)) {
                unlink('storage/' . $request->image_name);
            }

        }else{
            $img = $request->image_name;
        }


        $categoryProducts->update([
            'name' => $request->name,
                        'image' => $img,
        ]);

        return $categoryProducts;
    }
}
