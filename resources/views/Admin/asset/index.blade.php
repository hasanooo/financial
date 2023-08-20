@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <span style="font-size:27px; font-weight:23px;">Assets list</span> <small style="color:gray;"> Manage assets
                    list</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('asset.addpage')}}"><button type="button" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> Add Asset
                        </button></a>
                </div>
          

            <div class=" table-responsive my-1">
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial</th>
                                <th>Category</th>
                                <th>Asset Name</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $key => $asset)
                            <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $asset->category }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->details }}</td>
                                <td>{{ $asset->amount }}</td>
                                <td>{{ $asset->date }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('asset.editpage',$asset->id) }}"><i class="fa-regular fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$asset->id}}"><i class="fa-regular fa-trash-can"></i></a>
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteModal{{ $asset->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirmation Messege</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <!-- <span aria-hidden="true">&times;</span> -->
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                    Are you sure want to delete this?
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <a href="{{ route('asset.delete',$asset->id) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pagination d-flex justify-content-end">
                
            </div>
        </div>
    </div>
</div>

{{-- <script src="/admin/plugins/jquery/jquery.min.js"></script> --}}

@endsection