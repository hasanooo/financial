<?php

namespace App\Http\Controllers\EMI;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\EMI;
use App\Models\Product;
use App\Models\SellingPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
    function InvoiceSelect(Request $req)
    {
        $inv = EMI::where('id', $req->q)->first();
        $paid = $inv->Selling->pluck('amount_paid')->sum();
        $sum = ($inv->with_profit) + ($inv->paid_amount);
        $due = $sum - $paid ;
        $customer = $inv->Customer;
        $name= $customer->name;
        $l = $inv->Selling()->latest()->first();
        $last_date = $l->created_at;
        $format = Carbon::parse($last_date)->format('Y-m-d');
        // return view('Admin.Hospital.assistantpartial')->with('v', $t);
        return response()->json([
            'emi' => $inv->emi_amount,
            'due' => $due,
            'last' => $format,
            'customer' => $name,
        ]);
    }

    public function SaleSub(Request $request)
    {

        $request->validate([  
            'date'=>'required|date',
            'customer'=>'required|numeric',
            'product'=>'required|numeric',
            'discount'=>'required|numeric',
            'receive_amount'=>'required|numeric',
            'emi_rate'=>'required|numeric',
            'emi_quantity'=>'required|numeric',
        ], [
            'date.required' => 'Please select any date!',
            'customer.required' => 'Please select customer first!',
            'product.required' => 'You do not select any product!',
        ]);

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

        $notification = array(
            'message' => "EMI Added successfully",
            'alert-type' => 'success'
         );

        return redirect()->route('emi.index')->with($notification);
        
    }
    public function CollectIndex()
    {
        $invoice = EMI::all();

        return view('Admin.emi.collect',compact('invoice'));
    }

    public function CollectSub(Request $req)
    {

        $req->validate([  
            'amount'=>'required|numeric',
            'emi_id'=>'required|numeric',
        ], [
            'amount.required' => 'Please provide EMI payable amount!',
            'emi_id.required' => 'Please select payable invoice!',
        ]);

        $payment = new SellingPayment();
        $payment->e_m_i_id = $req->emi_id;
        $payment->amount_paid = $req->amount;
        $payment->payment_method = 'cash';
        $payment->payment_account = "none";
        $payment->payment_note = 'none';
        $payment->save();
        $emi_due = EMI::findOrFail($req->emi_id);
        $due = $emi_due->with_profit;
        $emi_due->with_profit = $due - $req->amount;
        $emi_due->update();
        $notification = array(
            'message' => "Payment Collected successfully",
            'alert-type' => 'success'
         );
        return redirect()->back()->with($notification);
    }

    public function printReport($id){
        $invoice=EMI::find($id);
        // $invoice=ServiceSale::find($id);
        $customer=$invoice->Customer;
        $payments=$invoice->Selling;
        $totalpayment = $payments->pluck('amount_paid')->sum();
        $total = ($invoice->with_profit) + ($invoice->paid_amount);
        $services = $invoice->MultiService;
        return view('Admin.emi.invoice_pdf', compact('invoice','customer','total','payments','totalpayment'));
    }
    
}
