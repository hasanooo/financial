@extends('Admin.layouts.dashboard')
@section('titel')
Add Purchases
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Purchase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('purchase.index')}}">List Purchase</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{route('purchaseaddsub')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--First Row -->
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <i class="fa fa-user"></i>
                            <label for="">Supplier:*</label>
                            <select name="supplier_id" id="k" class="form-control @error('suplier_id') is-invalid @enderror">

                                <option>Please Select</option>
                                @foreach($ss as $s)
                                <option value="{{$s->id}}">{{$s->name}}</option>
                                @endforeach
                            </select>
                            @error('suplier_id')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-4 col-sm-12">
                            <label for="">Purchase Date: *</label>
                            <input type="datetime-local" name="pdate" id="datetime" class="form-control" value="{{old('date')}}">
                            @error('pdate')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label for="" class="form-label">Credit Category:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                                </div>
                                <select id="" name="category" class="form-control rounded-0" style="background-color:whitesmoke;">
                                    <option value="">Please Select</option>
                                    @foreach($category_credit as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>


                        

                    </div>
                    <!--First Row End-->

                    <!--Second Row -->
                    <!-- <div class="form-row">

                        <div class="form-group col-md-3 col-sm-12">
                            <label for="">Attach Document:*</label>
                            <input type="file" class="form-control" id="" name="docu" placeholder="SKU">
                        </div>
                    </div> -->
                    <!--Second Row End-->



                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row alert-success">
                                    <div class="form-group col-md-12  mt-3">
                                    
                                        <select name="product_id" id="mySelect" class="form-control">
                                            <option value="">Enter Product name / SKU / Scan bar code </option>
                                            @foreach($product as $item)
                                                
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                        
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" table-responsive my-3">
                                        <div class="card-body">
                    
                                            <table class="table table-bordered   text-nowrap ">
                                                <thead>
                                                    <tr class="text-center" style="background-color:#0d5e8b;">
                                                        <th style="color:white;">Image</th>
                                                        <th style="color:white;">Product Name</th>
                                                        <th style="color:white;">Category</th>
                                                        <th style="color:white;">Quantity</th>
                                                        <th style="color:white;">Price</th>
                                                        <th style="color:white;">Total Amount</th>
                                                        <th style="color:white;">Action</th>
                                                        <!-- <th>Lot No</th>
                                                        <th>MFG Date</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody id="child_body_content">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row mt-5">
                        <div class="card p-3">
                            <div class="col-sm-6">
                                <h5>Add Payment</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="container">
                                    <div class="form-row">

                                        <div class="form-group col-md-3 col-sm-12">

                                            <label for="">Total Purchase:*</label>
                                            <input type="text" class="form-control" id="total_purchase" name="purchase_price" placeholder="0.00">
                                            @error('purchase_price')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 col-sm-12">

                                            <label for="">Amount:*</label>
                                            <input type="text" class="form-control" id="amount" name="total_amount_paid" placeholder="0.00">
                                            @error('total_amount_paid')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-3 col-sm-12">

                                            <label for="">Payment Method:*</label>
                                            <select name="payment_method" id="" class="form-control @error('payment_method') is-invalid @enderror">
                                                <option value="">Please Select</option>
                                                <option selected value="cash">Cash</option>
                                                <!-- <option value="bkash">bkash</option> -->
                                            </select>
                                            @error('payment_method')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-3 col-sm-12">

                                            <label for="">Payment Account:</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">Please Select</option>
                                            </select>
                                        </div>



                                    </div>
                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="">Payment note:</label>
                                            <textarea class="form-control" id="" name="payment_note" cols="170"></textarea>
                                            @error('payment_note')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <input type="submit" style="float:right;" value="Save" class="btn btn-primary mt-4 pr-4 pl-4" />
                            </div>
                        </div>


                </form>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#mySelect').select2();
        $(document).on('change', '#mySelect', function() {
            var q = $(this).val();

            $.ajax({

                url: "{{route('admin.purchase_item')}}",
                method: 'GET',
                data: {
                    q: q
                },
                success: function(res) {

                    if (res != null) {

                        if (res == 0) {

                            $.ajax({

                                url: "{{route('admin.purchase_item')}}",
                                method: 'GET',
                                data: {
                                    variations_id: 0,
                                    product_id: q,
                                },
                                success: function(res) {
                                    if (res != null) {

                                        $('#child_body_content').append(res);
                                    }

                                }
                            });

                        } else {
                            $('#child_body_content').append(res);
                        }
                    }

                }
            })
        });

        $(document).on('click', '.delete-item', function() {
            var productId = $(this).closest('tr').data('product-id');
            $(this).closest('tr').remove();

        });


        $(document).on('click', '.delete_prices', function() {
            var productId = $(this).closest('tr').data('productprice-id');
            $(this).closest('tr').remove();

            var sum = 0;
            $(".line-total").each(function() {
                sum += +$(this).val();
            });
            $('#total_purchase').val(sum);
        });


        $(document).on('change', '.p_qty, .price', function() {
            let current_row = $(this).closest('tr');
            let qty = current_row.find('.p_qty').val();
            let price = current_row.find('.price').val();
            let total_amount = qty * price;
            current_row.find('.total_amount').val(total_amount);

            let total_purchase = 0;
            $('.total_amount').each(function() {
                total_purchase += Math.round($(this).val());
            });

            $('#total_purchase').val(total_purchase);
        });

        function updateDateTime() {
            var datetimeInput = document.getElementById("datetime");
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            var currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, "0");
            var currentDay = currentDate.getDate().toString().padStart(2, "0");
            var currentHour = currentDate.getHours().toString().padStart(2, "0");
            var currentMinute = currentDate.getMinutes().toString().padStart(2, "0");

            var formattedDateTime = currentYear + "-" + currentMonth + "-" + currentDay + "T" + currentHour + ":" + currentMinute;
            datetimeInput.value = formattedDateTime;
        }

        // Update the date and time initially
        updateDateTime();

        // Update the date and time every second (1000 milliseconds)
        setInterval(updateDateTime, 1000);
    });
</script>

@endsection