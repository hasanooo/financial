@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size:27px; font-weight:23px;">Product Reports</span> <small style="color:gray;"> Manage your
                    products reports</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-md-6">
                    <span>All Product Reports</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    {{-- <a class="btn btn-primary" href="{{route('product.create')}}">
                        <i class="fa-solid fa-plus"></i> Add
                    </a> --}}
                   

                </div>
            </div>
            <div class="row">


                <div class="col-12 my-1">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-0" placeholder="Product name/SKU.." id="search">
                        <span class="input-group-text rounded-0"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>

                   </div>
            </div>
           
            <div class="card  table-responsive my-3">
                <div class="card-body">
                    <table class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                <th>SL</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Category</th>
                                <th>price</th>
                                <th>Status</th>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $i=>$item)
                            <tr class="text-center">
                                <td>
                                    {{-- <input type="hidden" value="{{$item->id}}" id="uid"> --}}
                                    {{$i+1}}
                                </td>
                                {{--src="{{$item->image==null?'Product/Image/defaultimage.png':'Product/Image/'.$item->image}}"--}}
                                <td><img style="width:40px;" src="{{$item->image==null?'/Product/Image/defaultimage.png':'/Product/Image/'.$item->image}}"  alt=""></td>
                                <td>{{$item -> name}}</td>
                                <td>{{$item->product_category_id}}</td>
                                <td>{{$item->purchase_price}}</td>
                                <td>{{$item->status}}</td>
                              


                                

                                <td>
                                    <a href="{{ route('product.view', $item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-print"></i>
                                        </a>
                                </td>
                            </tr>
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>

            
            
            
            
            <div class="pagination d-flex justify-content-end">
            
            </div>
        </div>
    </div>
</div>

@endsection