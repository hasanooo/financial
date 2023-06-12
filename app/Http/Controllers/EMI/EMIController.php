<?php

namespace App\Http\Controllers\EMI;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\EMI;
use App\Models\Product;
use App\Models\SellingPayment;
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
        $sale->invoice = "bsemi" . $random_number . $random_string;
        // $sale->service_name=$request->service_name;
        $sale->customer_id = $request->customer;
        $sale->product_id = $request->product;
        $sale->date = $request->date;
        // $sale->earning=$request->earning;
        $sale->discount = $request->discount;

        $sale->total_price = $request->payable_amount;
        $sale->paid_amount  = $request->receive_amount;
        $sale->emi_rate = $request->emi_rate;
        $sale->duration = $request->duration;
        $sale->emi_quantity = $request->emi_quantity;
        $sale->emi_amount = $request->emi_amount;
        $sale->with_profit = $request->emi_total;
        $sale->type = 'cash';
        $sale->save();

        $payment = new SellingPayment();
        $payment->e_m_i_id = $sale->id;
        $payment->payment_method = 'cash';
        $payment->payment_note = 'Ok';
        $payment->amount_paid = $request->receive_amount;
        $payment->save();

        // $c_history = new CustomerPaymentHistory();
        // $c_history->hospital_customer_id=$request->hospital_customer_id; 
        // $c_history->amount=$request->amount_paid;
        // $c_history->save();

        return redirect()->route('emi.index');
        
    }
}
