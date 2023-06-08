@extends('Admin.layouts.dashboard')
@section('content')

<!-- Main content -->
<div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> BengalSoftware, Inc.
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
          Phone: (804) 123-5432<br>
          Email: info@bengalsoftware.com
        </address>
      </div>
      <!-- /.col -->
      {{-- <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{ $name }}</strong><br>
          {{ $address }}<br>
          {{ $phone }}<br>
          {{ $email }}
        </address>
      </div> --}}
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #</b><br>
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
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Serial</th>
            <th>Product Name</th>
            
            <th>Quantity</th>
            <th>Purchase Price</th>
            <th>Description</th>
            {{-- <th>Discount</th> --}}
            {{-- <th>Subtotal</th> --}}
          </tr>
          </thead>
          <tbody>
            {{-- @foreach ($product as $key => $product) --}}
            <tr>
              <td>1</td>
              <td>{{ $product->name }}</td>
             
              <td>{{ $product->stock }}</td>
              <td>{{ $product->purchase_price }}</td>
              <td>{{ $product->description }}</td>
            {{-- <td>{{ $invoice->total_amount }}</td> --}}
            </tr>
              
            {{-- @endforeach --}}
            <tr>
              <th>Discount: 0</th>
              <th> </th>
              <th>Total: {{ $product->purchase_price }}</th>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    {{-- </div> --}}
    <!-- /.row -->

    {{-- <div class="row"> --}}
      
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Payment History</p>
        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}

        <div class="table-responsive">
          <table class="table">

            <th style="width:50%">Payment Date</th>
            <th style="width:50%">Payment Amount</th>
            
            {{-- @foreach ($payments as $payment)
            <tr>
              <td>{{ $payment->created_at }}</td>
              <td>{{ $payment->amount_paid }}</td>
            </tr>
            @endforeach --}}

            {{-- <tr>
              <th>Tax (7.5%)</th>
              <td>{{ ($invoice->total_amount *7.5) / 100}}</td>
            </tr> --}}
            {{-- <tr>
              <th>Due:</th>
              <td>{{($invoice->total_amount)- $totalpayment }}</td>
            </tr> --}}
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
        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>  
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
