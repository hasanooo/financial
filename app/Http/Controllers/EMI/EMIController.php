<?php

namespace App\Http\Controllers\EMI;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\EMI;
use App\Models\Product;
use Illuminate\Http\Request;

class EMIController extends Controller
{
    public function Index()
    {
        $emi = EMI::all();
        return view('Admin.emi.index',compact('emi'));
    }
    public function SaleIndex()
    {
        $customer = Customer::all();
        $product = Product::all();
        return view('Admin.emi.addsale',compact('customer','product'));
    }
}
