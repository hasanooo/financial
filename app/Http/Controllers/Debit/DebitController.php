<?php

namespace App\Http\Controllers\Debit;

use App\Http\Controllers\Controller;
use App\Models\DCategory;
use App\Models\DebitCash;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class DebitController extends Controller
{
    protected function debitIndex()
    {
        $debit = DebitCash::all();
        return view('Admin.Debit.debitindex',compact('debit'));
    }

    protected function debitCreate()
    {
        $d_category = DCategory::all();
        return view('Admin.Debit.createdebit', compact('d_category'));
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

    public function CreateDebit(Request $request)
    {
        $debit = new DebitCash();
        $debit->d_category_id = $request->d_category_id;
        $debit->date = $request->date;
        $debit->particuler = $request->particuler;
        $debit->cash = $request->cash;
        $debit->save();
        return redirect()->back();
    }

    public function DeleteDebit($id)
    {
        $debitID = DebitCash::find($id);
        $debitID->delete();
        return back();
    }
    public function DebitEditView($id)
    {
        $debit = DebitCash::find($id);
        $category = DCategory::all();
        return view("Admin.Debit.editdebit",compact('debit','category'));
    }

    public function UpdateDebit(Request $request, $id)
    {
        $debit = DebitCash::find($id);
        $debit->d_category_id = $request->d_category_id;
        $debit->date = $request->date;
        $debit->particuler = $request->particuler;
        $debit->cash = $request->cash;
        $debit->update();
        return redirect()->back();
    }
}
