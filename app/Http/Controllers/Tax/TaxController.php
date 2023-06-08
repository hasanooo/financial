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
        return redirect()->back();
    }
}