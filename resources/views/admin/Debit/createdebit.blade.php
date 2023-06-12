@extends('Admin.layouts.dashboard')
@section('titel')
Debit Create
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
                <h1>Create Debit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active">Create Debit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{ route('dabit.create.submit') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="" class="form-label">Category:*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-list"></i></span>
                                    </div>
                                    <select id="" name="d_category_id" class="form-control rounded-0" style="background-color:whitesmoke;">
                                        <option value="">Please Select Debit Category</option>
                                        @foreach ($d_category as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach 
                                    </select>
                                </div>
                                @error('d_category_id')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>
                        
                    </div>

                    <div class="form-row">

                        <div class="col-6">
                            <label for="" class="form-label">Prticular Details:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                                <input type="text" name="particuler" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                        
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Cash:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                                <input type="number" name="cash" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                            @error('cash')
                                <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit"  value="Save"
                            class="btn btn-primary mt-4 pr-4 pl-4" />
                        </div>
                    
                    </div>

                    
                </form>



            </div>
        </div>
    </div>
</section>


@endsection