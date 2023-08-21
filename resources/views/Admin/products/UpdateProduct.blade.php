@extends('Admin.layouts.dashboard')
@section('titel')
Update Product
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->`
<section class="content-header mt-3">
    <div class="container-fluid">
        <div class="row mb-2">`
            <div class="col-sm-6">
                <h1>Update Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Product</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">

            <div class="card-body">

                <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="name">Product Name*</label>
                            <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="category">Category*</label>
                            <select name="category" id="category" class="form-control  @error('category') is-invalid @enderror">
                                <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                @foreach ($productcategory as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="purchasePrice">Product Purchase Price*</label>
                            <input type="text" class="form-control" id="purchasePrice" value="{{ $product->purchase_price}}" name="purchasePrice" placeholder="Purchase Price">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="sellingPrice">Product Selling Price*</label>
                            <input type="text" class="form-control" id="sellingPrice" value="{{ $product->selling_price}}" name="sellingPrice" placeholder="Selling Price">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="status">Status*</label>
                            <select name="status" id="status" class="form-control">
                                <option value="{{$product->status}}">{{$product->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="tax">Tax*</label>
                            <select name="tax" id="tax" class="form-control @error('tax') is-invalid @enderror">
                            <option>{{ $product->product_tax->name ?? '' }}</option>

                                @foreach ($tax as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }} - {{ $item->percentage }}%</option>
                                @endforeach
                            </select>
                            @error('tax')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="image">Primary Image*</label>
                                <div class="input-group">
                                  <input type="file" class="form-control" name="image" id="">
                              </div>
                              <div class="row mt-2">
                                <img src="/Product/Image/{{$product->image}}" style="width:100px; height:100px;">
                              </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="description">Product Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{$product->description}}</textarea>
                        </div>
                    </div>

                    <div class="row alert-success"></div>

                    <input type="submit" style="float:right;" value="Submit" class="btn btn-primary mt-4 pr-4 pl-4" />
                </form>
            </div>
        </div>
    </div>
</section>

@endsection