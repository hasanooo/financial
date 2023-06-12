<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\SellInvoice;
use App\Models\PurchaseInvoice;
use App\Models\EMI;

class AdminController extends Controller
{
    function dashboard()
    {
        $yesterday = Carbon::yesterday()->toDateString();
        $today = Carbon::today()->toDateString();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $yesterdayEMI = EMI::whereDate('created_at', $yesterday)->sum('emi_amount');
        $yesterdayPaid = EMI::whereDate('created_at', $yesterday)->sum('paid_amount');
        $yesterdaySale = SellInvoice::whereDate('created_at', $yesterday)->sum('total_amount');
        $yesterdaySaleTotal = $yesterdayEMI + $yesterdayPaid + $yesterdaySale;

        $todayEMI = EMI::whereDate('created_at', $today)->sum('emi_amount');
        $todayPaid = EMI::whereDate('created_at', $today)->sum('paid_amount');
        $todaySale = SellInvoice::whereDate('created_at', $today)->sum('total_amount');
        $todaySaleTotal = $yesterdayEMI + $yesterdayPaid + $yesterdaySale;


        $yesterdayPurchaseTotal = PurchaseInvoice::whereDate('created_at', $yesterday)->sum('payable_amount');
        $todayPurchaseTotal = PurchaseInvoice::whereDate('created_at', $today)->sum('payable_amount');
        $todaysIncome = $todaySaleTotal - $todayPurchaseTotal;

        $current_EMI = EMI::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('emi_amount');

        $current_paid = EMI::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('paid_amount');

        $current_sell = SellInvoice::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('total_amount');

        $current_month_sell =  $current_EMI +  $current_paid +  $current_sell;

        $current_month_purchase = PurchaseInvoice::whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->sum('payable_amount');
        $monthlyIncome = $current_month_sell - $current_month_purchase;

        $sales = [];
        $purchases = [];
        $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September"];

        foreach ($months as $month) {
            $sale = SellInvoice::whereMonth('created_at', Carbon::parse($month)->month)->sum('total_amount');
            $purchaseTotal = PurchaseInvoice::whereMonth('created_at', Carbon::parse($month)->month)->sum('payable_amount');
            $emi_amount = EMI::whereMonth('created_at', Carbon::parse($month)->month)->sum('emi_amount');
            $paid_amount = EMI::whereMonth('created_at', Carbon::parse($month)->month)->sum('paid_amount');
            $salesTotal = round($sale + $emi_amount + $paid_amount);
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
            'todaysIncome',
            'monthlyIncome'

        ));
    }
}
