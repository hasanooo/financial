@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <span style="font-size:27px; font-weight:23px;">Share Holders list</span> <small style="color:gray;"> Manage liability
                    list</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('share.addpage')}}"><button type="button" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i> Add Share
                        </button></a>
                </div>
          

            <div class=" table-responsive my-1">
                <div class="card-body">
                    <table id="example1" class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>Date</th> --}}
                                <th>Category</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Terms</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($shares as $share)
                            <tr class="text-center">
                                <td>{{ $share->category }}</td>
                                <td>{{ $share->name }}</td>
                                <td>{{ $share->phone }}</td>
                                <td>{{ $share->address }}</td>
                                <td>{{ $share->amount }}</td>
                                <td>{{ $share->date }}</td>
                                <td>{{ $share->terms }}</td>
                                <td>
                                    {{-- <a class="btn btn-info btn-sm" href="{{ route('liability.editpage',$liability->id) }}"><i class="fa-regular fa-edit"></i></a> --}}
                                    {{-- <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$liability->id}}"><i class="fa-regular fa-trash-can"></i></a> --}}
                                </td>
                            </tr>

                            <div class="modal fade" id="deleteModal{{ $share->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                      {{-- <a href="{{ route('liability.delete',$liability->id) }}" type="button" class="btn btn-danger">Delete</a> --}}
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
                {{-- {{ $yy->links() }} --}}
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection