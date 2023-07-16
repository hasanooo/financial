@extends('Admin.layouts.dashboard')

@section('content')

<div class="section my-5">
    <div class="container">
       
        <div class="row">
            <!-- main-big image show -->
            <div class="col-md-6 col-sm-12">
                <div class="img-magnifier-container my-4" style="border:1px solid lightgray;">
                    <img style="width:70%;height:350px;  object-fit:fill" src="{{asset('Product/Image/'.$product->image)}}" alt="...." class=" img-fluid mx-auto d-block" id="image">
                    
                </div>
              
            </div>

            <!-- right side content  -->
            <div class="col-md-6 col-sm-12 mt-3">
                <h5 class="text-primary">{{$product->name}}</h5>
                
                <hr>
                <div>
                    <div class="d-flex justify-content-between mb-4 bg-light">
                        <h3> Open Stock</h3>
                        <input type="hidden" value="{{$product->id}}" id="pro_id">
                        
                    </div>

                </div>
               
                
                <div class="row">
                    <table class="table col-md-12 table-striped table-condensed table-bordered">
                        <thead>
                            <tr class="bg-blue text-center">
                                <th>Variation</th>
                                <th>Quantity</th>
                                <th>PurchaseUnit Cost</th>
                                <th>total</th>
                                

                            </tr>
                        </thead>
                            <tr class="text-center">
                                @php
                                    $total=0;
                                    $total=($product->purchase_price)*($product->stock)

                                @endphp
                              <td>Single</td>
                              <td>{{$product->stock}}</td>
                              <td>{{$product->purchase_price}}</td>
                              <td>{{$total}}</td>
                            </tr>
                              
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <strong>Total in Stock: </strong> <strong id="total_stock"></strong> 
                                    </div>
                                </td>
                                <td>
                                    <strong class="stock">{{$product->stock}}</strong>
                                </td>
                            </tr>
                        <tbody>
                            

                        </tbody>

                    </table>
                </div>
                
              
            </div>
            <!-- right side content End  -->
        </div>
    </div>
</div>



@endsection