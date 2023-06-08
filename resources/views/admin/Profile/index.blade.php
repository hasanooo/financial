@extends('Admin.layouts.dashboard')
@section('titel')
Users
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                <h5 class="text-danger">Are you sure to remove this user?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" id="con-del" href="">Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- Content Header (Page header) -->

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users List</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Users</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="input-group bg-primary">
    <input type="search" id="product-search" class="form-control form-control-lg" placeholder="search here">
    <div class="input-group-append">
        <button type="submit" class="btn btn-lg btn-default">
            <i class="fa fa-search"></i>
        </button>
    </div>
</div>

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

            <div class="card-header">

                {{-- <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 350px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead class="bg-light text-capitalize">
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <input type="hidden" id="uid" value="{{$user->id}}">
                                {{ $loop->index+1 }}
                            </td>
                            <td> {{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="badge badge-info mr-1">
                                    {{ $role->name }}
                                </span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-success text-white" href="/profile/edit/{{$user->id}}">Edit</a>

                                <a type="button" id="user_remove" class="btn btn-danger" data-bs-toggle="modal">
                                    Delete
                                </a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



        </div>
</section>

<script>
$(document).ready(function() {
    $(document).on('click', '#user_remove', function() {
        var current_row = $(this).closest('tr');
        let uid = current_row.find('#uid').val();
        $('#exampleModal').modal('show');
        $('#con-del').attr("href", "/profile/delete/" + uid);
    })
});
</script>
@endsection