@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size:27px; font-weight:23px;">Products</span> <small style="color:gray;"> Manage your
                    products</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-md-6">
                    <span>All Products</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" href="{{route('product.create')}}">
                        <i class="fa-solid fa-plus"></i> Add
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                    <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                    <h5 class="text-danger">Are you sure to remove this product?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" id="con-del" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stock Modal Start -->
                    @include('Admin.products.stock_modal')

                </div>
            </div>
            <div class="row">


                <div class="col-12 my-1">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-0" placeholder="Product name/SKU.." id="search">
                        <span class="input-group-text rounded-0"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>

                   </div>
            </div>
            @if ($products->count() > 0)
            <div class="card  table-responsive my-3">
                <div class="card-body">
                    <table class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Brand</th>
                              
                                <th>Status</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $i=>$item)
                            <tr class="text-center">
                                <td>{{$i +1}}
                                    <input type="hidden" value="{{$item->id}}" id="uid">
                                </td>
                                <td><img style="width:40px;" src="{{$item->image==null?'ProductImage/products/defaultimage.png':'ProductImage/products/'.$item->image}}" alt=""></td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->product_category->name}}</td>
                                <td>{{$item->product_unit->short_name}}</td>
                                <td>{{$item->product_brand->brand_name}}</td>
                              


                                <td>{{$item->status}}</td>

                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg></button>
                                        <ul class="dropdown-menu text-left px-3 " role="menu" aria-labelledby="menu1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('product.edit',$item->id)}}" class="btn"><i class="fa-solid fa-pen-to-square"></i>
                                                    Edit</a></li>
                                            <li role="presentation"><a href="{{route('product.view',$item->id)}}" class="btn">
                                                    <i class="fa-solid fa-eye"></i>
                                                    View</a></li>
                                            <li role="presentation"><button type="button" id="user_remove" class="btn" data-bs-toggle="modal">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button></li>
                                            <li>
                                                <button class="btn" id="id">
                                                    <i class="fa-solid fa-store"></i> Open stock</button>
                                            </li>


                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @else
            <h5 class="text-center text-danger mt-5 alert alert-danger">No Product found</h5>
            @endif
            
            <div class="pagination d-flex justify-content-end">
            {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '#user_remove', function() {
            var current_row = $(this).closest('tr');
            let uid = current_row.find('#uid').val();
            $('#exampleModal').modal('show');
            $('#con-del').attr("href", "delete_product/" + uid);
        })

    });


    $(document).ready(function() {
        $('body').on('click', '#id', function() {
            var current_row = $(this).closest('tr');
            var p_id = current_row.find('#uid').val();
            // $('#exampleModalEdit').modal('show');
            $.ajax({
                url: "{{ route('product.partial_stock') }}",
                method: 'GET',
                data: {
                    p_id: p_id,
                },
                success: function(res) {
                    $('.parent').html(res);
                    $('#exampleStockModal').modal('show');
                }
            });
        });
        $(document).on('mouseover', '#stock_submit', function() {
            var sum = 0;
            $(".qt").each(function() {
                sum += +$(this).val();
            });
            if (sum > 15) {
                $("#stock_submit").attr("disabled", "disabled");
            } else {
                $("#stock_submit").removeAttr("disabled");
            }

            $('.stock').text(sum);
        })

    });




    function reloadPage() {
        location.reload();
    }


    let total_subtotal = 0;

    $(document).on('change', '#qtn,#cost', function() {

        var current_row = $(this).closest('tr');

        let cost = current_row.find('#cost').val();
        let qtn = current_row.find('#qtn').val();

        let total = qtn * cost;
        current_row.find('#total').val(total);

        let previous_total = current_row.find('#total').data('previous-total');


        if (previous_total && previous_total !== total) {
            total_subtotal -= previous_total;
        }

        current_row.find('#total').data('previous-total', total);

        total_subtotal += total;

        // Check if any of the row total values are empty or not a number
        let has_empty_total = false;
        $('input#total').each(function() {
            let total = $(this).val();
            if (!total || isNaN(total)) {
                has_empty_total = true;
                return false;
            }
        });

        if (has_empty_total) {
            total_subtotal = 0;
        }

        // Update the total subtotal value
        $('#total_subtotal').text(total_subtotal);

    });

    $(document).on('blur', '#qtn ,#cost', function() {
        var current_row = $(this).closest('tr');
        let total = current_row.find('#total').val();

        // If the total value is empty or not a number, set it to zero
        if (!total || isNaN(total)) {
            total = 0;
            current_row.find('#total').val(total);
        }

        // Trigger the keyup event to update the total subtotal value
        $(this).trigger('keyup');
    });

    $(document).on('keyup', '#search', function() {

    let q = $(this).val();
    //alert(q);
    if (q == "") {
        location.reload();
        return;
    }
    $.ajax({
        url: "{{ route('Product.search') }}",
        method: 'GET',
        data: {
            q: q,
        },
        success: function(res) {
            $('.k_search').html(res);

        }
    });
});
</script>
@endsection