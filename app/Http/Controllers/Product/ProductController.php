<?php

namespace App\Http\Controllers\Product;

use App\Models\Tax;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    function categoryform()
    {
        $categories=ProductCategory::all();
        return view('Admin.products.categories')
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
        $notification = array(
          'message' => "Product Category Added Successfully",
          'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
        // ->with('message','Category name added successfully.');
    }

    function categoryUpdateView($id)
    {
        $categories=ProductCategory::find($id);
        return response()->json($categories);
    }

    public function UpdateCategory(Request $request)
    {

        $categories =ProductCategory::findOrFail($request->id);


        $image = $request->image;
        if ($image) {
            $image = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('ProductImage/CategoryImage/', $image);
            $categories->image = $image;
        }

        $categories->name = $request->name;

        $categories->update();
        $notification = array(
          'message' => "Product Category updated Successfully",
          'alert-type' => 'success'
       );
       return redirect()->back()->with($notification);
        // ->with('message','Category name added successfully.');
    }
    
    function productform()
    {
        $productcategorys=ProductCategory::all();
        $taxs=Tax::all();
        return view('Admin.products.createproduct')->with('productcategory', $productcategorys)->with('tax', $taxs);
    }
    function productformsubmit(Request $req)
    {
        $req->validate([
            'category' => 'required|exists:product_categories,id',
           
         ]);
          $product=new Product();
          $product->name=$req->name;
          $product->product_category_id=$req->category;
          if($req->tax=="Please Select")
          {
            $product->tax_id=null;
          }
          else{
            $product->tax_id=$req->tax;
          }
          
          $product->purchase_price=$req->purchasePrice;
          $product->description=$req->description;
          if($req->status=="Please Select")
          {
            $product->status=null;
          }
          else{
            $product->status=$req->status;
          }
          
          
          $product->selling_price=$req->sellingPrice;
          $image = $req->image;
        if ($image) {
            $image = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('Product/Image/', $image);
            $product->image = $image;
        }
        $product->save();

        $notification = array(
            'message' => 'Product Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    protected function productEditView($id)
    {
        $product=Product::find($id);
        $productcategory=ProductCategory::all();
        $tax=Tax::all();
        return view('Admin.products.UpdateProduct',compact('product','productcategory','tax'));
    }

    function productUpdate(Request $req,$id)
    {
        $req->validate([
            'category' => 'required|exists:product_categories,id',
           
         ]);
          $product=Product::find($id);
          $product->name=$req->name;
          $product->product_category_id=$req->category;
          if($req->tax=="Please Select")
          {
            $product->tax_id=null;
          }
          else{
            $product->tax_id=$req->tax;
          }
          
          $product->purchase_price=$req->purchasePrice;
          $product->description=$req->description;
          if($req->status=="Please Select")
          {
            $product->status=null;
          }
          else{
            $product->status=$req->status;
          }
          
          
          $product->selling_price=$req->sellingPrice;
          $image = $req->image;
        if ($image) {
            $image = time() . '.' . $image->getClientOriginalExtension();
            $req->image->move('Product/Image/', $image);
            $product->image = $image;
        }
        $product->update();

        $notification = array(
            'message' => 'Product Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    protected function productIndex()
    {
        $product=Product::all();
        return view('Admin.products.productindex')
        ->with('product',$product);
    }

    protected function openStock($id)
   {

    $product = Product::find($id);
      return view('Admin.products.stockmodal', compact('product'));
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