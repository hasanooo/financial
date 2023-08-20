<?php

namespace App\Http\Controllers\Lc;

use App\Http\Controllers\Controller;
use App\Models\Lc;
use Illuminate\Http\Request;

class LcController extends Controller
{
    function lcform()
    {
        return view('Admin.lc.lcform');
    }
    function lcformsubmit(Request $req)
    {
        $lc=new Lc();
        $lc->name=$req->name;
        $lc->category=$req->category;
        $lc->issue_date=$req->issue_date;
        $lc->payment_date=$req->payment_date;
        $lc->bank_name=$req->bank_name;
        $lc->total_amount=$req->total_amount;
        $lc->any_details=$req->any_details;
        $file = $req->file;
        $file = time() . '.' . $file->getClientOriginalExtension();
        $req->file->move('FileManeger/File/', $file);
        $lc->file = $file;
        $lc->save();
        return redirect()->back(); 
        
    }
    function lclist()
    {
        $lcs=Lc::all();
        return view('Admin.lc.lclist')->with('lc',$lcs);
    }
    function lceditform(Request $req)
    {
        $lcc=Lc::where('id',$req->id)->first();
        return view('Admin.lc.lcedit')->with('lc', $lcc);
    }
    function lceditformsubmit(REquest $req)
    {
        $lc= Lc::where('id',$req->id)->first();
        
        $lc->name=$req->name;
        $lc->category=$req->category;
        $lc->issue_date=$req->issue_date;
        $lc->payment_date=$req->payment_date;
        $lc->bank_name=$req->bank_name;
        $lc->total_amount=$req->total_amount;
        $lc->any_details=$req->any_details;
        $file = $req->file;
        $file = time() . '.' . $file->getClientOriginalExtension();
        $req->file->move('FileManeger/File/', $file);
        $lc->file = $file;
        $lc->save();
        return redirect()->back(); 
    }
    function lcdeleteform(Request $req)
    {
        $lc=Lc::where('id',$req->id)->delete();
        return redirect()->route('lc.list');
    }
}