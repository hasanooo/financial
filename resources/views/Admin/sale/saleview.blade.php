<div id="myForm">
    <div class="modal-header">
        <p class="modal-title">Sell Details ( <span style="font-weight: bold;"> Invoice No.: {{ $in_id->invoice }}
            </span>)</p>
        <button type="button" id="payclose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body" id="invoice_view">
        <div class="row">
            <div class="col-4">
                <p> <span style="font-weight: bold;"> Invoice No.:{{ $in_id->invoice }}</span></span>
                </p>
                <p> <span style="font-weight: bold;"> Status: {{ $in_id->status }}</span> </p>
                <p> <span style="font-weight: bold;"> Payment Status:</span> Paid</p>
            </div>
            <div class="col-4">
                <p> <span style="font-weight: bold;"> Customer Name:
                        @if ($in_id->invoice_customer == null)
                            Walking Customer
                    </span>
                @else
                    {{ $in_id->invoice_customer->name }} </span>
                    @endif

                </p>
                <p> <span style="font-weight: bold;"> Address: {{ $in_id->location }}</span> </p>
            </div>
            <div class="col-4" style="text-align: end;">
                <p> <span style="font-weight: bold;"> Date:{{ $in_id->date }}</span> </p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Products:</p>
                <div class="">
                    <table class="table table-borderd-white">
                        <thead>
                            <tr class="bg-success text-white">
                                <th scope="col">#</th>
                                <th scope="col">Product</th>
                                
                               
                                <th scope="col">Quantity</th>
                                <th scope="col">Return Quantity</th>
                                <th scope="col">Price</th>
                                
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($in_id->invoice_sale as $sale)
                                <tr class="table-secondary">
                                    <th scope="row">1</th>
                                    <td>{{ $sale->sale_product->name }}</td>
                                    
                                    <td>{{ $sale->qty }}</td>

                                    <td>
                                        @if ($in_id->sale_invoice_sale_return != null)
                                            @foreach ($in_id->sale_invoice_sale_return as $s)
                                                @if ($sale->sale_product->id == $s->product_id)
                                                    {{ $s->return_qty }}
                                                @endif
                                            @endforeach
                                        @endif 
                                    </td>






                                    <td> {{ $sale->sale_product->selling_price }}</td>
                                    @php
                                        // if ($sale->sale_productprice->productprice_product->product_discount == null) {
                                        //     $discount = 0;
                                        // } else {
                                        //     $discount = $sale->sale_productprice->productprice_product->product_discount->discount;
                                        // }
                                        if ($sale->sale_product->product__tax == null) {
                                            $tax = 0;
                                        } else {
                                            $tax = $sale->sale_productprice->product_price_tax->percentage;
                                        }
                                        if ($in_id->shipping_charge == null) {
                                            $shipping = 0;
                                        } else {
                                            $shipping = $in_id->shipping_charge;
                                        }
                                        // if ($in_id->invoice_customer != null) {
                                        //     if ($in_id->invoice_customer->customer_customergroup->calculation_percentage == 0) {
                                        //         $c_group = 0;
                                        //     } else {
                                        //         $c_group = ($in_id->invoice_customer->customer_customergroup->calculation_percentage * $sale->sale_productprice->price) / 100;
                                        //     }
                                        // }
                                        if ($tax == 0) {
                                            $total_tax = 0;
                                        } else {
                                            $total_tax = ($sale->sale_product->selling_price * $tax) / 100;
                                        }
                                        // if ($discount == 0) {
                                        //     $total_discount = 0;
                                        // } else {
                                        //     $total_discount = ($sale->sale_productprice->price * $discount) / 100;
                                        // }
                                        // if ($in_id->invoice_customer != null) {
                                        //     $price = $sale->sale_productprice->price;
                                        //     $pit = $price + $total_tax;
                                        //     $sub_total = ($pit - $total_discount - $c_group) * $sale->quantity;
                                        // } else {
                                            $price = $sale->sale_product->selling_price;
                                            $pit = $price + $total_tax;
                                            $sub_total = $pit  * $sale->quantity;
                                        // }
                                    @endphp
                                    
                                    
                                    <td>{{ $pit }} </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-12">
                <p>Payment info:</p>
                <div class="">
                    <table class="table table-borderd">
                        <thead>
                            <tr class="bg-success text-white">
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                {{-- <th scope="col">Reference No</th> --}}
                                <th scope="col">Amount</th>
                                <th scope="col">Payment mode</th>
                                <th scope="col">Payment note</th>

                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($in_id->invoice_payment as $payment)
                                <tr class="table-secondary">
                                    <th scope="row">1</th>
                                    <td>{{ $payment->created_at }}</td>
                                    {{-- <td>SP2023/72397</td> --}}
                                    <td> {{ $payment->amount_paid }}</td>
                                    <td> {{ $payment->payment_method }} </td>
                                    <td> {{ $payment->payment_note }} </td>
                                </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
            @php
                $total_pay = 0;
                $discount = 0;
                $tax = 0;
                $shipping = 0;
                foreach ($in_id->invoice_payment as $p) {
                    $total_pay = $total_pay + $p->amount_paid;
                    $pay = $in_id->total_amount - $total_pay;
                }
            @endphp
            <div class="col-md-6 col-sm-12" style="margin-top: 2.4rem;">

                <div class="">
                    <table class="table table-secondary">
                        <tbody>
                            <tr>
                                <th>Total:</th>
                                <td></td>
                                <td style="text-align:end"> {{ $in_id->total_amount }}</td>
                            </tr>
                            
                            {{-- <tr>
                                <th>Order Tax:</th>
                                <td>(+)</td>
                                <td style="text-align:end">{{ $tax }}</td>
                            </tr> --}}
                            <tr>
                                <th>Shipping:</th>
                                <td>(+)</td>
                                <td style="text-align:end">{{ $shipping }}</td>
                            </tr>

                            <tr>


                                <th>Total payable:</th>
                                <td></td>
                                {{-- <td style="text-align:end">{{ $pay }}</td> --}}
                            </tr>
                            <tr>
                                <th>Total Paid:</th>
                                <td></td>
                                <td style="text-align:end">{{ $total_pay }}</td>
                            </tr>
                            <tr>
                                <td>Total Return</td>
                                <td></td>
                                <td style="text-align:end">
                                    {{-- @if ($in_id->sale_invoice_sale_return != null)
                                        {{ $in_id->sale_invoice_sale_return->pluck('return_price')->sum() }}
                                    @else
                                        0
                                    @endif --}}
                                </td>
                            </tr>
                            <tr>
                                <th>Total remaining:</th>
                                <td></td>
                                <td style="text-align:end">
                                    {{-- @if ($in_id->sale_invoice_sale_return != null)
                                        {{ $pay - $in_id->sale_invoice_sale_return->pluck('return_price')->sum() }}
                                    @else
                                        {{ $pay }}
                                    @endif --}}
                                </td>
                            </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <strong>Sell note:</strong>
                <br>
                <p class="p-2" style="background-color: #e2e3e5;"> --</p>
            </div>
            <div class="col-6">
                <strong>Staff note:</strong>
                <br>
                <p class="p-2" style="background-color: #e2e3e5;"> --</p>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" onclick="printPage()" id="print" class="btn btn-primary"> <i
                class="fa-solid fa-print"></i>
            Print</button>
        <button type="button" id="modalclose" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $(document).on('click', '#print', function(e) {
    //         window.addEventListener("load",window.print());     

    //     });

    // });
    // function printPage() {
    //     window.print();
    // }
</script>
