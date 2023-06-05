<?php

namespace App\Http\Controllers\Cashbook;
use App\Models\DCategory;
use App\Models\DebitCash;
use App\Models\CCategory;
use App\Models\CreditCash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CashbookController extends Controller
{
    protected function cashbookIndex()
    {
        $debit = DebitCash::all();
        $credit_index=CreditCash::all();
        return view('Admin.Cashbook.cashbookindex')
        ->with('index_credit',$credit_index)
        ->with('debit',$debit);
    }
}
