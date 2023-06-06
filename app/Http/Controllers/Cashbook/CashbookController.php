<?php

namespace App\Http\Controllers\Cashbook;
use App\Models\DCategory;
use App\Models\DebitCash;
use App\Models\CCategory;
use App\Models\CreditCash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function ThisMonth()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth(); 
        
        $month = Carbon::now();
        $monthName = $month->format('F');
        // Retrieve data from the database based on the date field
        $debit_data = DebitCash::whereBetween('date', [$startDate, $endDate])->get();
        $credit_data = CreditCash::whereBetween('date', [$startDate, $endDate])->get();

        $debit_sum = $debit_data->pluck('cash')->sum();
        $credit_sum = $credit_data->pluck('cash')->sum();

        return view("Admin.Cashbook.thismonth",compact('debit_data','credit_data','debit_sum','credit_sum','monthName'));       
    }
    public function SelectMonth(Request $request)
    {
        $userSelectedMonth = $request->month;
        $month = Carbon::createFromFormat('Y-m-d', $userSelectedMonth);
        $monthName = $month->format('F');
        // Construct the start and end dates for the selected month
        $startDate = Carbon::createFromFormat('Y-m-d', $userSelectedMonth)->startOfMonth();
        $endDate = Carbon::createFromFormat('Y-m-d', $userSelectedMonth)->endOfMonth();
        // Retrieve data from the database based on the date field and user-selected month
        $debit_data = DebitCash::whereBetween('date', [$startDate, $endDate])->get();
        $credit_data = CreditCash::whereBetween('date', [$startDate, $endDate])->get();
        $debit_sum = $debit_data->pluck('cash')->sum();
        $credit_sum = $credit_data->pluck('cash')->sum();

        return view("Admin.Cashbook.thismonth",compact('debit_data','credit_data','debit_sum','credit_sum','monthName'));       
    }

    public function ThisDebitCategory()
    {
        $category = DCategory::where('id',1)->first();
        $cat = DCategory::all();
        $d_category = $category->DebitCash;
        $category_sum = $d_category->pluck('cash')->sum();
        return view('Admin.Cashbook.debitcategory', compact('category','cat','d_category','category_sum'));
    }

    public function ThisSelectDebit(Request $request)
    {
        $category = DCategory::where('id', $request->cat)->first();
        $cat = DCategory::all();
        $d_category = $category->DebitCash;
        $category_sum = $d_category->pluck('cash')->sum();
        return view('Admin.Cashbook.debitcategory', compact('category','cat','d_category','category_sum'));
    }

    // Credit Category view
    public function ThisCreditCategory()
    {
        $category = CCategory::where('id',1)->first();
        $cat = CCategory::all();
        $c_category = $category->credit;
        $category_sum = $c_category->pluck('cash')->sum();
        return view('Admin.Cashbook.creditcategory', compact('category','cat','c_category','category_sum'));
    }

    public function ThisSelectCredit(Request $request)
    {
        $category = CCategory::where('id', $request->cat)->first();
        $cat = CCategory::all();
        $c_category = $category->credit;
        $category_sum = $c_category->pluck('cash')->sum();
        return view('Admin.Cashbook.creditcategory', compact('category','cat','c_category','category_sum'));
    }

}
