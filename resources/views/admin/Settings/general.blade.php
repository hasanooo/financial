@extends('Admin.layouts.dashboard')
@section('titel')
General Settings
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
                <h1>General Settings Manage</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">General Settings</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- First Row -->
                    <div class="form-row mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Company Name:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="company_name" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->company_name }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Contact Name:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="contact_name" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->contact_name }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Email:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="email" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->email }}">
                            </div>
                        </div>
                    </div>

                    <!-- Second Row -->
                    <div class="form-row mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Phone:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="phone" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->phone }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Address Line 1:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="address_1" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->address_1 }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Address Line 2:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="address_2" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->address_2 }}">
                            </div>
                        </div>
                    </div>

                    <!-- Third Row -->
                    <div class="form-row mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">City:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="city" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->city }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">State:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="state" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->state }}">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="" class="form-label">Zip Code:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="zip" class="form-control" style="background-color:whitesmoke;" id="" value="{{ $setting->zip }}">
                            </div>
                        </div>
                    </div>

                    <!-- Image Row -->
                    <div class="row mt-3">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <label for="inputSkills" class="form-label">Current Image</label>
                            <div class="col-sm-10">
                                <img style="height: 75px; width: auto; background: white" class="img" src="/SettingImage/{{ $setting->image }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-12 mt-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="file" name="image" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                        </div>
                    </div>

                    <!-- Save Button Row -->
                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit" value="Save" class="btn btn-primary mt-4 pr-4 pl-4" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



@endsection