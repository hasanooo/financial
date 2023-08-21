@extends('Admin.layouts.dashboard')

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

            <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-white" style="background-color:#0d5e8b;">
                            <th>Invoice</th>
                            <th>Supplier</th>
                            <th>Date Time</th>
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
                            <td>{{$p->created_at}}</td>
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
                            <td id="d_amount" class="{{$due<0?'text-danger':'text-primary'}}">{{$due}}</td>
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
                                            <a class="btn btn-sm" href="{{route('return.product',$p->id)}}"> <i class="fa-solid fa-pen-to-square"></i> Refund</a>
                                        </li>
                                        @endif


                                    </ul>
                                </div>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr class="text-center">
                            <th>Total</th>
                            <th colspan="2"></th>

                            <th id="sum-result">{{$totalpurchase}}</th>
                            <th id="purchase_paid">{{$totalpaid}}</th>
                            <th id="total_return">{{$totalreturn}}</th>
                            <th id="total_due_amount">{{$totaldue}}</th>
                            <th colspan="2">
                                @if($has_supplier_id)
                                <button type="button" id="totalpay" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModaltotalpayment">
                                    <i class="fa-solid fa-eye"></i>
                                    Make Payment
                                </button>
                                @endif
                            </th>
                        </tr>
                    </tfoot>
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

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        var table = $('#example2').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        var sumResultElement = $('#sum-result'); // Cache the sum display element
        var sumResultDue = $('#total_due_amount');
        var sumPurchasePaid = $('#purchase_paid');
        var sumReturnAmount = $('#total_return');

        function calculateSum() {
            var columnSum = table.column(3, {
                search: 'applied'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
            sumResultElement.text(columnSum);
        }
        
        //Return calculation 
        function calculatePurchasePaid() {
            var columnPurchasePaid = table.column(4, {
                search: 'applied'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
           
            sumPurchasePaid.text(columnPurchasePaid);
        }
        function calculateReturn() {
            var columnReturn = table.column(5, {
                search: 'applied'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
           
            sumReturnAmount.text(columnReturn);
        }
        function calculateDue() {
            var columnDue = table.column(6, {
                search: 'applied'
            }).data().reduce(function(a, b) {
                return parseFloat(a) + parseFloat(b);
            }, 0);
           
            sumResultDue.text(columnDue);
        }
        // Initial sum calculation
        calculateSum();
        calculatePurchasePaid();
        calculateReturn();
        calculateDue();
        // Recalculate the sum every time the table is redrawn (due to search, pagination, etc.)
        table.on('draw.dt', function() {
            calculateSum();
            calculateDue();
            calculatePurchasePaid();
            calculateReturn();
        });
        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

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
        $('#pay_amount').on('input', function() {
            var dueAmount = parseFloat($('#due').val());
            var payAmount = parseFloat($(this).val());

            if (payAmount > dueAmount) {
                $('#alert_msg').text("Pay amount can't be greater than due.");
                $('#payment_submit').prop('disabled', true);
            } else {
                $('#alert_msg').text("");
                $('#payment_submit').prop('disabled', false);
            }
        });
    });
</script>

@endsection