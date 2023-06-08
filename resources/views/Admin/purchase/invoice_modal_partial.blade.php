<div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <p class="modal-title" id="exampleModalLabel">Sell Details ( <span style="font-weight: bold;"> Invoice
                    No.:</span> #{{$invoice->invoice}})</p>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-4">
                    <p> <span style="font-weight: bold;"> Invoice No.:</span> #{{$invoice->invoice}}
                    </p>
                    <p> <span style="font-weight: bold;"> Status:</span> Final</p>
                    <!-- <p> <span style="font-weight: bold;"> Payment Status:</span> Paid</p> -->
                </div>
                <div class="col-4">
                    <p> <span style="font-weight: bold;"> Supplier Name:
                            {{$invoice->purchase_invoice_supplier->name}}</span>
                    </p>
                    <p> <span style="font-weight: bold;"> Address: {{$invoice->purchase_invoice_supplier->city}}</span>
                    </p>
                </div>
                <div class="col-4" style="text-align: end;">
                    <p> <span style="font-weight: bold;"> Date:</span>
                        {{$invoice->purchase_date}}</p>
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
                                    <th scope="col">Variations</th>
                                    <th scope="col">Lot</th>
                                    <th scope="col">Quantity</th>
                                    <th>Return Quantity</th>
                                    <th scope="col">Unit Price<small>(before)</small></th>
                                    <th scope="col">Increment(%)</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Unit Price<small>(current)</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->purchase_invoice_purchase as $i=>$item)
                                <tr class="table-secondary">
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$item->purchase_product_price->productprice_product->name}}</td>
                                    <td>
                                        @if($item->purchase_product_price->variation_value_id !=0)
                                            {{$item->purchase_product_price->productprice_variation_value->value_name}}
                                        @else
                                        <span>Single</span>
                                        @endif
                                    </td>
                                    <td>{{$item->lot}}</td>
                                    <td>{{$item->purchase_qtn}}</td>

                                    <td> 
                                        @if ($invoice->purchase_invoice_purchase_return != null)
                                            @php
                                                $total_return_qty = 0;
                                            @endphp
                                            @foreach ($invoice->purchase_invoice_purchase_return as $inp)
                                                @if ($item->purchase_product_price->id == $inp->product_price_id)
                                                    @php
                                                        $total_return_qty += $inp->return_qty;
                                                    @endphp
                                                @endif
                                            @endforeach
                                            {{ $total_return_qty }}
                                        @endif
                                    </td>


                                    

                                    <td> <i class="fa-solid fa-bangladeshi-taka-sign"></i>{{$item->prev_unit_cost}}</td>
                                    <td>{{$item->inc_unit_cost}}%</td>
                                    <td>{{$item->purchase_discount}}%</td>
                                    <td>{{$item->current_unit_cost}}</td>

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
                                    <th scope="col">Amount</th>
                                    <th scope="col">Payment mode</th>
                                    <th scope="col">Payment note</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoice->purchase_invoice_purchase_payment as $i=>$item)
                                <tr class="table-secondary">
                                    <th scope="row">{{$i+1}}</th>
                                    <td>{{$item->purchase_payment_purchase_invoice->purchase_date}}</td>
                                    <td> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                        {{$item->amount_paid}}</td>
                                    <td> Cash </td>
                                    <td> {{$item->payment_note}}</td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" style="margin-top: 2.4rem;">

                    <div class="">
                        <table class="table table-secondary">
                            <tbody>
                                <tr>
                                    <th>Toatl:</th>
                                    <td></td>
                                    <td style="text-align:end"> <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                        {{$invoice->payable_amount}}</td>
                                </tr>
                                <tr>
                                    <td>Total Return</td>
                                    <td></td>
                                    <td style="text-align:end">@if ($invoice->purchase_invoice_purchase_return!=null)
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                        {{$invoice->purchase_invoice_purchase_return->pluck('return_price')->sum()}}
                                        </th>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Toatl Paid:</th>
                                    <td></td>
                                    <td style="text-align:end"><i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                        {{ $invoice->purchase_invoice_purchase_payment->pluck('amount_paid')->sum() }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total remaining:</th>
                                    <td></td>
                                    <td style="text-align:end"><i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                        {{$invoice->payable_amount -($invoice->purchase_invoice_purchase_payment->pluck('amount_paid')->sum()+ $invoice->purchase_invoice_purchase_return->pluck('return_price')->sum()) }}
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>


        </div>
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-primary"> <i class="fa-solid fa-print"></i>
                Print</button> --}}
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
    </div>
</div>