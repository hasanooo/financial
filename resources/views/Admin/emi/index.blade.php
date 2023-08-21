@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>EMI Sale List <span style="font-size: 12px;color:rgb(75, 95, 75)"> View EMI
                        Information</span></h3>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end"> 
                    
                    <a class="btn btn-success" href="{{ route('emi.sale.index') }}">Add new EMI sale</a>

                </div>

            </div>
            <div class="table-responsive">
            <table id="example2" class="table table-bordered table-striped my-3 k">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Discount</th>
                        <th>Payable Amount</th>
                        <th>Paid Amount</th>
                        {{-- <th>Due</th> --}}
                        {{-- <th>EMI Due</th> --}}
                        <th>EMI Rate</th>
                        <th>EMI Quantity</th>
                        <th>Due with EMI</th>
                        <th>Per EMI Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                        @php
                        $totalpayable = 0;
                        $totalpaid=0;
                        $totaldue=0;
                        @endphp
                <tbody>
                    @foreach($emi as $i=>$item)
                    <tr>
                        {{csrf_field()}}
                        <td>{{$i+1}}</td>
                        <td>{{ $item->invoice }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->Customer->name }}</td>
                        <td>{{ $item->discount }}</td>
                        <td>{{ $item->total_price }}</td>
                        @php
                        $return = 0;
                        $payable = $item->total_price;
                        $totalpayable += $payable;
                        // $paid = $p->purchase_invoice_purchase_payment->pluck('amount_paid')->sum();
                        // $totalpaid += $paid;
                        @endphp
                        <td>{{ $item->paid_amount }}</td>
                        @php
                        $return = 0;
                        $paid = $item->paid_amount;
                        $totalpaid += $paid;
                        @endphp
                        <td>{{ $item->emi_rate }}</td>
                        <td>{{ $item->emi_quantity }}</td>
                        {{-- @php
                            $emidue = $item->Selling->pluck('amount_paid')->sum();
                        @endphp --}}
                        <td>{{ $item->with_profit }}</td>
                        @php
                        $return = 0;
                        $due = $item->with_profit;
                        $totaldue += $due;
                        @endphp
                        <td>{{ $item->emi_amount }}</td>
                        
                        <td>


                            <a href="{{ route('customer.update.page', $item->id) }}" data-url="" id="id">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="{{ route('print.report', $item->id) }}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-sharp fa-solid fa-print"></i>
                                </button>
                            </a>
                       
                        </td>
                    </tr>
                    @endforeach

                   
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <th>Total</th>
                        <th colspan="4"></th>
                        <th id="sum-result">{{$totalpayable}}</th>
                        <th id="purchase_paid">{{$totalpaid}}</th>
                        <th colspan="2"></th>
                        <th id="total_due_amount">{{$totaldue}}</th>
                        <th colspan="2"></th>
                    </tr>
                </tfoot>
            </table>

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
var sumResultElement = $('#sum-result'); 
var sumResultDue = $('#total_due_amount');
var sumPurchasePaid = $('#purchase_paid');

function calculateSum() {
    var columnSum = table.column(5, {
        search: 'applied'
    }).data().reduce(function(a, b) {
        return parseFloat(a) + parseFloat(b);
    }, 0);
    sumResultElement.text(columnSum);
}

//Return calculation 
function calculatePurchasePaid() {
    var columnPurchasePaid = table.column(6, {
        search: 'applied'
    }).data().reduce(function(a, b) {
        return parseFloat(a) + parseFloat(b);
    }, 0);
   
    sumPurchasePaid.text(columnPurchasePaid);
}

function calculateDue() {
    var columnDue = table.column(9, {
        search: 'applied'
    }).data().reduce(function(a, b) {
        return parseFloat(a) + parseFloat(b);
    }, 0);
   
    sumResultDue.text(columnDue);
}
// Initial sum calculation
calculateSum();
calculatePurchasePaid();
calculateDue();
// Recalculate the sum every time the table is redrawn (due to search, pagination, etc.)
table.on('draw.dt', function() {
    calculateSum();
    calculateDue();
    calculatePurchasePaid();
});
table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

});
</script>


@endsection