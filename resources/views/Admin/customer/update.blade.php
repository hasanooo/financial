@extends('Admin.layouts.dashboard')
@section('titel')
Update Customer
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Customer</li>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body">

                    @include('Admin.components.errormessage')

                    <form action="{{route('customer.update',$customer->id)}}" method="post" enctype="multipart/form-data" id="create-post-form" class="row g-3">
                        {{@csrf_field()}}
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="name" class="form-control rounded-0" value="{{$customer->name}}" placeholder="Name" id="supplier_name">
                            </div>
                            @error('name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="businessname" class="form-label">Email:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control rounded-0" value="{{$customer->email}}" placeholder="Enter valid email">
                            </div>
                            @error('business_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="" class="form-label">Phone:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                </div>
                                <input type="number" name="phone" class="form-control rounded-0" value="{{$customer->phone}}" placeholder="Contact ID." id="c_id">
                            </div>
                            @error('contact_id')
                            <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">City:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                </div>
                                <input type="text" name="city" class="form-control rounded-0" value="{{$customer->city}}" placeholder="City">
                            </div>
                            @error('email')
                            <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">Address:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                </div>
                                <input type="text-area" name="address" class="form-control rounded-0" value="{{$customer->address}}" placeholder="address">
                            </div>
                            @error('mobile')
                            <span class="text-danger">{{$message}}</span><br>
                            @enderror
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">Opening Balance</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="number" name="opening_balance" class="form-control rounded-0" value="{{$customer->opening_balance}}" placeholder="" min="0">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="" class="form-label">Credit Limit:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                </div>
                                <input type="number" name="credit_limit" class="form-control rounded-0" id="" placeholder="" value="{{$customer->credit_limit}}" min="0">
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success rounded-1">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection