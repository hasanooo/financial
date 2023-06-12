@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <form action="{{route('sale.return',$in->id)}}" method="post">
            @csrf
            <div class="row mt-3">
                <div class="col-12">
                    <h3>Sale Return</h3>
                </div>
                <div class="col-md-4">
                    <h6>Invoice no: {{$in->invoice}}</h6>
                    <h6>Date: {{$in->date}}</h6>
                </div>
                <div class="col-md-4">
                    <h6>Customer: {{$in->invoice_customer->name}}</h6>
                    {{--<h6>Customer Group: {{$in->invoice_customer->customer_customergroup->customer_group_name}}</h6>--}}
                    
                </div>
                    
                <div class="col-md-4">
                    
                    <h6>Business Location: {{$in->location}}</h6>

                </div>
                
                <div class="col-12">
                    <table class="table table-bordered  table-responsive-sm">
                        <thead>
                            <tr class="text-center text-white"style="background-color:#0d5e8b;">
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Sale Quantity</th>
                                <th>Quantity Left</th>
                                <th>Return Quantity</th>
                                <th>Return Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($in->invoice_sale as $i=>$return)
                            <tr>
                                <td>
                                    {{$i+1}}
                                    <input type="hidden" name="sale_id[]" value="{{$return->id}}">
                                    <input type="hidden" name="product_id[]"
                                        value="{{$return->sale_product->id}}">
                                </td>
                                <td>{{$return->sale_product->name}}</td>
                                {{--<td>
                                    @if($return->sale_productprice->productprice_variation_value)
                                        {{$return->sale_productprice->productprice_variation_value->value_name}}
                                    
                                    @else
                                    <span>Single</span>
                                    @endif
                                    
                                </td>--}}
                                <td id="unit_price">{{$return->sale_product->selling_price}}</td>
                                <td>{{$return->qty}}</td>
                                <td></td>
                                <td>
                                    <input id="return_qty" name="return_qty[]" type="number" class="form-control">
                                    
                                </td>
                                <td><input type="number" id="retutn_price" name="return_price[]" class="form-control line-total"
                                        readonly></td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="6">Total</td>
                                <td><input type="number" readonly name="total_deduction" id="total_deduction"
                                        class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <input type="submit" class="btn float-right btn-primary" value="Return">
                </div>
            </div>
        </form>

    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('change', '#return_qty,#return_price', function() {
        let qty = $(this).val();
        let current_row = $(this).closest('tr');
        let cost = current_row.find('#unit_price').text();
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