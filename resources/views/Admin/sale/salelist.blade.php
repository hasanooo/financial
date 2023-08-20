@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <span style="font-size:27px; font-weight:23px;">Sale list</span> <small style="color:gray;"> Manage sale
                    list</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">

                <div class="col-12 d-flex justify-content-end">

                    <a href="{{route('sale.form')}}"><button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Add
                        </button></a>


                </div>

                <!-- View Modal Start -->

                <div class="modal fade" id="ViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content rounded-0">

                        </div>
                    </div>
                </div>
                <!-- View Modal End -->


                <!--Delete modal -->
                <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                <h5 class="text-danger">Are you sure to remove this sale info?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" id="con-del" href="">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End -->

                <!-- View Modal payment -->
                <div class="modal fade" id="addpayment" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content rounded-0">
                            <div class="modal-body" id="pay">
                                <form action="" method="POST" class="row g-3">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row mt-4">

                                                <div class="col-md-12">
                                                    <div class="container">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4 col-sm-12">
                                                                <input type="hidden" name="hh" id="temp">
                                                                <label for="">Amount:*</label>
                                                                <input type="text" class="form-control atat" class="amountintotal" id="adci" name="amount" placeholder="0.00">

                                                            </div>

                                                            <div class="form-group col-md-4 col-sm-12">

                                                                <label for="">Payment Method:*</label>
                                                                <select name="paymethod" id="" class="form-control">
                                                                    <option value="">Please Select</option>
                                                                    <option value="cash">Cash</option>
                                                                    <option value="bhash">bkash</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-4 col-sm-12">

                                                                <label for="">Payment Account:</label>
                                                                <select name="payacc" id="" class="form-control">
                                                                    <option value="">Please Select</option>

                                                                    <option value="oncash">Cash</option>

                                                                </select>
                                                            </div>



                                                        </div>
                                                        <div class="form-row">

                                                            <div class="col-md-12 col-sm-12">
                                                                <div class="row" style="flex-direction: column">
                                                                    <div class="col-md-3 d-flex align-items-center">
                                                                        Payment Note </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-floating">
                                                                            <textarea class="form-control" name="paynote" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                                            <label for="floatingTextarea">Payment
                                                                                Note</label>
                                                                        </div>

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


                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>

                            {{-- </div>end --}}
                        </div>
                    </div>
                </div>

            </div>
           


            <div class=" table-responsive my-3">
                <div class="card-body">
                    <table id="example2" class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>Date</th> --}}
                                <th>Invoice</th>
                                <th>Customer name</th>
                                <th>Total amount</th>
                                {{-- <th>Total Discount</th> --}}
                                <th>Total paid</th>
                                <th>Return Amount</th>
                                <th>Payment due</th>
                                <th>Payment status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($invoice as $y)
                            <tr class="text-center">

                                <td>
                                    <a href="javascript:void(0)" data-url="{{route('sale.view',$y->id)}}" id="p_id">
                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ViewModal">
                                            <i></i> {{ $y->invoice }}
                                        </button>
                                    </a>
                                </td>
                                <td>

                                    {{ $y->invoice_customer->name }} </span>
                                    {{-- @endif --}}
                                </td>
                                @php
                                $t = $y->total_amount;
                                @endphp
                                <td>{{ $t }}</td>
                                <td>
                                    @php
                                    $total_paid = 0;
                                    foreach ($y->invoice_payment as $i) {
                                    $total_paid = $total_paid + $i->amount_paid;
                                    }
                                    @endphp
                                    {{ $total_paid }}
                                </td>
                                @php
                                // $return = 0;
                                $total_paid = $y->invoice_payment->pluck('amount_paid')->sum();
                                // if ($y->sale_invoice_sale_return != null) {
                                // $return = $y->sale_invoice_sale_return->pluck('return_price')->sum();
                                // }
                                $covertint=(int)$t;
                                $paid =$covertint - $total_paid ;

                                @endphp
                                <td>0</td>
                                <td>{{ $paid }}</td>
                                <td>
                                    @if ($paid == 0)
                                    <span class="badge badge-success">Paid</span>
                                    @elseif ($paid == $t)
                                    <span class="badge badge-danger">Due</span>
                                    @else
                                    <span class="badge badge-warning">Partial Paid</span>
                                    @endif
                                </td>


                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg></button>

                                        <ul class="dropdown-menu text-left px-3 " role="menu" aria-labelledby="menu1">

                                            <li role="presentation"><a role="menuitem" href="{{route('sale.edit.form',$y->id)}}" class="btn"><i class="fa-solid fa-pen-to-square"></i>
                                                    Edit</a></li>

                                            <li role="presentation">
                                                <a class="btn" href="{{route('sell.track')}}">
                                                    <i class="fa-solid fa-eye"></i>
                                                    Order Track</a>
                                            </li>

                                            <li role="presentation"><button type="button" class="btn" id="sale_delete">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button></li>


                                            <li role="presentation">
                                                {{-- @if ($paid > 0.0)
                                                            <button type="button" id="addpay" class="btn"
                                                                data-bs-toggle="modal" data-bs-target="#addpayment"> <i
                                                                    class="fa-solid fa-eye"></i>
                                                                Add Payment</button>
                                                        @endif --}}

                                            </li>

                                            <li role="presentation"><a role="menuitem" href="{{ route('salereturn', $y->id) }}" class="btn"><i class="fa-solid fa-pen-to-square"></i>
                                                    Sale Return</a></li>

                                            {{-- @if ($y->sale_invoice_sale_return->count() > 0) --}}
                                            <li role="presentation">
                                                <a class="btn" role="menuitem" href=""> <i class="fa-solid fa-pen-to-square"></i> Refund</a>
                                            </li>
                                            {{-- @endif --}}



                                        </ul>
                                    </div>
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

<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        });
        $('body').on('click', '#p_id', function() {
            var urlData = $(this).data('url');
            $.get(urlData, function(data) {

                //alert(urlData);



                $('#ViewModal').modal('show');
                $('.modal-content ').html(data);


            });
        });

        $(document).on('click', '#addpay', function() {
            var current_row = $(this).closest('tr');
            let uid = current_row.find('#idu').val();
            $('#temp').val(uid);


        })
        $(document).on('click', '#modalclose', function() {
            location.reload(true);


        })
        $(document).on('click', '#payclose', function() {
            location.reload(true);


        })
        $(document).on('keyup', '#search', function() {

            let invoicesearch = $(this).val();
            //alert(invoicesearch );
            if (invoicesearch == "") {
                location.reload();
                return;
            }
            $.ajax({
                url: "",
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



    function printPage() {
        // Get the modal
        var modal = document.getElementById("ViewModal");

        // Get the part you want to print
        var printableContent = document.getElementById("invoice_view");

        // Create a new hidden iframe element and add it to the document
        var iframe = document.createElement("iframe");
        iframe.style.display = "none";
        document.body.appendChild(iframe);

        // Get the document object of the iframe and write the printable content
        var doc = iframe.contentWindow.document;
        doc.open();
        doc.write(printableContent.outerHTML);
        doc.close();

        // Open the modal
        modal.style.display = "block";

        // Hide the non-printable content
        modal.style.overflow = "hidden";
        modal.style.height = printableContent.offsetHeight + "px";

        // Print the content of the iframe
        iframe.contentWindow.focus();
        iframe.contentWindow.print();

        // Show the non-printable content again
        modal.style.overflow = "auto";
        modal.style.height = "auto";

        // Close the modal
        modal.style.display = "none";

        // Remove the iframe from the document
        document.body.removeChild(iframe);
    }
</script>
@endsection