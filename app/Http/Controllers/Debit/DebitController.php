<?php

namespace App\Http\Controllers\Debit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('Admin.Debit.debitcategory');
    }
}
