<?php

namespace App\Http\Controllers\OPEX;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OpexController extends Controller
{
    public function PendingIndex()
    {
        return view('admin.opex.pending_index');
    }
    public function ApprovedIndex()
    {
        return view('admin.opex.approved_index');
    }
    public function Create()
    {
        return view('Admin.opex.create_opex');
    }
}
