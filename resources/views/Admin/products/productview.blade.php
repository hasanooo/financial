@extends('Admin.layouts.dashboard')

@section('content')

<div class="section my-5">
    <div class="container">
       
        <div class="row">
            <!-- main-big image show -->
            <div class="col-md-6 col-sm-12">
                <div class="img-magnifier-container my-4" style="border:1px solid lightgray;">
                    <img style="width:70%;height:450px;  object-fit:fill" src="{{asset('Product/Image/'.$product->image)}}" alt="...." class=" img-fluid mx-auto d-block" id="image">
                    
                </div>
              
            </div>

            <!-- right side content  -->
            <div class="col-md-6 col-sm-12 mt-3">
                <h5 class="text-primary">{{$product->name}}</h5>
                <span class="text-info">Status: </span><span class="">{{$product->status}}</span>
                <div>

                    <p class="text-muted">{{$product->description}}</p>
                    <p> <strong>Category:</strong> <span>{{$product->category->name}}</span></p>
                    
                </div>
                <hr>
                <div>
                    <div class="d-flex justify-content-between mb-4 bg-light">
                        <h3>Product Price</h3>
                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                        <button id="mprice" class="btn btn-sm btn-primary">Manage price</button>
                    </div>

                </div>
               
                
                <div class="row">
                    <div class="col-3">
                        <label>Product Type: </label>

                        <div class="">
                            <i class="fa-solid fa-calendar-week"></i>
                            <span>Single</span>
                        </div>


                    </div>
                    <div class="col-3">
                        <label>Price</label>
                       
                        <div class="">
                            <i class="fa-solid fa-money-bill"></i>
                            <span>{{$product->selling_price}}TK</span>
                        </div>
                   
                    </div>

                    <div class="col-3">
                        <label>Tax</label>
                        
                        <div class="">
                            <i class="fa-brands fa-shopify"></i>
                            <span>%</span>
                        </div>
                       
                    </div>
                    <div class="col-3">
                        <label>Margin</label>
                        
                        @php
                          $margin=0;
                          $margin= ($product->selling_price) - ($product->purchase_price)
                          
                        @endphp

                        <div class="">
                            <i class="fa-solid fa-thumbtack"></i>
                            <span>{{$margin}} TK</span>
                        </div>
                       
                    </div>
                </div>
                <div class="row bg-light my-4 ">
                    <div class="col-6">
                        
                        <div class="">
                            <label for="">Final amount: <span>
                            {{$product->selling_price}} TK</span></label>

                                    

                        </div>

                    </div>

                </div>
              
            </div>
            <!-- right side content End  -->
        </div>
    </div>
</div>



@endsection