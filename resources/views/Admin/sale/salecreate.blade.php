@extends('Admin.layouts.dashboard')
@section('titel')
    Add Sales
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    <h1>Add Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Sale</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>





    <!-- Content Header (Page header) -->



    <section class="content">
        <div class="row">

            <form action="{{ route('sale.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-12 ">
                                <i class="fa fa-user"></i>
                                <label for="">Customer:*</label>
                                <select name="customer" id="k"
                                    class="form-control @error('customer') is-invalid @enderror">
                                    <option value="">Please Select</option>
                                    @foreach ($customer as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('customer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-sm-12">

                                <label for="">Status*</label>
                                <select name="status" id=""
                                    class="form-control @error('status') is-invalid @enderror">
                                    <option value="0">Select Status</option>
                                    <option value="Final">Final</option>
                                    <option value="Draft">Draft</option>
                                    <option value="Quotation">Quotation</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>
                       
                        <!--First Row End-->

                       

                    </div>
                    <!--Second Row End-->

                    <div class="row">
                        <!--Div starts here-->
                        <div class="col-12">

                            <div class="row alert-success">

                                <div class="form-group col-md-12 col-sm-12 mt-3">
                                    <i class="fa fa-user"></i>
                                    <label for="">Product:*</label>
                                    <select name="pro" id="mySelect" class="form-control">
                                        <option value="1">Please Select</option>
                                        @foreach ($product as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <!--Div starts here-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="container">

                                                <table class=" table-responsive-sm table col-md-12">
                                                    <thead>
                                                        <tr text-center>
                                                            <td colspan="2">Product Name</td>

                                                            <td>Quantity</td>

                                                            <td>Price</td>
                                                            <td>Tax(%)</td>
                                                            <td>Total Amount</td>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="parent">

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="container">
                                            <table class="  table col-md-12">


                                                <tbody>




                                                    <tr>
                                                        <td>

                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="row" style="flex-direction: column">
                                                                    <div class="col-md-3 d-flex align-items-center">
                                                                        ShippingDetails</div>
                                                                    <div class="  col-md-12">
                                                                        <input style="width: 150%" type="text"
                                                                            name="shdetails" class="form-control"
                                                                            placeholder="Shipping Details">
                                                                        @error('shdetails')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="col-md-3">
                                                            <div class="col-md-3 col-sm-12">
                                                                <div class="row" style="flex-direction: column">
                                                                    <div class="col-md-3 d-flex align-items-center">
                                                                        ShippingCharges</div>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" style="width: 300%"
                                                                            id="spc" name="shcharge"
                                                                            class="form-control jkkk"
                                                                            placeholder="Shipping Charges">
                                                                        @error('shcharge')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="row" style="flex-direction: column">
                                                                    <div class="col-md-3 d-flex align-items-center">
                                                                        Sell Note </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control " name="sellnote" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                                            <label for="floatingTextarea">Sell
                                                                                Note</label>
                                                                            @error('sellnote')
                                                                                <span
                                                                                    class="text-danger">{{ $message }}</span>
                                                                            @enderror
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
                                    <div class="form-group col-md-3 col-sm-12">

                                        <label for="">Amount:*</label>
                                        <input type="text" class="form-control atat" class="amountintotal"
                                            id="adci" name="amount" placeholder="0.00" readonly>
                                        @error('amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="form-group col-md-3 col-sm-12">

                                        <label for="">Payment Method:*</label>
                                        <select name="paymethod" id=""
                                            class="form-control @error('paymethod') is-invalid @enderror">
                                            <option value="">Please Select</option>
                                            <option value="cash">Cash</option>
                                            <option value="bhash">bkash</option>
                                        </select>
                                        @error('paymethod')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-3 col-sm-12">

                                        <label for="">Payment Account:</label>
                                        <select name="payacc" id=""
                                            class="form-control @error('payacc') is-invalid @enderror">
                                            <option value="">Please Select</option>

                                            <option value="oncash">Cash</option>

                                        </select>
                                        @error('payacc')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                                    @error('paynote')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <input type="submit" style="float:right;" value="Save" class="btn btn-primary mt-4 pr-4 pl-4" />
            </form>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#k').select2();
            $('#mySelect').select2();
            $(document).on('change', '#mySelect', function(e) {
                var q = $('#mySelect').val();
                var c_group_id = $('#customergroup').val();

                $.ajax({
                    url: "{{ route('sale.productpartial') }}",
                    method: 'GET',
                    data: {
                        q: q
                    },
                    success: function(res) {
                        if (res != null) {
                            $('.parent').append(res);
                            let sum = 0;
                            $('.ppone').each(function() {
                                sum += +$(this).val();
                            });
                            var q = $('#spc').val();
                            var b = parseInt(sum);
                            var a = parseInt(q);

                            if (q == '') {

                                a = 0;

                                var with_shiping = a + b;
                                $('.atat').val(with_shiping);

                            } else {

                                var with_shiping = a + b;
                                $('.atat').val(with_shiping);
                            }


                        }
                    }
                })
            });

            $(document).on('click', '.delete-saleadd', function() {
                var productId = $(this).closest('tr').data('product-id');
                $(this).closest('tr').remove();

            });


            $(document).on('change', '#k', function(e) {
                var q = $('#k').val();
                // alert(q);
                $.ajax({

                    url: "",
                    method: 'GET',
                    data: {
                        q: q
                    },
                    success: function(res) {
                        if (res != null) {


                            $('.customer_partial_page').html(res);
                        }

                    }
                })

            });

            $(document).on('click', '.delete-double', function(e) {
                e.preventDefault();
                var productId = $(this).closest('tr').data('data-double-id');
                $(this).closest('tr').remove();

            });

            $(document).on('change', '#hhh', function(e) {
                var current_row = $(this).closest('tr');
                var q = current_row.find('#hhh').val();

                var c_group_id = $('#customergroup').val();
                var vid = current_row.find('#variationid').val();

                // var t= $('#j').val();
                // alert(vid);
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

            $(document).on('change', '#price_qty', function() {
                var current_row = $(this).closest('tr');
                let qty = current_row.find(this).val();
                var current = current_row.find('#current_price').val();
                let total_amount = qty * current;
                current_row.find('#ooo').val(total_amount);

            });

            $(document).on('change', '#spc', function(e) {
                let sum = 0;
                $('.ppone').each(function() {
                    sum += +$(this).val();
                });
                var q = $('#spc').val();
                var b = parseInt(sum);
                var a = parseInt(q);
                var with_shiping = a + b;
                $('.atat').val(with_shiping);

            });

        });
    </script>
@endsection
