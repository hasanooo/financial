@extends('Admin.layouts.dashboard')
@section('titel')
Debit Create
@endsection
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add user</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add user</li>
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

                <!-- @include('Admin.components.errormessage') -->

                <form action="{{ route('profile.submit') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="business_name">Business Name*</label>
                            <input type="text" value="{{ old('business_name') }}" class="form-control" id="business_name" name="business_name" placeholder="Business Name">
                            @error('business_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">Email*</label>
                            <input type="text" class="form-control" value="{{ old('email') }}" id="email" name="email" placeholder="Email">
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="name">Contact Number*</label>
                            <input type="education" class="form-control" value="{{ old('contact_number') }}" id="contact_number" name="contact_number" placeholder="Contact Number">
                            @error('contact_number')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="email">Address*</label>
                            <input type="text" class="form-control" value="{{ old('address') }}" id="address" name="address" placeholder="Address">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="education">Education*</label>
                            <input type="text" class="form-control" value="{{ old('education') }}" id="education" name="education" placeholder="Education">
                            @error('education')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="notes">Notes*</label>
                            <input type="text" class="form-control" id="notes" value="{{ old('notes') }}" name="notes" placeholder="Notes">
                            @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" value="{{ old('password') }}" id="email" name="password" placeholder="Password">
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="repassword">Repassword*</label>
                            <input type="password" class="form-control" value="{{ old('password_confirmation') }}" id="repassword" name="password_confirmation" placeholder="Repassword">
                            @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" accept="image">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="password">Assign Roles</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" style="float:right;" class="btn btn-primary mt-4 pr-4 pl-4">Save User</button>
            </div>




            </form>
        </div>
    </div>
    </div>
</section>
@endsection