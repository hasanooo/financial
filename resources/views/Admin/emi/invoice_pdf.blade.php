@extends('Admin.layouts.dashboard')
@section('titel')
    EMI Payement Statement
@endsection
@section('content')
<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> Bengal Software, Inc.
          <small class="float-right">{{ date("Y/m/d") }}</small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Admin, BengalSoftware</strong><br>
          Ka-1/1 Bashundhara Road,<br>
          Dhaka 1229, Opposite to jamuna future Park pocket Gate,<br>
          {{-- Phone: (804) 123-5432<br>
          Email: info@almasaeedstudio.com --}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{ $customer->name }}</strong><br>
          {{ $customer->email }}<br>
          {{ $customer->phone }}<br>
          {{ $customer->address }}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #{{ $invoice->invoice }}</b><br>
        <br>
        {{-- <b>Order ID:</b> 4F3S8J<br>
        <b>Payment Due:</b> 2/22/2014<br>
        <b>Account:</b> 968-34567 --}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      {{-- <div class="col-6 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Serial</th>
            <th>Service</th>
            <th>Price</th> --}}
            {{-- <th>Discount</th> --}}
            {{-- <th>Subtotal</th> --}}
          {{-- </tr>
          </thead>
          <tbody>
            @foreach ($services as $key => $services)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $services->service_name }}</td>
              <td>{{ $services->sell_price }}</td> --}}
            {{-- <td>{{ $invoice->total_amount }}</td> --}}
            {{-- </tr>
              
            @endforeach
            <tr>
              <th>Discount: {{ $invoice->discount_amount }}</th>
              <th> </th>
              <th>Total: {{ $invoice->total_amount }}</th>
            </tr>
          </tbody>
        </table> --}}
      {{-- </div> --}}
      <!-- /.col -->
    {{-- </div> --}}
    <!-- /.row -->

    {{-- <div class="row"> --}}
      
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Payment Statements</p>
        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

        <div class="table-responsive">
          <table class="table">

            <th style="width:50%">Payment Date</th>
            <th style="width:50%">Payment Amount</th>
            
            @foreach ($payments as $payment)
            <tr>
              <td>{{ $payment->created_at }}</td>
              <td>{{ $payment->amount_paid }}</td>
            </tr>
            @endforeach

            {{-- <tr>
              <th>Tax (7.5%)</th>
              <td>{{ ($invoice->total_amount *7.5) / 100}}</td>
            </tr> --}}
            <tr>
              <th>Due:</th>
              <td>{{($total)- $totalpayment }}</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->

      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <h3>Cash</h3>

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
          plugg
          dopplr jibjab.
        </p>
      </div>

    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        {{-- <a href="javascript:window.print()" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
        {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
          Payment
        </button> --}}
        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
        {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
          <i class="fas fa-download"></i> Generate PDF
        </button> --}}
      </div>
    </div>
  </div>

  <script>
    window.addEventListener("load",window.print());
    // window.onafterprint = function() {
    // history.back();
    // };
  </script>

@endsection
