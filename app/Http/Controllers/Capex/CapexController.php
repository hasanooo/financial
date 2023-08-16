<?php

namespace App\Http\Controllers\Capex;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;


class CapexController extends Controller
{
    protected function capexPendingList()
    {
       return view('Admin.Capex.capexpendinglist');
    }
    protected function capexApprovedList()
    {
        return view('Admin.Capex.capexapprovedlist');
    }
    protected function capexAddView()
    {
        $supplier = Supplier::all();
        return view('Admin.Capex.capexadd')
        ->with('ss',$supplier);
    }
    protected function capexAddSub()
    {

    }


}
