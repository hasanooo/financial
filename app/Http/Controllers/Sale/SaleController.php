<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\SellingPayment;
use App\Models\SellingProduct;
use App\Models\SellInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class SaleController extends Controller
{
    function saleform()
    {
        $products=Product::all();
        $customers=Customer::all();
        return view('Admin.sale.salecreate')->with('product',$products)->with('customer',$customers);
    }
    function saleformsubmit(Request $req)
    {

        $req->validate([
            'customer' => 'required|numeric',
            
         ], [
            'customer.required' => 'Please select a customer!',
           
         ]);

        
        $invoice= new SellInvoice();
        $b = rand(1, 1000);
        $sss = Str::random(4);
        $invoice->invoice="bengal" . $b . $sss;
        $invoice->total_amount=$req->total_amount;
        $invoice->customer_id=$req->customer;
        $invoice->shipping_details=$req->shdetails;
        $invoice->sellnote=$req->sellnote;
        $invoice->shipping_charge=$req->shcharge;
        $invoice->status=$req->status;
        $invoice->save();
        foreach ($req->pname as $m => $mitem) {
            //echo $req->variname[$m];
   
            $qty = 0;
   
            $sale = new SellingProduct();
   
   
            $sale->qty = $req->quantity[$m];
           
               $product = Product::where('id', $req->p_id[$m])->first();
               //return $ppp;
               
               $qty = $product->qty - $sale->quantity;
               $product->stock = $qty;
               $product->save();
               // return $req->variname[$m];
           
             $sale->product_id=$product->id;
           
               
               //return $req->variname[$m];
   
            
   
            $sale->sell_invoice_id = $invoice->id;
            $sale->save();
         }
   
         $payment = new SellingPayment();
   
         $payment->payment_method = $req->paymethod;
         $payment->amount_paid = $req->amount;
         $payment->payment_account = $req->payacc;
         $payment->payment_note   = $req->paynote;
         $payment->sell_invoice_id = $invoice->id;
         $payment->save();
         return redirect()->back();
    }
    function productforpartial(Request $req)
    {
        
        $products=Product::where('id',$req->q)->first();
        return view('Admin.sale.productpartial')->with('product',$products);
    }
    function salelist()
    {
        $invoices=SellInvoice::all();
        
        
        return view('Admin.sale.salelist')->with('invoice',$invoices);
    }
    function saleedit(Request $req)
    {
        $invoice=SellInvoice::where('id',$req->id)->first();
        return view('Admin.sale.saleedit')->with('yy',$invoice);
    }
    function saleeditformsubmit(Request $req)
    {
        $invoice=SellInvoice::where('id',$req->invoice_id)->first();
        $invoice->total_amount=$req->total_amount;
        $invoice->customer_id=$req->customer;
        $invoice->shipping_details=$req->shdetails;
        $invoice->sellnote=$req->sellnote;
        $invoice->shipping_charge=$req->shcharge;
        $invoice->status=$req->status;
        $invoice->save();
        foreach ($req->pname as $m => $mitem) {
            //echo $req->variname[$m];
   
            $qty = 0;
   
            $sale = SellingProduct::where('id',$req->sale_id[$m])->first();
   
   
            $sale->qty = $req->quantity[$m];
           
               $product = Product::where('id', $sale->product_id)->first();
               //return $ppp;
               
               $qty = $product->qty - $sale->quantity;
               $product->stock = $qty;
               $product->save();
               // return $req->variname[$m];
           
             $sale->product_id=$product->id;
           
               
               //return $req->variname[$m];
   
            
   
            $sale->sell_invoice_id = $invoice->id;
            $sale->save();
         }
          $payment = SellingPayment::where('sell_invoice_id',$req->invoice_id)->first();
   
         $payment->payment_method = $req->paymethod;
         $payment->amount_paid = $req->amount;
         $payment->payment_account = $req->payacc;
         $payment->payment_note   = $req->paynote;
         $payment->sell_invoice_id = $invoice->id;
         $payment->save();
         return redirect()->back();
   
        
    }
    function saleview(Request $req)
    {
        $invoice=SellInvoice::where('id',$req->id)->first();
        return view('Admin.sale.saleview')->with('in_id',$invoice);
    }
}