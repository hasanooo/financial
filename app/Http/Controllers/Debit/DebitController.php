<?php

namespace App\Http\Controllers\Debit;

use App\Http\Controllers\Controller;
use App\Models\DCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class DebitController extends Controller
{
    protected function debitIndex()
    {
        
        return view('Admin.Debit.debitindex');
    }

    protected function debitCreate()
    {
        return view('Admin.Debit.createdebit');
    }

    
    protected function debitCategory()
    {
        $category = DCategory::all();
        return view('Admin.Debit.debitcategory',compact('category'));
    }

    public function CreateCategory(Request $request)
    {
        $category = new DCategory();

        $category->name = $request->categoryname;
        $category->save();
        return redirect()->back();
    }
    public function CategoryView(Request $req)
    {
        $categories=DCategory::where('id',$req->id)->first();
        return response()->json($categories);
    }
    public function EditCategory(Request $request)
    {
        $category=DCategory::where('id',$request->id)->first();
        $category->name = $request->categoryname;
        $category->update();
        return redirect()->back();
    }
    public function DeleteCategory($id)
    {
        $categoryID = DCategory::find($id);

        // if(File::exists("Admin/discountimage/".$discount->image)){
        //     File::delete("Admin/discountimage/".$discount->image);
        // }
        $categoryID->delete();
        return back();
    }
}
