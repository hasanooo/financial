@extends('Admin.layouts.dashboard')
@section('titel')
Edit Sales
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    span.select2-selection.select2-selection--single {
        padding: 0px 13px;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Sale</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Sale</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>


<section class="content">
    <div class="row">

        <form action="{{route('sale.edit.form.submit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="">Customer:*</label>

                            <div class="input-group">

                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="hidden" name="id" value="{{$yy->id}}">
                                <select name="customer" id="" class="form-control">
                                    <option value="{{$yy->customer_id}}">{{ $yy->customer_id ? App\Models\Customer::find($yy->customer_id)->name : '' }}</option>
                                </select>
                            </div>
                        </div>



                       
                        <div class="form-group col-md-3 col-sm-12">
                            <label for="">Status*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-list-check"></i></span>
                                </div>
                                <select name="status" id="" class="form-control">
                                    <option value="{{$yy->status}}">{{$yy->status}}</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Quotation">Quotation</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <!--Second Row End-->

                <div class="row">
                    <!--Div starts here-->
                    <div class="col-12">

                        <div class="row alert-success">

                            <div class="form-group col-md-12 col-sm-12 mt-3">
                                <input type="text" name="invoice_id" hidden value="{{$yy->id}}">
                                <i class="fa fa-user"></i>
                                {{-- <label for="">Product:*</label>
                                <select name="pro" id="mySelect" class="form-control">
                                    <option value="1">Please Select</option>
                                    @foreach ($yy->invoice_sale as $pp)
                                    <option value="{{ $pp->sale_product->id }}">{{$pp->sale_product->name }}</option>
                                    @endforeach
                                </select> --}}
                            </div>



                            <div>
                                <!--Div starts here-->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            
                                            <table class=" table table-bordered  table-responsive-sm  col-md-12">
                                                <thead>
                                                    <tr class="text-center bg-lightblue">
                                                        <th>Sl</th>
                                                        <td>Product Name</td>
                                                        
                                                        <td>Quantity</td>
                                                        
                                                        <td>Price</td>
                                                        
                                                        <td>Subtotal</td>
                                                        <td>Remove</td>

                                                    </tr>
                                                </thead>
                                                <tbody class="parent_child" data-edit-id="{{$yy->id}}">
                                                    @foreach ($yy->invoice_sale as $i=>$y)
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>

                                                            <input type="text" hidden name="sale_id[]" value="{{$y->id}}">
                                                            <input type="text" class="form-control" name="pname[]" readonly style="resize: none;  width: 200px; font-weight: bold;" value="{{ $y->sale_product->name }}"></textarea>
                                                             
                                                            
                                                        </td>
                                                       
                                                        <td>
                                                            <input type="hidden" name="sell_id[]" value="{{$y->id}}">
                                                            <input type="number" class="form-control price_qty" name="quantity[]" value="{{  $y->qty }}">
                                                        </td>
                                                        
                                                        <td><input type="number" class="form-control" readonly value="{{$y->sale_product->selling_price}}" id="current_price"></td>
                                                        
                                                        <td><input type="text" class="form-control" readonly id="ooo"></td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" id="delete-invoice-sale" data-id="{{ $y->id }}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </td>

                                                    </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="container">
                                        <table class="table col-md-12">
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">Total Amount:</label>
                                                                <input type="text" class="ta form-control" id="at" name="total_amount" readonly value="{{$yy->shipping_charge}}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="shcharge" class="form-label"><b>Shipping Charges</b></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-text">$</span>
                                                                    <input type="number" id="shcharge" name="shcharge" class="form-control shipping_charge" placeholder="Shipping Charges" value="{{$yy->shipping_charge}}">

                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label for="shdetails" class="form-label"><b>Shipping Details</b></label>
                                                                <input type="text" id="shdetails" name="shdetails" class="form-control" placeholder="Shipping Details" value="{{$yy->shipping_details}}">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 col-sm-12 mt-3">
                                                            <div class="row" style="flex-direction: column">
                                                                <div class="col-md-3 d-flex align-items-center">
                                                                    <b>Sell Note</b>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-floating">
                                                                        <textarea class="form-control" name="sellnote" placeholder="Leave a comment here" id="floatingTextarea">{{$yy->sellnote}}</textarea>
                                                                        <label for="floatingTextarea">Sell Note</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--Div Ends here-->

                        </div>
                    </div>
                </div>


                <div class="row mt-4">

                    <div class="col-md-12">
                        <div class="container">
                            <div class="form-row">
                                <div class="form-group col-md-4 col-sm-12">

                                    <label for="">Amount:*</label>

                                    <input type="text" class="form-control atat" class="amountintotal" id="adci" name="amount" placeholder="0.00" value="{{$yy->total_amount}}">

                                </div>

                                <div class="form-group col-md-4 col-sm-12">

                                    <label for="">Payment Method:*</label>

                                    <select name="paymethod" id="" class="form-control">
                                        <option value="{{$yy->invoice_payment->first()->payment_method}}">{{$yy->invoice_payment->first()->payment_method}}</option>
                                        <option value="cash">Cash</option>
                                        <option value="bhash">bkash</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4 col-sm-12">

                                    <label for="">Payment Account:</label>
                                    <select name="payacc" id="" class="form-control">
                                        <option value="{{$yy->invoice_payment->first()->payment_account}}">{{$yy->invoice_payment->first()->payment_account}}</option>

                                        <option value="oncash">Cash</option>

                                    </select>
                                </div>



                            </div>
                            <div class="form-row">

                                <div class="col-md-12 col-sm-12">
                                    <div class="row" style="flex-direction: column">
                                        <div class="col-md-3 d-flex align-items-center">Payment Note </div>
                                        <div class="col-md-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" name="paynote" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                <label for="floatingTextarea">Payment Note</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <input type="submit" style="float:right;" value="Save" class="btn btn-primary mt-4 pr-4 pl-4" />
            </div>
    </div>
    </form>
    </div>

</section>



<script>
    $(document).ready(function() {
        function updateTotalAmount() {
            var totalAmount = parseInt($('#at').val());
            var shippingCharge = parseInt($('.shipping_charge').val());
            var subTotal = 0;


            $('.price_qty').each(function() {
                var currentRow = $(this).closest('tr');
                var qty = parseInt($(this).val());
                var price = parseInt(currentRow.find('#current_price').val());
                
                // var tax = parseFloat(currentRow.find('#tax').val());
                // var taxamount = (parseFloat(tax) / 100) * parseInt(price);
                 var total = qty * price;
                 subTotal += total;
                 currentRow.find('#ooo').val(total);
            });


            totalAmount = subTotal + shippingCharge;
            $('#at').val(totalAmount);

        }


        $(document).on('change', '.price_qty, .shipping_charge', function() {
            updateTotalAmount();
        });
        



        updateTotalAmount();
        $("table").on('click', '#delete-invoice-sale', function(e) {
            e.preventDefault()
            var saleId = $(this).data('id');
            var row = $(this).closest('tr'); 
            var url = "";
            $.ajax({
                type: 'GET',
                url: url,
                data: {
                    id: saleId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        row.remove();
                        updateTotalAmount();
                    } else {
                        alert('Failed to delete invoice sale');
                    }
                }
            });
        });
        $('#k').select2();
        $('#mySelect').select2();
        $(document).on('change', '#mySelect', function(e) {
            updateTotalAmount();
            var q = $('#mySelect').val();
            var c_group_id = $('#customergroup').val();

            $.ajax({
                url: "",
                method: 'GET',
                data: {
                    q: q
                },
                success: function(res) {
                    if (res != null) {
                        updateTotalAmount();
                        $('.parent').html(res);

                        var current_row = $('.llll').closest('tr');
                        var vari_id = current_row.find('.kkkkkk').val();
                        var vid = current_row.find('#variationid').val();

                       
                        console.log(vari_id);
                        if (vari_id == 0) {
                            $.ajax({
                                url: "",
                                method: 'GET',
                                data: {
                                    vari_id: vari_id,
                                    c_group_id: c_group_id,
                                    vid: vid
                                },
                                success: function(res) {
                                    if (res != null) {
                                        $('.parent_child').append(res);
                                        updateTotalAmount();
                                    }
                                }
                            })
                        }
                    }
                }
            })
        });
    });

    $(document).ready(function() {


        $(document).on('change', '#hhh', function(e) {
            var current_row = $(this).closest('tr');
            var q = current_row.find('#hhh').val();

            var c_group_id = $('#customergroup').val();
            var vid = current_row.find('#variationid').val();

            alert(vid);
            $.ajax({

                url: "",
                method: 'GET',
                data: {
                    q: q,
                    c_group_id: c_group_id,
                    vid: vid


                },
                success: function(res) {
                    if (res != null) {


                        $('.parent_child').append(res);

                    }

                }
            })

        });

        $(document).on('click', '.delete-double', function() {
            var productId = $(this).closest('tr').data('data-double-id');
            $(this).closest('tr').remove();

            updateTotalAmount();
        });

        $(document).on('click', '.delete-saleadd', function() {
            var productId = $(this).closest('tr').data('product-id');
            $(this).closest('tr').remove();

        });

    });

</script>

@endsection