@extends('Admin.layouts.dashboard')
@section('titel')
Update Supplier
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->
<section class="content-header mt-3">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Update Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Supplier</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-body">

                    <form action="{{route('supplier.update',$supplier->id)}}" method="post" enctype="multipart/form-data" id="create-post-form" class="row g-3">
                        {{@csrf_field()}}
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Contact type:*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <select name="type" id="" class="form-control rounded-0">
                                        <option value="">Suppliers</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="name" class="form-label">Name:*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    </div>
                                    <input type="text" name="name" class="form-control rounded-0" value="{{$supplier->name}}" placeholder="Name" id="supplier_name">
                                </div>
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="businessname" class="form-label">Business Name:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" name="business_name" class="form-control rounded-0" value="{{$supplier->business_name}}" placeholder="Business Name">
                                </div>
                                @error('business_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Contact ID.:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                    </div>
                                    <input type="contact" name="contact_id" class="form-control rounded-0 " value="{{$supplier->contact_id}}" placeholder="Contact ID." id="c_id">
                                </div>
                                @error('contact_id')
                                <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Email:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    </div>
                                    <input type="text-area" name="email" class="form-control rounded-0" value="{{$supplier->email}}" placeholder="Email">
                                </div>
                                @error('email')
                                <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Mobile:*</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                    </div>
                                    <input type="text-area" name="mobile" class="form-control rounded-0" value="{{$supplier->mobile}}" placeholder="Mobile Number">
                                </div>
                                @error('mobile')
                                <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Alternate contact number:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text-area" name="second_contact" class="form-control rounded-0" value="{{$supplier->second_contact}}" placeholder="Alternate contact number">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Landline:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input type="text-area" name="landline" class="form-control rounded-0" id="" placeholder="Landline">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">City:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-city"></i></span>
                                    </div>
                                    <input type="text-area" name="city" class="form-control rounded-0" value="{{$supplier->city}}" placeholder="City">
                                </div>
                                @error('city')
                                <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">State:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location-dot"></i></span>
                                    </div>
                                    <input type="text-area" name="state" class="form-control rounded-0" value="{{$supplier->state}}" placeholder="State">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Country:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-earth-asia"></i></span>
                                    </div>
                                    <input type="text-area" name="country" class="form-control rounded-0" value="{{$supplier->country}}" placeholder="Country">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="" class="form-label">Landmark:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-location"></i></span>
                                    </div>
                                    <input type="text-area" name="landmark" class="form-control rounded-0" value="{{$supplier->landmark}}" placeholder="Landmark">
                                </div>
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