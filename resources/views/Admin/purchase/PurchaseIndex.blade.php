@extends('Admin.layouts.dashboard')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}/">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@section('content')


<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">

                <h3>Purchases <span style="font-size: 12px;color:rgb(75, 95, 75)"> List of all Purchases</span></h3>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">

                    <a href="{{route('purchase.add')}}"><button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Add
                        </button></a>

                </div>

            </div>

            <!--Payment modal -->
            <div class="modal fade" id="exampleModalpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLabel">Make Due payment</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form action="{{route('submakepayment')}}" method="post" enctype="multipart/form-data" class="row g-3">
                                {{@csrf_field()}}


                                <div class="col-md-12">
                                    <input type="hidden" name="invoice_id" id="invoice_id">
                                    <label for="" class="form-label">Due Payment:*</label>
                                    <input type="text" class="form-control rounded-0" id="due" value="" placeholder="Due Payment">

                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Pay amount:*</label>
                                    <input type="text" name="pay_amount" class="form-control rounded-0" id="pay_amount" value="{{old('due_amount')}}" placeholder="Pay amount">

                                </div>
                                <span id="alert_msg" class="text-danger"></span>
                                <div class="modal-footer">
                                    <button type="submit" id="payment_submit" class="btn btn-primary rounded-0">Make
                                        Payment</button>
                                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div> <!-- End -->



            <!--Delete modal -->
            <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                            <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                            <h5 class="text-danger">Are you sure to remove this Purchase info?</h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" id="con-del" href="">Delete</a>
                        </div>
                    </div>
                </div>
            </div> <!-- End -->

            <!-- invoice view modal -->
            @include('Admin.purchase.view_invoice_modal')
            <div class="row">

                <div class="col-12">
                    <div class="right d-flex justify-content-end">
                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" id="search" type="search">
                            <div class="dropdown">
                                <a class="btn btn-info text-light" href="#" role="button" data-bs-toggle="dropdown">Action</a>
                                <ul class="dropdown-menu bg-info">
                                    <li><a class="dropdown-item bg-info text-light" href="#"><i class="fa-regular fa-clipboard"></i> Copy </a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"><i class="fa-regular fa-clipboard"></i> Export to CSV</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Export to Excel</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Export to PDF</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-solid fa-print"></i> Print</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Column visibility</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-white" style="background-color:#0d5e8b;">
                            <th>Invoice</th>
                            <th>Supplier</th>
                            <th>Purchase Amount</th>
                            <th>Purchase Paid</th>
                            <th>Return Amount</th>
                            <th>Due Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $totaldue = 0;
                        $totalpurchase=0;
                        $totalpaid=0;
                        $totalreturn=0;
                        @endphp

                        @foreach ($purchase_invoice as $p)
                        <tr class="text-center">
                            <td>
                                <input type="hidden" id="uid" value="{{$p->id}}">
                                <input type="hidden" name="invoice_id" id="idu" value="{{$p->id}}">

                                <button id="modal_view" class="btn btn-sm">{{$p->invoice}}</button>
                            </td>
                            <td>{{ $p->purchase_invoice_supplier->name}}</td>
                            <td>{{$p->payable_amount}} </td>
                            <td>{{ $p->purchase_invoice_purchase_payment->pluck('amount_paid')->sum() }}</td>
                            @php
                            $return = 0;

                            $purchase = $p->payable_amount;
                            $totalpurchase += $purchase;
                            $paid = $p->purchase_invoice_purchase_payment->pluck('amount_paid')->sum();
                            $totalpaid += $paid;
                            @endphp
                            @if ($p->purchase_invoice_purchase_return!=null)
                            @php
                            $return = $p->purchase_invoice_purchase_return->pluck('return_price')->sum();
                            $totalreturn += $return;
                            @endphp
                            @endif
                            <td>

                                {{$return}}

                            </td>

                            @php
                            $due = ($purchase-$paid)-($return);
                            $totaldue += $due;
                            @endphp
                            <td><span id="d_amount" class="{{$due<0?'text-danger':'text-primary'}}">{{$due}}</span></td>
                            <td>
                                @if ($p->payable_amount == $due)
                                <span class="badge badge-danger"> Unpaid</span>
                                @elseif($due <=0) <span class="badge badge-success"> Paid</span>
                                    @else
                                    <span class="badge badge-primary"> Partial</span>
                                    @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                        </svg></button>
                                    <ul class="dropdown-menu text-left px-6 " role="menu" aria-labelledby="menu1">

                                        <li role="presentation"> <a data-bs-toggle="modal" class="btn btn-sm" id="purchase_delete">
                                                <i class="fa-solid fa-trash"></i> Delete </a></li>

                                        <li>
                                            <a class="btn btn-sm" href="{{route('purchase.edit',$p->id)}}"> <i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                        </li>
                                        <li>
                                            @if ($due>0.00)
                                            <a href="javascript:void(0)" class="btn btn-sm" data-url="{{route('purchasedue.edit',$p->id)}}" id="make_payment"><i class="fa-solid fa-pen-to-square"></i>Make
                                                Payment</a>

                                            @endif
                                            <a href="{{route('purchase.return',$p->id)}}" class="btn btn-sm"><i class="fa-solid fa-pen-to-square"></i> Return</a>
                                        </li>

                                        @if ($p->purchase_invoice_purchase_return->count()>0)

                                        <li>
                                            <a class="btn btn-sm" href="{{route('return.product',$p->id)}}"> <i class="fa-solid fa-pen-to-square"></i> Return product</a>
                                        </li>
                                        @endif


                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @endforeach

                        <tr class="text-center">
                            <th>Total</th>
                            <th colspan="1"></th>
                            <th>{{$totalpurchase}}</th>
                            <th>{{$totalpaid}}</th>
                            <th>{{$totalreturn}}</th>
                            <th colspan="" id="total_due_amount">{{$totaldue}}</th>
                            <th colspan="2">
                                @if($has_supplier_id)
                                <button type="button" id="totalpay" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModaltotalpayment">
                                    <i class="fa-solid fa-eye"></i>
                                    Make Payment
                                </button>
                                @endif
                            </th>
                        </tr>



                    </tbody>
                </table>
            </div>
            <!--Total Payment modal -->
            <div class="modal fade" id="exampleModaltotalpayment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <p class="modal-title" id="exampleModalLabel">Make Due payment</p>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <form action="{{route('purmakepayment')}}" method="post" enctype="multipart/form-data" class="row g-3">
                                {{@csrf_field()}}


                                <div class="col-md-12">
                                    <input type="hidden" name="purchase_id" id="" value="{{$purchase_id}}">
                                    <input type="hidden" name="duetotal" id="" value="{{$totaldue}}">
                                    <label for="" class="form-label">Due Payment:*</label>
                                    <input type="text" class="form-control rounded-0" id="totaldue" value="" placeholder="Due Payment">

                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Pay amount:*</label>
                                    <input type="text" name="pay_amount" class="form-control rounded-0" id="pay_amount" value="{{old('due_amount')}}" placeholder="Pay amount">

                                </div>
                                <span id="alert_msg" class="text-danger"></span>
                                <div class="modal-footer">
                                    <button type="submit" id="payment_submit" class="btn btn-primary rounded-0">Make
                                        Payment</button>
                                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div> <!-- End -->
            <div>
                <p>Showing 1 to 2 of 2 entries</p>
            </div>
            <div class="pagination d-flex justify-content-end">
                {{ $purchase_invoice->links() }}
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script src="/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/plugins/jszip/jszip.min.js"></script>
<script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<script>
    $(document).ready(function() {
        $(function() {
           
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
        $("#exampleModalpayment").on("hidden.bs.modal", function() {
            $(this).find('form').trigger('reset');
            $('#alert_msg').text("");
        });

    });

    $(document).ready(function() {
        $(document).on('click', '#purchase_delete', function() {
            var current_row = $(this).closest('tr');
            let uid = current_row.find('#uid').val();
            $('#exampleModaldelete').modal('show');
            $('#con-del').attr("href", "{{ route('purchase.delete', ':id') }}".replace(':id', uid));
        });
    });



    $(document).ready(function() {
        $('body').on('click', '#id', function() {
            var urlData = $(this).data('url');
            $.get(urlData, function(data) {
                $('#exampleModalpayment').modal('show');
                $('#id').val(data.id);
                $('#Due_amount').val(data.due_amount);
            });
        });

        //subtotal make payment 
        $(document).on('click', '#make_payment', function() {
            let current_row = $(this).closest('tr');
            $('#due').val(current_row.find('#d_amount').text());
            $('#invoice_id').val(current_row.find('#uid').val());
            $('#exampleModalpayment').modal('show');
        });


        // total make payment
        $(document).on('click', '#totalpay', function() {
            //$('#due').val('{{$totaldue}}');
            let current_row = $(this).closest('tr');
            $('#totaldue').val(current_row.find('#total_due_amount').text());
            $('#invoice_id').val(current_row.find('uid').val());
            $('#exampleModaltotalpayment').modal('show');
        });


        $(document).on('keyup', '#pay_amount', function() {
            let current_row = $(this).closest('tr');
            let pay_amount = $(this).val();
            let due_amount = $('#due').val();
            if (parseFloat(pay_amount) > parseFloat(due_amount)) {
                $('#alert_msg').text('Your pay amount is greater than due amount');
                $('#payment_submit').attr('disabled', true);
            } else {
                $('#alert_msg').text('');
                $('#payment_submit').attr('disabled', false);
            }

        });
        $(document).on('click', '#modal_view', function() {
            let current_row = $(this).closest('tr');
            let invoice_id = current_row.find('#uid').val();
            $.ajax({
                url: "{{ route('purchase.partialmodal') }}",
                method: 'GET',
                data: {
                    invoice_id: invoice_id,
                },
                success: function(res) {
                    $('#ViewModal').html(res);
                    $('#ViewModal').modal('show');
                }
            });
        });
        $(document).on('keyup', '#search', function() {

            let invoicesearch = $(this).val();
            //alert(invoicesearch );
            if (invoicesearch == "") {
                location.reload();
                return;
            }
            $.ajax({
                url: "{{ route('purchase.search') }}",
                method: 'GET',
                data: {
                    invoicesearch: invoicesearch,
                },
                success: function(res) {
                    $('.k_search').html(res);

                }
            });

        });
    });
</script>

@endsection