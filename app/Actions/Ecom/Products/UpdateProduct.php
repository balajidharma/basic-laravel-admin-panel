<?php

namespace App\Actions\Ecom\Products;

use App\Models\Ecom\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UpdateProduct
{
    public function handle(Request $request, Products $products): Products
    {



        if ($request->hasFile('image')){

            $fileName = time().'.'.$request->image->extension();
            $img =  $request->image->storeAs('products', $fileName);
            if(file_exists('storage/' . $request->image_name)) {
                unlink('storage/' . $request->image_name);
            }

        }else{
            $img = $request->image_name;
        }


        $products->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'count' => $request->count,
            'image' => $img,
        ]);

        return $products;
    }
}
