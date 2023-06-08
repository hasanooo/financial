@extends('Admin.layouts.dashboardprofile')

@section('content')


<div class="button-item">
  <div class="row pt-3">
    <div class="col-md-12">
      @if ($message = Session::get('msg'))
      <div class="alert alert-info alert-block">
        <button type="button" class="close" id="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif
    </div>
  </div>
</div>

<!-- Main content -->
@if (Auth::check())
<section class="content mt-1">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline" style="background-color: whitesmoke;">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="/ProfilePicture/images.jpg" alt="Doctor profile picture">
            </div>

            <h3 class="profile-username text-center">{{ Auth::guard('web')->user()->name }}</h3>

            <p class="text-muted text-center">
              {{ Auth::guard('web')->user()->business_name }}
            </p>
            <p class="text-muted text-center">
            Super Admin
            </p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

            <p class="text-muted">{{ Auth::guard('web')->user()->address }}</p>

            <hr>

            <strong><i class="fas fa-book mr-1"></i> Education</strong>

            <p class="text-muted">
              {{ Auth::guard('web')->user()->education }}
            </p>

            <hr>

            {{-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
  
                  <p class="text-muted">
                    <span class="tag tag-danger">N/A</span>
                    <span class="tag tag-success"></span>
                    <span class="tag tag-info"></span>--}}
            {{-- <span class="tag tag-warning">PHP</span> --}}
            {{-- <span class="tag tag-primary">Node.js</span> --}}
            </p>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

            <p class="text-muted">{{ Auth::guard('web')->user()->notes }}</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Profile Settings</a></li>
              <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">


              <!-- /.tab-pane -->
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <!-- /.tab-pane -->

              <div class="tab-pane active" id="settings">
                <form class="form-horizontal" action="{{route('profile.update',Auth::guard('web')->user()->id )}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ Auth::guard('web')->user()->name }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ Auth::guard('web')->user()->email }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Business Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="business_name" class="form-control" id="" placeholder="Business name" value="{{ Auth::guard('web')->user()->business_name }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" name="address" class="form-control" id="address" placeholder="Address" value="{{ Auth::guard('web')->user()->address }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Contact no.</label>
                    <div class="col-sm-10">
                      <input type="text" name="contact_number" class="form-control" id="address" placeholder="Contact no." value="{{ Auth::guard('web')->user()->contact_no }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Education</label>
                    <div class="col-sm-10">
                      <input type="text" name="education" class="form-control" id="education" placeholder="Education" value="{{ Auth::guard('web')->user()->education }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                    <div class="col-sm-10">
                      <input type="text" name="notes" class="form-control" id="notes" placeholder="Notes" value="{{ Auth::guard('web')->user()->notes }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Current Image</label>
                    <div class="col-sm-10">
                      <img style="height: 75px; width: auto; background: white" class="img" src="" alt="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="image" placeholder="Image">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10 d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary">UPDATE</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="changepassword">
                <form class="form-horizontal" action="{{route('changepassword',Auth::guard('web')->user()->id)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="oldpassword" class="form-control" id="" placeholder="Old Password" value="">
                      @error('oldpassword')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="text" name="newpassword" class="form-control" id="" placeholder="New Password" value="">
                      @error('newpassword')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">New Password (Confirm)</label>
                    <div class="col-sm-10">
                      <input type="text" name="confirmpassword" class="form-control" id="" placeholder="New Password (Confirm)" value="">
                      @error('confirmpassword')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>


                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10 d-flex justify-content-end">
                      <button type="submit" class="btn btn-danger">SUBMIT</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

</section>
@endif
@endsection