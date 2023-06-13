<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CCategory;
use App\Models\CreditCash;
use Carbon\Carbon;
class CreditController extends Controller
{
    protected function creditIndex()
    {

        $credit_index=CreditCash::all();
        return view('Admin.Credit.creditindex')
        ->with('index_credit',$credit_index);
    }

    protected function creditCreate()
    {
        $credit_category=CCategory::all();
        return view('Admin.Credit.createcredit')
        ->with('category_credit',$credit_category);
    }

    protected function creditCreateSubmit(Request $req)
    {

        $req->validate([  
            'date'=>'required|date',
            'cash'=>'required|numeric',
            'c_category_id'=>'required|numeric',
        ], 
        [
            'c_category_id.required'=>'category is required',
        ]
    );
        $credit_create=new CreditCash();
        $credit_create->date=$req->date;
        $credit_create->c_category_id=$req->category;
        $credit_create->particuler=$req->particuler;
        $credit_create->cash=$req->cash;
        $credit_create->save();

        return redirect(route('credit.index'));
        
    }

    

    protected function creditCategory()
    {
        $credit_category=CCategory::all();
        return view('Admin.Credit.creditcategory')
        ->with('category_credit',$credit_category);
    }

    protected function creditCategorySubmit(Request $req)
    {
        $credit_category=new CCategory();
        $credit_category->name=$req->name;
        $credit_category->save();
        return redirect(route('credit.category'));
    }

    protected function creditCategoryDelete(Request $req)
    {
        $credit_category = CCategory::where('id', $req->id)->first();
        $credit_category->delete();

        return back();
    }

    protected function editCreditView($id)
    {
        $credit_create = CreditCash::find($id);
        $credit_category = CCategory::all();
        return view("Admin.Credit.editcredit",compact('credit_create','credit_category'));
        
    }

    protected function editCreditSubmit(Request $req, $id)
    {
        $credit_create = CreditCash::find($id);
        $credit_create->date=$req->date;
        $credit_create->c_category_id=$req->category;
        $credit_create->particuler=$req->particuler;
        $credit_create->cash=$req->cash;
        $credit_create->update();

        return redirect()->back();

    }

    
}
