@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="col-12 mt-3">
            <span style="font-size:27px; font-weight:23px;">Purchase Product Return</span> <small style="color:gray;"> Manage Purchase product Return
                List</small>
        </div>
            <div class="table-responsive">
                <table id="return_table" class="table table-bordered table-striped my-3">
                    <thead>
                        <tr class="text-center text-white" style="background-color:#0d5e8b;">

                            <th>Invoice</th>
                            <th>Reference</th>
                            <th>Supplier</th>
                            <th>Return Quantity</th>
                            <th>Return Amount</th>
                            <th colspan="2">Retern payment</th>
                        </tr class="text-center">
                    </thead>
                    <tbody>
                        @php
                        $total_qty = $return->pluck('return_qty')->sum();
                        $return_price = $return->pluck('return_price')->sum();
                        $paid =$return[0]->purchase_return_purchase_invoice->purchase_invoice_purchase_payment->pluck('amount_paid')->sum();
                        $payable = $return[0]->purchase_return_purchase_invoice->payable_amount;
                        $due = ($payable-$paid)-($return_price);
                        @endphp
                        @foreach ($return as $i=>$item)
                        <tr>
                            <td>
                                <input type="hidden" value="{{$item->purchase_return_purchase_invoice->id}}" id="return_id">
                                {{$item->purchase_return_purchase_invoice->invoice}}
                            </td>
                            <td></td>
                            <td>{{$item->purchase_return_purchase_invoice->purchase_invoice_supplier->name}}</td>
                            <td>{{$item->return_qty}}</td>
                            <td>{{$item->return_price}}</td>


                        </tr>
                        @endforeach
                        <tr class="text-center">
                            <td><label>Total:</label> </td>
                            <td></td>
                            <td></td>
                            <td>{{$total_qty}}</td>
                            <td id="due">
                                @if ($due<0)<input id="payable" class="form-control" value="{{$due*(-1)}}" readonly type="number"> @else<input value="{{0}}" readonly class="form-control" id="payable" type="number" style="width: 80px;"> @endif </td>
                            <td><input type="number" id="paid_amount" class="form-control" style="width: 80px;"></td>
                            <td><button id="add_to_cash_btn" class="btn-sm btn-primary">Pay</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#add_to_cash_btn', function() {
            let current_row = $(this).closest('tr');
            let return_id = $('#return_id').val();
            let paid_abount = $('#paid_amount').val();
            let payable = $('#payable').val();




            $.ajax({
                url: "{{route('add_to_cash')}}",
                method: 'GET',
                data: {
                    return_id: return_id,
                    paid_amount: paid_abount,
                    payable: payable,
                },
                success: function(res) {
                    if (res == "success") {
                        location.reload(true);
                    }
                    else
                    {
                        alert(res);
                    }
                }
            });

        });
    })
</script>

@endsection