<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SellInvoice;
use App\Models\PurchaseInvoice;

class AdminController extends Controller
{
    function dashboard()
    {
        $yesterday = Carbon::yesterday()->toDateString();

        $today = Carbon::today()->toDateString();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $yesterdaySaleTotal = SellInvoice::whereDate('created_at', $yesterday)->sum('total_amount');

        $todaySaleTotal = SellInvoice::whereDate('created_at', $today)->sum('total_amount');

        $yesterdayPurchaseTotal = PurchaseInvoice::whereDate('created_at', $yesterday)->sum('payable_amount');


        $current_month_sell = SellInvoice::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_amount');
            $current_month_purchase = PurchaseInvoice::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('payable_amount');

        $todayPurchaseTotal = PurchaseInvoice::whereDate('created_at', $today)->sum('payable_amount');
        $sales = [];
        $purchases = [];
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September"];

        foreach ($months as $month) {
            $salesTotal = SellInvoice::whereMonth('created_at', Carbon::parse($month)->month)->sum('total_amount');
            $purchaseTotal = PurchaseInvoice::whereMonth('created_at', Carbon::parse($month)->month)->sum('payable_amount');

            $sales[] = $salesTotal;
            $purchases[] = $purchaseTotal;
        }
        return view('Admin.Dashboard.dashboard', compact(
            'yesterdaySaleTotal',
            'todaySaleTotal',
            'yesterdayPurchaseTotal',
            'todayPurchaseTotal',
            'sales',
            'purchases',
            'months',
            'current_month_sell',
            'current_month_purchase',
            
        ));
    }
}
