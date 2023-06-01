<?php

namespace App\Http\Controllers\Debit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    public function debitIndex()
    {
        return view('Admin.Debit.debitindex');
    }
}
