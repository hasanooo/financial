<?php

namespace App\Http\Controllers\Tax;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    function taxhome()
    {
        $taxs=Tax::all();
        return view('admin.tax.taxindex')->with('tax',$taxs);
    }
    function formsubmit(Request $req)
    {
        $tax= new Tax();
        $tax->name=$req->name;
        $tax->percentage=$req->percentage;
        $tax->save();
        $notification = array(
            'message' => "Tax Added Successfully",
            'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }

    function taxEditView($id)
    {
        $tax=Tax::find($id);
        return response()->json($tax);
    }

    function taxUpdate(Request $req)
    {
        $tax=Tax::find($req->id);
        $tax->name=$req->name;
        $tax->percentage=$req->percentage;
        $tax->save();
        $notification = array(
            'message' => "Tax Updated Successfully",
            'alert-type' => 'success'
         );
         return redirect()->back()->with($notification);
    }
}