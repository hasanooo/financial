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
                    <h1>EMI Sale</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">EMI Sale</li>
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
            <div class="col-12">

                 <!--add Modal -->
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                 <div class="modal-dialog modal-xl">
                     <div class="modal-content rounded-0">
                         <div class="modal-header">
                             <p class="modal-title" id="exampleModalLabel">Add a new contact</p>
                             <button type="button" class="btn-close" data-bs-dismiss="modal"
                                 aria-label="Close"></button>
                         </div>
                         <div class="modal-body ">
                             <form action="{{route('customer.add')}}" method="post"
                                 enctype="multipart/form-data" id="create-post-form" class="row g-3">
                                 {{@csrf_field()}}
                                 <div class="row">
                                    
                                     <div class="col-4">
                                         <label for="name" class="form-label">Name:*</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-user"></i></span>
                                             </div>
                                             <input type="text" name="name" class="form-control rounded-0" value="{{old('name')}}" placeholder="Name" id="supplier_name">
                                         </div>
                                         @error('name')
                                             <span class="text-danger">{{$message}}</span>
                                         @enderror
                                     </div>

                                     <div class="col-4">
                                         <label for="businessname" class="form-label">Email:</label>
                                         
                                         <div class="input-group">
                                 
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                             </div>
                                             <input type="email" name="email" class="form-control rounded-0"
                                                 value="" placeholder="Enter valid email">
                                                 
                                         </div>
                                         @error('business_name')
                                             <span class="text-danger">{{$message}}</span>
                                         @enderror
                                     </div>
                                     
                                     <div class="col-4">
                                         <label for="" class="form-label">Phone:</label>
                                         <div class="input-group">
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                             </div>
                                             <input type="number" name="phone" class="form-control rounded-0 " value="{{old('contact_id')}}" placeholder="Contact ID." id="c_id">
                                         </div>
                                         @error('contact_id')
                                             <span class="text-danger">{{$message}}</span><br>
                                         @enderror  
                                     </div>
                                 </div>
                                 
                                 <div class="row mt-4">
                                     <div class="col-3">
                                         <label for="" class="form-label">City:</label>
                                         <div class="input-group">
                                         
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                             </div>
                                             <input type="text" name="city" class="form-control rounded-0"
                                                 value="" placeholder="City">
                                               
                                         </div>
                                         @error('email')
                                             <span class="text-danger">{{$message}}</span><br>
                                         @enderror
                                     </div>

                                     <div class="col-3">
                                         <label for="" class="form-label">Address:*</label>

                                         <div class="input-group">
                                         
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                             </div>
                                             <input type="text-area" name="address" class="form-control rounded-0"
                                                 value="" placeholder="address">
                                                
                                         </div>
                                         @error('mobile')
                                              <span class="text-danger">{{$message}}</span><br>
                                         @enderror
                                     </div>

                                     <div class="col-3">
                                         <label for="" class="form-label">Opening Balance</label>

                                         <div class="input-group">
                                         
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                             </div>
                                             <input type="number" name="opening_balance"
                                                 class="form-control rounded-0" value="0"
                                                 placeholder="" min="0">
                                                 
                                                  
                                         </div>
                                        
                                     </div>

                                     <div class="col-3">
                                         <label for="" class="form-label">Credit Limit:</label>
                                         
                                         <div class="input-group">
                                         
                                             <div class="input-group-prepend">
                                                 <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                             </div>
                                             <input type="number" name="credit_limit" class="form-control rounded-0"
                                                 id="" placeholder="" value="10000" min="0">
                                                 
                                         </div>
                                     </div>

                                 </div>



                                 <div class="modal-footer">
                                     <button type="submit" class="btn btn-success rounded-1">Save</button>
                                     <button type="button" class="btn btn-danger rounded-0"
                                         data-bs-dismiss="modal">Close</button>
                                 </div>
                             </form>
                         </div>

                     </div>
                 </div>
             </div>

                <div class="card-body">

                    @include('Admin.components.errormessage')

                    <form action="{{ route('sale.emi.sub') }}" method="post"
                                        enctype="multipart/form-data" id="create-post-form" class="row g-4 col-12">
                                        {{@csrf_field()}}
                                        <div class="row">

                                            <div class="col-8 row">
                                           
                                                <div class="col-md-6">
                                                    <label>Customer:</label>
                                                    <div class="input-group mb-3">
                                                        <a class="input-group-text btn bg-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Add</a>
                                                        <select name="customer" id="mySelectD" class="form-control">
                                                            {{-- <option value="0" selected>Walking Customer</option> --}}
                                                            @foreach ($customer as $c )
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                      </div>
                                                  </div>
                                                  
                                                  <div class="col-md-6 justify-content-end">
                                                    <label>Date:</label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" type="date" name="date">
                                                      </div>
                                                  </div>

                                                    <table class="col-12">
                                                        <thead>
                                                          <tr class="col-8">
                                                            <th class="text-center">Product</th>
                                                            {{-- <th class="text-center">Purchase Price</th> --}}
                                                            <th class="text-center">Quantity</th>                  
                                                            <th class="text-center">Price</th>
                                                            <th class="text-center">Tax</th>
                                                            <th class="text-center">Subtotal</th>
                                                          </tr>
                                                        </thead>
                                                        <tbody class="passistant">
                                                            <tr>
                                                                <td class="text-center">
                                                                    <select name="product" id="mySelect" class="form-control">
                                                                    <option value="0">Select Product</option>
                                                                    @foreach ($product as $p )
                                                                    <option value="{{$p->id}}">{{$p->name}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </td>  
                                                                <td class="text-center"><input type="number" value="1" class="text-center form-control" name="quantity" id="qnt" min="1"></td>
                                                                <td class="text-center"><input type="number" value="0" class="text-center form-control" name="price" id="price" readonly></td>
                                                                <td class="text-center"><input type="number" value="0" class="text-center form-control" name="tax" id="tax" readonly></td>
                                                                <td class="text-center"><input type="number" value="0" class="text-center form-control" name="total" id="total" readonly></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div class="modal-footer">
                                                        <button type="submit" id="buttonp" class="btn btn-success rounded-1" disabled>Save Payment</button>
                                                    </div>
                                            </div>

                                            <div class="col-4 row">

                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Discount</span>
                                                        </div>
                                                        <input type="number" name="discount" id="discount" class="form-control rounded-1"
                                                            value="0">
                                                          
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Payable Amount</span>
                                                        </div>
                                                        <input type="number" id="payable_amount" name="payable_amount" class="form-control rounded-1"
                                                            value="0" readonly>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Receive Amount</i></span>
                                                        </div>
                                                        <input type="text" id="receive_amount" name="receive_amount" class="form-control rounded-1"
                                                            value="0">   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Due Amount</i></span>
                                                        </div>
                                                        <input type="number" id="due" name="due" class="form-control rounded-1"
                                                            value="0" readonly>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">EMI Rate</span>
                                                        </div>
                                                        <input type="number" name="emi_rate" class="form-control rounded-1"
                                                            value="0" id="emi_rate" min="0">   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Duration</span>
                                                        </div>
                                                        <input type="text" name="duration" class="form-control rounded-1"
                                                            value="Monthly" readonly>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">EMI Quantity</span>
                                                        </div>
                                                        <input type="number" id="emi_quantity" name="emi_quantity" class="form-control rounded-1"
                                                            value="0" min="0">   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                   
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Sub Total</span>
                                                        </div>
                                                        <input type="text" id="emi_total" name="emi_total" class="form-control rounded-1"
                                                            value="0" readonly>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                   
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">EMI Amount</span>
                                                        </div>
                                                        <input type="text" id="emi_amount" name="emi_amount" class="form-control rounded-1"
                                                            value="0" readonly>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Type</span>
                                                        </div>
                                                        <select class="form-select" name="type" id="type">
                                                            <option value="1">Cash</option>
                                                            <option value="2">Bank</option>
                                                        </select>   
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    
                                                    <div class="input-group">
                                                    
                                                        <div class="input-group-prepend col-6">
                                                            <span class="input-group-text col-12">Bank</span>
                                                        </div>
                                                        <input type="text" id="bank" name="bank" class="form-control rounded-1"
                                                            value="" placeholder="No Bank Available">   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
                    url: "{{route('sale.emi.select')}}",
                    method: 'GET',
                    data: {
                        q: q
                    },
                    success: function(res) {
                        if (res != null) {
        
                            // $('.passistant').html(res);
                            jQuery('#price').val(res.price);
                            jQuery('#total').val(res.price);
                            jQuery('#payable_amount').val(res.price); 


                            
                            // var sum = sell_price - discount_cost;
                            // var sum = 0;
    
                            $('#discount').on('change', function() {
                                var discount_cost = parseFloat($(this).val());
                                var sell_price = parseFloat($('#price').val());
                                var sum = sell_price - discount_cost;
                                $('#total').val(sum);
                                $('#payable_amount').val(sum);
                                $('#due').val(sum);
                                // jQuery('#pay_amount').val(sum);
                            });

                            jQuery('#total').val(sum);
                            $('#payable_amount').val(sum); 
                        }
                    }
                });
            });

            $('#receive_amount').on('change', function() {
                                var receive = parseFloat($(this).val());
                                var p_price = parseFloat($('#payable_amount').val());
                                var sum_due = p_price - receive;
                                $('#due').val(sum_due);
                            });

                            $('#emi_quantity').on('change', function() {
                                var qnt = parseInt($(this).val());

                                // alert(qnt);
                                var due = parseFloat($('#due').val());
                                // alert(due);
                                var rate = parseFloat($('#emi_rate').val());
                                var per = (due*rate)/100;
                                var due_sum = due + per;
                                var amount =(due_sum / qnt);
                                $('#emi_amount').val(amount);
                                $('#emi_total').val(due_sum);

                                buttonp.removeAttribute('disabled');
                            });

        });
        
        
        </script>

@endsection
