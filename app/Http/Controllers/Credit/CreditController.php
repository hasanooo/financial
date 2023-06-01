<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    public function creditIndex()
    {
        return view('Admin.Credit.creditindex');
    }
}
