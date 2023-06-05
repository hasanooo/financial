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

}
