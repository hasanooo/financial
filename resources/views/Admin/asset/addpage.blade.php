@extends('Admin.layouts.dashboard')
@section('titel')
Add new asset
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
                <h1>Add Asset</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Add Asset</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{ route('asset.submit') }}" method="POST">
                    @csrf
                    <!--First Row -->
                    <div class="form-row">
                            

                            <div class="col-6">
                                <label for="" class="form-label">Date:*</label>
                                <div class="input-group">
                        
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <input type="date" name="date" class="form-control" style="background-color:whitesmoke;" id="" value="">
                                </div>
                                @error('date')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                               
                            </div>

                            <div class="col-6">
                                <label for="" class="form-label">Asset Category:*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select id="" name="category" class="form-control rounded-0" style="background-color:whitesmoke;">
                                        <option disabled selected value="">Select Asset Category</option>
                                        <option value="current">Current Asset</option>
                                        <option value="long">Long-Term Asset</option>
                                    </select>
                                </div>
                                @error('d_category_id')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>
                        
                    </div>

                    <div class="form-row">

                        <div class="col-6">
                            <label for="" class="form-label">Asset Name:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                        
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Amount:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                                <input type="number" name="amount" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                            @error('cash')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        
                        </div>
                        <div class="col-12">
                            <label for="" class="form-label">Details:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                                <input type="text" name="details" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                            @error('cash')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        
                        </div>
                    </div>

                    <div class="row mt-1">
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit"  value="Save Asset"
                            class="btn btn-primary mt-4 pr-4 pl-4" />
                        </div>
                    
                    </div>

                    
                </form>



            </div>
        </div>
    </div>
</section>

@endsection