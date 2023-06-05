@extends('Admin.layouts.dashboard')
@section('titel')
    Add new product
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
                    <h1>Add new product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add new product</li>
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

                <div class="card-body">

                    @include('Admin.components.errormessage')

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="category">Supplier*</label>
                                <select name="category" id="category" class="form-control">
                                    <option>Please Select</option>
                                    {{-- @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach --}}
                                </select>
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="name">Product Name*</label>
                                <input type="text" class="form-control" id="name" value="{{ old('name') }}"
                                    name="name" placeholder="name">
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="name">Product Quantity*</label>
                                <input type="number" class="form-control" id="name" value="{{ old('name') }}"
                                    name="qty" placeholder="Quantity">
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="category">Category*</label>
                                <select name="category" id="category" class="form-control">
                                    <option>Please Select</option>
                                    {{-- @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach --}}
                                </select>
                            </div>

                            <div class="form-group col-md-4 col-sm-12">
                                <label for="image">Primary Image*</label>
                                <input accept="image/*" value="{{ old('image') }}" type="file" class="form-control"
                                    id="image" name="image">
                            </div>
                            <div class="form-group col-md-4 col-sm-12">
                                <label for="name">Product Purchase Price*</label>
                                <input type="text" class="form-control" id="name" value="{{ old('name') }}"
                                    name="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-row">
                            {{-- <div class="form-group col-md-4 col-sm-12"> --}}
                                <label for="category">Status*</label>
                                <select name="category" id="category" class="form-control">
                                    <option>Please Select</option>
                                    {{-- @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach --}}
                                </select>
                            {{-- </div> --}}

                            
                        </div>
                        <div class="form-row">




                            <div class="form-group col-md-12 col-sm-12">
                                <label for="exampleFormControlTextarea1">Product Description</label>
                                <textarea class="form-control" name="des" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row alert-success">





                        </div>


                        <input type="submit" style="float:right;" value="Submit" class="btn btn-primary mt-4 pr-4 pl-4" />
                </div>




                </form>
            </div>
        </div>
        </div>
    </section>
@endsection
