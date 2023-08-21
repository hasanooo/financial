<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\PurchaseInvoice;
use App\Models\PurchasePayment;
use App\Models\PurchaseReturn;
use App\Models\User;
use App\Models\CCategory;
use App\Models\CreditCash;
use App\Models\DebitCash;
use App\Models\DCategory;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PurchaseController extends Controller
{
    // public $user;
    // public function __construct()
    // {
    //     $this->middleware(function ($request, $next) {
    //         $this->user = Auth::guard('web')->user();
    //         return $next($request);
    //     });
    // }


    public function PurchaseIndex($id = 0)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }

        $purchase_invoice = $id == 0 ? PurchaseInvoice::paginate(10) : PurchaseInvoice::where('supplier_id', $id)->paginate(10);
        $purchase_id = $id;
        $has_supplier_id = $id != 0; // Check if a supplier ID was passed

        return view('Admin.purchase.PurchaseIndex', compact('purchase_invoice', 'purchase_id', 'has_supplier_id'));
    }


    public function PurchaseAdd()
    {
        // if (is_null($this->user) || !$this->user->can('purchase.create')) {
        //     abort('403', 'Unauthorized access');
        // }
        $s = Supplier::all();
        $product = Product::all();
        $credit_category=CCategory::all();
        return view('Admin.purchase.addPurchase')
            ->with('ss', $s)
            ->with('product', $product)
            ->with('category_credit',$credit_category);
    }

    public function PurchaseEdit(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.edit')) {
        //     abort('403', 'Unauthorized access');
        // }
        $s = Supplier::where('id', $req->id)->first();
        $p = PurchaseInvoice::with('purchase_invoice_purchase_payment')->where('id', $req->id)->first();
        $product = Product::all();
        $credit_category=CCategory::all();

        return view('Admin.purchase.editPurchase')
            ->with('ss', $s)
            ->with('purchaseInvoice', $p)
            ->with('product', $product)
            ->with('category_credit',$credit_category);
    }




    function PurchaseAddSub(Request $req)
    {
        $req->validate(
            [
                'supplier_id' => 'required',
              
                'pdate' => 'required|date',
                // 'purchase_status' => 'required',
                // 'location' => 'required',
                'purchase_price' => 'required|numeric|min:0',
                'product_price_id.*' => 'required|numeric',
                'p_qty.*' => 'required|numeric|min:1',
                'current_unit_cost.*' => 'required|numeric|min:0',
                'increment_cost.*' => 'required|numeric|min:0',
                'discount.*' => 'required|numeric|min:0',
                'per_unit_cost.*' => 'required|numeric|min:0',
                'total_amount_paid' => 'required|numeric|min:0',
                'payment_method' => 'required',
                // 'payment_note' => 'required',
            ],

            [
                'supplier_id.required' => 'Please select a Supplier name !',
                'reference_number.required' => 'Please provide a reference number!',
                'purchase_status.required' => 'Please provide a purchase status!',
                'pdate.required' => 'Please Select date!',
                'location.required' => 'Please provide a location!',
                'purchase_price.required' => 'Please show the total purchase!',
                'total_amount_paid.required' => 'Please make a payment!',
                'payment_method.required' => 'Please provide a location!',
                'payment_note.required' => 'Please write a note!',
            ]

        );
        $p_invoice = new PurchaseInvoice();
        $random_number = rand(1, 1000);
        $random_string = Str::random(4);
        $p_invoice->invoice = "bengalsoftware" . $random_number . $random_string;
        $p_invoice->supplier_id = $req->supplier_id;
        $p_invoice->purchase_date = $req->pdate;
        $p_invoice->payable_amount = $req->purchase_price;
        if ($p_invoice) {
            $p_invoice->save();
            $product_id = $req->product_id;
            foreach ($product_id as $i => $item) {
                $data = array(
                    'product_id' => $product_id[$i],
                    'purchase_invoice_id' => $p_invoice->id,
                    'purchase_qtn' => $req->p_qty[$i],
                );
                $purchase = Purchase::create($data);
                if ($purchase) {
                    $product = Product::where('id', $req->product_id[$i])->first();
                    $update_qty = array(
                        'stock' => $req->p_qty[$i] + $product->stock,
                    );
                    Product::where('id', $product_id[$i])->update($update_qty);
                }
            }

            $p_payment = new PurchasePayment();
            $p_payment->purchase_invoice_id = $p_invoice->id;
            $p_payment->amount_paid = $req->total_amount_paid;
            $p_payment->payment_method = "cash";
            $p_payment->payment_account = "none";
            if ($req->payment_note == null) {
                $p_payment->payment_note = "no note taken";
            } else {
                $p_payment->payment_note = $req->payment_note;
            }
            if ($p_payment) {
                $p_payment->save();

                $credit_create=new CreditCash();
                $credit_create->c_category_id=$req->category;
                $credit_create->date=date('Y-m-d');
                $credit_create->particuler="By Product Purchase";
                $credit_create->cash = $req->total_amount_paid;
                $credit_create->save();
               

            }
        }

        return redirect(route('purchase.index'));
    }

    function PurchaseEditSub(Request $req)
    {

        $p_invoice = PurchaseInvoice::where('id', $req->id)->first();
        $random_number = rand(1, 1000);
        $random_string = Str::random(4);
        $p_invoice->invoice = "bengalsoftware" . $random_number . $random_string;
        $p_invoice->supplier_id = $req->supplier_id;
        $p_invoice->purchase_date = $req->pdate;
        $p_invoice->payable_amount = $req->purchase_price;
        if ($p_invoice) {
            $p_invoice->save();
            $product_id = $req->product_id;

            foreach ($product_id as $i => $item) {
                $add_or_edit = Purchase::where('product_id', $product_id[$i])
                    ->where('purchase_invoice_id', $req->id)->first();
                if ($add_or_edit) {
                    $data = array(
                        'product_id' => $product_id[$i],
                        'purchase_invoice_id' => $p_invoice->id,
                        'purchase_qtn' => $req->p_qty[$i],

                    );

                    $purchase = Purchase::where('purchase_invoice_id', $p_invoice->id)->where('product_id', $product_id[$i])->update($data);


                    if ($purchase) {
                        $product = Product::where('id', $req->product_id[$i])->first();
                        $previous_qty = $product->qty;
                        $updated_qty = $req->p_qty[$i];
                        $difference = $updated_qty - $previous_qty;
                        $new_qty = array(
                    
                            'stock' =>$product->stock + $difference,
                        );
                        Product::where('id', $product_id[$i])->update($new_qty);
                    }
                } 
            }

            $p_payment = PurchasePayment::where('purchase_invoice_id', $p_invoice->id)->first();
            $p_payment->amount_paid = $req->total_amount_paid;
            $p_payment->payment_method = $req->payment_method;
            $p_payment->payment_account = "none";
            if ($req->payment_note == null) {
                $p_payment->payment_note = "no note taken";
            } else {
                $p_payment->payment_note = $req->payment_note;
            }
            if ($p_payment) {
                $p_payment->save();


            }
        }

        return redirect(route('purchase.index'));
    }


    // function purchaseSearch(Request $req)
    // {

    //     $p = Product::where('id', $req->q)->first();
    //     $product = Product::where("id", $p->id)->get();
    
    //         return view('Admin.purchase.partialpage', compact('product', 'p'));
    // }
    
    public function purchase_item_partial(Request $req)
    {
        $p = Product::where('id', $req->q)->first();
        $product = Product::where("id", $p->id)->get();
        return view('Admin.purchase.products_item_partial', compact('product','p'));
    }


    public function viewEditDue(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }
        $p = Purchase::select('id', 'due_amount')->where('id', $req->id)->first();
        return response()->json($p);
    }

    public function makepayment(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }
        $p_payment = new PurchasePayment();
        $p_payment->purchase_invoice_id = $req->invoice_id;
        $p_payment->amount_paid = $req->pay_amount;
        $p_payment->payment_method = 'cash';
        $p_payment->payment_account = "none";
        $p_payment->payment_note = 'none';
        if ($p_payment) {
            $p_payment->save();
        }

        return back();
    }

    public function totalpayment(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }

        $duepay = PurchaseInvoice::where('supplier_id', $req->purchase_id)->get();
        $duetotal = $req->duetotal;
        $amountforpay = $req->pay_amount;



        foreach ($duepay as $pay) {

            $p_payment = new PurchasePayment();
            $p_payment->purchase_invoice_id = $pay->id;

            $totaldue = $pay->payable_amount;
            $totalpaid = $pay->purchase_invoice_purchase_payment->pluck('amount_paid')->sum();
            $pay_due = $totaldue - $totalpaid;

            if ($duetotal >= $amountforpay) {
                if ($pay_due >= $amountforpay) {
                    $p_payment->amount_paid = $amountforpay;
                    $p_payment->payment_method = 'cash';
                    $p_payment->payment_account = "none";
                    $p_payment->payment_note = 'none';
                    $p_payment->save();
                    break;
                }

                $p_payment->amount_paid = $pay_due;
                $p_payment->payment_method = 'cash';
                $p_payment->payment_account = "none";
                $p_payment->payment_note = 'none';
                $p_payment->save();

                $credit_create = CreditCash::where('id',$req->id)->first();
                $credit_create->cash = $pay_due;
                $credit_create->update();
            }

            $duetotal = $duetotal - $pay_due;
            $amountforpay = $amountforpay - $pay_due;
            // $pay_due = 

            if ($duetotal <= 0) {
                break;
            }

        }

        return back();
        //return $req->invoice_id;
    }

   

    protected function purchase_modal_partial(Request $req)
    {
        $invoice = PurchaseInvoice::where('id', $req->invoice_id)->first();
        return view('Admin.purchase.invoice_modal_partial', compact('invoice'));
    }
    protected function PurchaseReturn($id)
    {
        $invoice = PurchaseInvoice::where('id', $id)->first();
        return view('Admin.purchase.purchase_return', compact('invoice'));
    }

    protected function PurchaseReturnSubmit(Request $req, $id)
    {
        $p_price = $req->purchase_id;
        foreach ($p_price as $i => $item) {
            if ($req->return_qty[$i]) {
                $product = Product::where('id',$req->product_id[$i])->first();
                $updated_product = [
                    'stock' => $product->stock - $req->return_qty[$i],
                ];
                $updated = Product::where('id', $req->product_id[$i])->update($updated_product);
                if ($updated) {
                    $p_return = new PurchaseReturn();
                    $p_return->purchase_invoice_id = $id;
                    $p_return->product_id = $req->product_id[$i];
                    $p_return->return_qty = $req->return_qty[$i];
                    $p_return->return_price = $req->retutn_price[$i];

                    if ($p_return->save()) {
                        // Success
                        $debit = new DebitCash();
                        $debit->date = date('Y-m-d');
                        $debit->particuler = "To Product Return";
                        $debit->cash = $req->retutn_price[$i];
                        $debit->save();
                        
                    }
                }
            }
        }
        return back();
    }


    protected function ReturnList($id)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }
        $category = DCategory::all();
        $return = PurchaseReturn::where('purchase_invoice_id', $id)->get();
        return view('Admin.purchase.purchase_return_list', compact('return','category'));
    }
    protected function AddToCash(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.view')) {
        //     abort('403', 'Unauthorized access');
        // }
        if ($req->paid_amount > $req->payable) {
            return "Your amount is greater than total amount";
        } else {
            $return = new PurchasePayment();
            $return->purchase_invoice_id = $req->return_id;
            $return->payment_method = "cash";
            $return->payment_account = "none";
            $return->payment_note = "none";
            $return->amount_paid = - ($req->paid_amount);
            if ($return) {
                $return->save();
               
                return "success";
            }
        }
    }

    function purchase_search(Request $req)
    {
        $in = PurchaseInvoice::where('invoice', 'LIKE', '%' . $req->invoicesearch . '%')
            ->orWhere('ref', 'LIKE', '%' . $req->invoicesearch . '%')
            ->orWhere('suplier_id', 'LIKE', '%' . $req->invoicesearch . '%')
            ->first();
        return view('Admin.purchase.searchpartisal')->with('p', $in);
    }


    public function Purchasedelete(Request $req)
    {
        // if (is_null($this->user) || !$this->user->can('purchase.delete')) {
        //     abort('403', 'Unauthorized access');
        // }
        $purchase_invoice = PurchaseInvoice::where('id', $req->id)->first();

        $PurchasePayment = PurchasePayment::where('purchase_invoice_id', $purchase_invoice->id)->delete();

    
        $purchase = Purchase::where('purchase_invoice_id', $purchase_invoice->id)->delete();


        $purchase_invoice->delete();

        return back();
    }
    
}
