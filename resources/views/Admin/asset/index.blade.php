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
                    <a href="{{route('asset.addpage')}}"><button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Add Asset
                        </button></a>
                </div>
          

            <div class=" table-responsive my-1">
                <div class="card-body">
                    <table class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>Date</th> --}}
                                <th>Serial</th>
                                <th>Category</th>
                                <th>Asset Name</th>
                                <th>Details</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach ($assets as $key => $asset)
                            <tr class="text-center">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $asset->category }}</td>
                                <td>{{ $asset->name }}</td>
                                <td>{{ $asset->details }}</td>
                                <td>{{ $asset->amount }}</td>
                                <td>{{ $asset->date }}</td>
                                <td></td>
                            </tr>
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