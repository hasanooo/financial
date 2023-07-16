@extends('Admin.layouts.dashboard')
@section('titel')
Add new OPEX
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add new OPEX</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add new OPEX</li>
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

                <form action="" method="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="name">Date*</label>
                            <input type="date" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="category">Department*</label>
                            <select name="category" id="category" class="form-control  @error('category') is-invalid @enderror">
                                <option>Please Select Deparment</option>
                                
                                    <option value="">Department 1</option>
                                    <option value="">Department 2</option>
                                    <option value="">Department 3</option>
                                
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="category">OPEX Category*</label>
                            <select name="category" id="category" class="form-control  @error('category') is-invalid @enderror">
                                <option>Please Select Category</option>
                                
                                    <option value="">Category 1</option>
                                    <option value="">Category 2</option>
                                    <option value="">Category 3</option>
                                
                            </select>
                            @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="sellingPrice">Amount*</label>
                            <input type="number" class="form-control" id="sellingPrice" value="{{ old('sellingPrice') }}" name="sellingPrice" placeholder="Selling Price">
                        </div>
                        
                    </div>

                    

                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="description">OPEX Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row alert-success"></div>

                    <input type="submit" style="float:right;" value="Add OPEX" class="btn btn-primary mt-4 pr-4 pl-4" />
                </form>
            </div>
        </div>
    </div>
</section>

@endsection