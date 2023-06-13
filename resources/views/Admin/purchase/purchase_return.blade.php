@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <form action="{{route('purchase.return',$invoice->id)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h3>Purchase Return</h3>
                </div>
                <div class="col-md-6">
                    <h6>Reference No: {{$invoice->ref}}</h6>
                    <h6>Date: {{$invoice->purchase_date}}</h6>
                </div>
                <div class="col-md-6">
                    <h6>Supplier: {{$invoice->purchase_invoice_supplier->name}}</h6>
                    <h6>Business Location: BD Pet Care</h6>
                </div>
                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-white" style="background-color:#0d5e8b;">
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Unit Price</th>
                                <th>Purchase Quantity</th>
                                <th>Availabe Stock</th>
                                <th>Return Quantity</th>
                                <th>Return Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoice->purchase_invoice_purchase as $i => $item)
                                <tr class="text-center">
                                    <td>
                                        {{$i + 1}}
                                        <input type="hidden" name="purchase_id[]" value="{{$item->id}}">
                                        <input type="hidden" name="product_id[]" value="{{$item->purchase_product->id}}">
                                    </td>
                                    <td>{{$item->purchase_product->name}}</td>
                                    {{--<td>
                                        @if($item->purchase_product_price->variation_value_id !=0)
                                            {{$item->purchase_product_price->productprice_variation_value->value_name}}
                                        @else
                                            <span>Single</span>
                                        @endif
                                    </td>--}}
                                    <td id="unit_price">{{$item->purchase_product->purchase_price}}</td>
                                    <td>{{$item->purchase_qtn}}</td>
                                    <td></td>
                                    {{--<td id="stock">{{$item->purchase_product_price->qty}}</td>--}}
                                    <td><input id="return_qty" name="return_qty[]" type="number" class="form-control"></td>
                                    <td><input type="number" id="retutn_price" name="retutn_price[]" class="form-control line-total" readonly></td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="6">Total</td>
                                <td><input type="number" name="total_deduction" id="total_deduction" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <input id="return_btn" type="submit" class="btn float-right btn-primary" value="Return">
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click change', '#return_qty,#return_price', function() {
            let qty = $(this).val();
            let current_row = $(this).closest('tr');
            let cost = current_row.find('#unit_price').text();
            let stock = current_row.find('#stock').text();
            if (qty > parseInt(stock)) {
                alert("Return quantity can not be greater than total stock");
                //$('#return_btn').prop('disabled', true);
                $(this).val(stock);
                
            }
            let total = parseFloat(qty) * parseFloat(cost);
            current_row.find('#retutn_price').val(total);
            var sum = 0;
            $(".line-total").each(function() {
                sum += +$(this).val();
            });
            $('#total_deduction').val(sum);
        })
    });
</script>

@endsection