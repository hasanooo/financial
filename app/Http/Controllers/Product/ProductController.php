<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function categoryform()
    {
        return view('admin.Products.categories');
    }
    public function AddCategory(Request $request)
    {

       

        $request->validate(
            [
                'image' => 'image|mimes:jpeg,png,jpg|max:2048',
                'name' => 'required',
            ],
            [
                'image.image' => 'The uploaded file is not a valid image.',
                'image.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
                'image.max' => 'The image size cannot exceed 2MB.',
            ]
        );

        $categories = new ProductCategory();


        $image = $request->image;
        if ($image) {
            $image = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('ProductImage/CategoryImage/', $image);
            $categories->image = $image;
        }

        $categories->name = $request->name;

        $categories->save();
        return redirect()->back();
        // ->with('message','Category name added successfully.');
    }
    function productform()
    {
        return view('admin.Products.createproduct');
    }
}