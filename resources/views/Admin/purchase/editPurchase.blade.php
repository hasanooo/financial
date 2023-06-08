@extends('Admin.layouts.dashboard')
@section('titel')
Edit Purchases
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Purchase</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('purchase.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Add Purchase</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{route('purchasesubedit')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--First Row -->
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <i class="fa fa-user"></i>
                            <label for="">Supplier:*</label>
                            <input type="hidden" id="id" value="{{$purchaseInvoice->id}}" name="id" />
                            <select name="suplier_id" id="k" class="form-control">

                                <option value="{{$purchaseInvoice->suplier_id}}">{{ $purchaseInvoice->suplier_id ? App\Models\Suplier::find($purchaseInvoice->suplier_id)->name : '' }}</option>

                            </select>
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <label for="">Purchase Status*</label>
                            <select name="purchase_status" id="" class="form-control">
                                <option value="{{$purchaseInvoice->purchase_status}}">{{$purchaseInvoice->status}}</option>
                                <option value="received">Received</option>
                                <option value="pending">Pending</option>
                            </select>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="">Purchase Date: *</label>
                            <input type="datetime-local" name="pdate" id="" class="form-control" value="{{$purchaseInvoice->purchase_date}}">
                        </div>



                    </div>
                    <!--First Row End-->

                    <!--Second Row End-->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row alert-success">

                                    <div class="form-group col-md-12 col-sm-12 mt-3">
                                        <i class="fa fa-search"></i>
                                        <label for="">Search Product:*</label>
                                        <select name="product_id" id="mySelect" class="form-control">
                                            <option value="">Enter Product name / SKU / Scan bar code </option>
                                            @foreach($product as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class=" table-responsive my-3">
                                        <div class="card-body">
                                            <table class="table table-bordered  table-head-fixed text-nowrap">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Image</th>
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <th>Brand</th>
                                                        <th>Variation</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="body_content">

                                                </tbody>
                                            </table>
                                            <table class="table table-bordered   text-nowrap ">
                                                <thead>
                                                    <tr class="text-center bg-green">
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Current Unit Cost</th>
                                                        <th>Increment(%)</th>
                                                        <th>Discount(%)</th>
                                                        <th>Per Unit Cost</th>
                                                        <th>Total Amount</th>

                                                    </tr>
                                                </thead>
                                                <tbody id="child_body_content">

                                                    @foreach ($purchaseInvoice->purchase_invoice_purchase as $purchase)
                                                    <tr>

                                                        <td>

                                                            <input type="hidden" name="product_price_id[]" value="{{$purchase->purchase_product_price->id}}">
                                                            <input type="text" class="form-control" readonly value="{{ $purchase->purchase_product_price->productprice_product->name }}">
                                                        </td>
                                                        <td><input type="number" class="form-control" value="{{ $purchase->purchase_qtn }}" name="p_qty[]" id="p_qty"></td>
                                                        <td><input type="number" class="form-control" value="{{ $purchase->prev_unit_cost }}" name="current_unit_cost[]" id="current_unit_cost"></td>
                                                        <td><input type="number" class="form-control" value="{{ $purchase->inc_unit_cost }}" name="increment_cost[]" id="increment_cost"></td>
                                                        <td><input type="number" class="form-control" value="{{ $purchase->purchase_discount }}" name="discount[]" id="discount"></td>
                                                        <td><input type="number" class="form-control" readonly value="{{ $purchase->current_unit_cost }}" name="per_unit_cost[]" id="per_unit_cost"></td>
                                                        <td><input type="number" class="form-control line-total" readonly value="{{ $purchase->purchase_qtn * $purchase->prev_unit_cost }}" name="line_total[]" id="line_total"></td>

                                                        <td>
                                                            <button class="btn btn-sm btn-danger" id="delete-invoice-sale" data-id="{{ $purchase->id }}">
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
                                        </div>

                                        <div class="form-group col-md-3 col-sm-12">
                                            <label for="">Amount:*</label>
                                            @if ($purchaseInvoice->purchase_invoice_purchase_payment->count() > 0)
                                            <input type="text" class="form-control" id="amount" name="total_amount_paid" value="{{ $purchaseInvoice->purchase_invoice_purchase_payment->pluck('amount_paid')->sum() }} " placeholder="0.00">
                                            @else
                                            <input type="text" class="form-control" id="amount" name="total_amount_paid" value="" placeholder="0.00">
                                            @endif
                                        </div>




                                        <div class="form-group col-md-3 col-sm-12">

                                            <label for="">Payment Method:*</label>
                                            <select name="payment_method" id="" class="form-control">
                                                <option value="">Please Select</option>
                                                <option selected value="cash">Cash</option>
                                                <!-- <option value="bkash">bkash</option> -->
                                            </select>
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
    $(document).on('change', '#p_qty, #current_unit_cost, #increment_cost, #discount', function() {
        let current_row = $(this).closest('tr');
        let qty = current_row.find('#p_qty').val();
        let current_unit_cost = current_row.find('#current_unit_cost').val();

        // Calculation if there is any increment in unit cost
        let increment_cost = current_row.find('#increment_cost').val();
        let increment_amount = (parseFloat(current_unit_cost) * parseFloat(increment_cost)) / 100;

        // Calculation if there is any discount
        let discount_cost = current_row.find('#discount').val();
        let discount_amount = (parseFloat(current_unit_cost) * parseFloat(discount_cost)) / 100;

        // Calculation for line total and final unit cost
        let final_unit_cost = (parseFloat(current_unit_cost) + increment_amount) - discount_amount;
        current_row.find('#per_unit_cost').val(final_unit_cost);
        let per_unit_cost = current_row.find('#per_unit_cost').val();
        let final_line_total = parseInt(qty) * parseFloat(per_unit_cost);
        current_row.find('#line_total').val(final_line_total);
        ChangeCalculation();

    });

    function ChangeCalculation() {
        var sum = 0;
        $(".line-total").each(function() {
            sum += +$(this).val();
        });
        $('#total_purchase').val(sum);
    }

    // Trigger the change event to calculate the initial values
    $('#p_qty, #current_unit_cost, #increment_cost, #discount').trigger('change');
    $("table").on('click', '#delete-invoice-sale', function(e) {
        e.preventDefault()
        var saleId = $(this).data('id');
        var row = $(this).closest('tr'); // Find the closest parent <tr> element
        var url = "{{ route('purchase.item.delete') }}";
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
                    ChangeCalculation();
                } else {
                    alert('Failed to delete invoice sale');
                }
            }
        });
    });

    $(document).ready(function() {
        $('#mySelect').select2();
        $(document).on('change', '#mySelect', function() {
            var q = $(this).val();

            $.ajax({

                url: "{{route('addpurchasepartial')}}",
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
                            $('#body_content').append(res);
                        }
                    }

                }
            })
        });

        $(document).on('click', '.delete-item', function() {
            var productId = $(this).closest('tr').data('product-id');
            $(this).closest('tr').remove();

        });

        $(document).on('change', '#variations_value', function() {
            let current_row = $(this).closest('tr');
            let variations_id = current_row.find(this).val();
            let product_id = current_row.find('#product_id').val();

            $.ajax({

                url: "{{route('admin.purchase_item')}}",
                method: 'GET',
                data: {
                    variations_id: variations_id,
                    product_id: product_id,
                },
                success: function(res) {
                    if (res != null) {

                        $('#child_body_content').append(res);
                    }

                }
            })

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
    });
</script>







@endsection