<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    protected function creditIndex()
    {
        return view('Admin.Credit.creditindex');
    }

    protected function creditCreate()
    {
        return view('Admin.Credit.createcredit');
    }

    protected function creditCategory()
    {
        return view('Admin.Credit.creditcategory');
    }
}
