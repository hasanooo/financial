<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function categoryform()
    {
        $categories=ProductCategory::all();
        return view('admin.Products.categories')
        ->with('category',$categories);
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
        $productcategorys=ProductCategory::all();
        $suppliers=Supplier::all();
        return view('admin.Products.createproduct')->with('productcategory', $productcategorys)->with('supplier',$suppliers);
    }
    function productformsubmit(Request $req)
    {
          $product=new Product();
          $product->name=$req->name;
          $product->product_category_id=$req->category;
          $product->supplier_id=$req->supplier;
          $product->purchase_price=$req->price;
          $product->description=$req->des;
          $product->quantity=$req->qty;
          $product->status=$req->status;
          $image = $req->image;
        if ($image) {
            $image = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('Product/Image/', $image);
            $product->image = $image;
        }
        $product->save();

        return redirect(route('prodauct.index'));
    }

    protected function productIndex()
    {
        $product=Product::all();
        return view('Admin.products.productindex')
        ->with('product',$product);
    }

    public function ProductView($id)
    {
        $product = Product::find($id);

        return view('Admin.products.productview',compact('product'));

    }

    public function ProductReport()
    {
        $product=Product::all();
        return view('Admin.products.productreport')
        ->with('product',$product);
    }
}