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
        return view('admin.sale.salecreate')->with('product',$products)->with('customer',$customers);
    }
    function saleformsubmit(Request $req)
    {
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
        return view('admin.sale.productpartial')->with('product',$products);
    }
    function salelist()
    {
        $invoices=SellInvoice::all();
        
        
        return view('admin.sale.salelist')->with('invoice',$invoices);
    }
}