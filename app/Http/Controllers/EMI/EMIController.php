<?php

namespace App\Http\Controllers\EMI;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\EMI;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    function ProductSearch(Request $req)
    {
        $doctor = Product::where('id', $req->q)->first();



        // return view('Admin.Hospital.assistantpartial')->with('v', $t);
        return response()->json([
            'price' => $doctor->selling_price,
        ]);
    }

    public function SaleSub(Request $request)
    {
        $sale = new EMI();
        $random_number = rand(1, 1000);
        $random_string = Str::random(4);
        $sale->invoice = "bs" . $random_number . $random_string;
        // $sale->service_name=$request->service_name;
        $sale->total_amount = $request->total;
        $sale->discount_amount = $request->discount_amount;
        // $sale->earning=$request->earning;
        $sale->service_id = $request->service_id;
        $sale->assistant_id = $request->assistant_id;
        $sale->hospital_customer_id = $request->hospital_customer_id;
        $sale->earning = $request->earning;
        $sale->user_type = 'assistant';

        $sale->save();

        // $payment = new SellingPayment();
        // $payment->service_sale_id = $sale->id;
        // $payment->payment_method = 'cash';
        // $payment->payment_note = $request->payment_note;
        // $payment->amount_paid = $request->amount_paid;
        // $payment->save();

        // $c_history = new CustomerPaymentHistory();
        // $c_history->hospital_customer_id=$request->hospital_customer_id; 
        // $c_history->amount=$request->amount_paid;
        // $c_history->save();

        return redirect()->route('sales.report');
        
    }
}
