@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="col-12 mt-3">
            <span style="font-size:27px; font-weight:23px;">Sale Refund</span> <small style="color:gray;"> Manage sale
                Refund</small>
        </div>
        <table id="return_table" class="table table-bordered table-striped my-3">
            <thead>
                <tr class="text-center bg-success">

                    <th>Invoice</th>
                    <th>Customer</th>
                    <th>Return Quantity</th>
                    <th>Return Amount</th>
                    <th colspan="4">Return payment</th>
                </tr class="text-center">
            </thead>
            <tbody>
                @php
                    $total_qty = $return->pluck('return_qty')->sum();
                    $return_price = $return->pluck('return_price')->sum();
                    $paid =$return[0]->sale_return_sale_invoice->invoice_payment->pluck('amount_paid')->sum();
                    $payable = $return[0]->sale_return_sale_invoice->total_amount;
                    $due = ($payable-$paid)-($return_price);
                @endphp
                @foreach ($return as $i=>$item)
                <tr>
                    <td>
                        <input type="hidden" value="{{$item->sale_return_sale_invoice->id}}" id="return_id">
                        {{$item->sale_return_sale_invoice->invoice}}
                    </td>
                   
                    <td>{{$item->sale_return_sale_invoice->invoice_customer->name}}</td>
                    <td>{{$item->return_qty}}</td>
                    <td>{{$item->return_price}}</td>


                </tr>
                @endforeach
                <tr class="text-center">
                    <td><label>Total:</label></td>
                    <td></td>
                    <td>{{ $total_qty }}</td>
                    <td id="due">
                        @if ($due < 0)
                            {{ $due*(-1) }}
                        @else
                            {{ 0 }}
                        @endif
                    </td>
                    <td><input type="number" id="paid_amount" class="form-control"></td>
                    <td><button id="add_to_cash_btn" class="btn-sm btn-primary">Pay</button></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#add_to_cash_btn', function() {
        let current_row = $(this).closest('tr');
        let return_id = $('#return_id').val();
        let paid_abount = $('#paid_amount').val();
        let due = $('#due').text();
        
       
            $.ajax({
                url: "{{route('add_cash')}}",
                method: 'GET',
                data: {
                    return_id: return_id,
                    paid_amount: paid_abount,
                },
                success: function(res) {
                    location.reload(true);
                }
            });
        
    });
})
</script>

@endsection