@extends('Admin.layouts.dashboard')
@section('titel')
    EMI Sale
@endsection
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>EMI Collection</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">EMI Collection</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <section class="content">
        <div id="successmsg">
            @if (Session::has('msg'))
                <div style="background-color: rgba(5, 145, 98, 0.271)" class="card text-center">
                    <div class="card-body">
                        <p class="card-text">{{ Session::get('msg') }}</p>
                        <button class="btn btn-primary" onclick="closeMsg()">Close</button>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div class="bs-componen">
                        <div class="card"> 
                            <div class="card-body"> 
                                <form action="{{ route('emi.collect.sub') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="control-label col-4"><b>Invoice</b></label>
                                                <div class="col-md-8">
                                                    <select name="emi_id" id="mySelect" class="form-control">
                                                        <option value="">Select Invoice</option>
                                                        @foreach ($invoice as $i )
                                                        <option value="{{$i->id}}">{{$i->invoice}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('emi_id')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Customer</label>
                                                <div class="col-md-8">
                                                    <input type="text" readonly="" name="customer" value="" class="form-control" id="customer" style="font-size: 17px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">EMI Due</label>
                                                <div class="col-md-8">
                                                    <input type="text" readonly="" name="emi_due" value="" class="form-control" id="emi-due" style="font-size: 17px">
                                                </div>
                                            </div>
    
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Per Month EMI</label>
                                                <div class="col-md-8">
                                                    <input type="text" readonly="" name="per_month_emi" value="" class="form-control" id="per-emi" style="font-size: 17px">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Last EMI collection date</label>
                                                <div class="col-md-8">
                                                    <span id="last-emi-collection-date"><input type="text" class="form-control" name="last_date" id="last-date" value="N/A" readonly></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group row">
                                                <label class="control-label col-md-4 pr-0"><b>Date</b></label>
                                                <div class="col-md-8 ">
                                                    <input type="date" name="date" id="dateField" value="2023-06-11" required="" class="form-control dateField" placeholder="Date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4 pr-0"><b>Amount</b></label>
                                                <div class="col-md-8 ">
                                                    <input type="number" name="amount" id="dateField" required="" class="form-control dateField" placeholder="">
                                                </div>
                                                @error('amount')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-4">Payment Method</label>
                                                <div class="col-md-8">
                                                    <select name="payment_method_id" class="form-control select2" aria-hidden="true">
                                                                        <option value="Cash">Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="form-group row">
                                            <div class="col-md-12 mt-4 d-flex justify-content-end">
                                                <button class="btn btn-primary pull-right" type="submit">
                                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // $('#mySelect').select2();
            $(document).on('change', '#mySelect', function() {
                var q = $(this).val();
        // alert(q);
                $.ajax({
                    url: "{{route('emi.invoice.select')}}",
                    method: 'GET',
                    data: {
                        q: q
                    },
                    success: function(res) {
                        if (res != null) {
        
                            // $('.passistant').html(res);
                            jQuery('#customer').val(res.customer);
                            jQuery('#emi-due').val(res.due);
                            jQuery('#per-emi').val(res.emi);

                            
                            var j = jQuery('#last-date').val(res.last); 
                            // alert(j);
                            // jQuery('#due').val(res.price); 
                        }
                    }
                });
            });            
        });
        
        
        </script>

@endsection
