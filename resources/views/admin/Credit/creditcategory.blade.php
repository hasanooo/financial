@extends('Admin.layouts.dashboard')

@section('content')

<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h4>Credit Category <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Credit Category
                        List</span></h4>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Add a new Category</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">

                                    <form action="{{route('credit.category.Submit')}}" method="post" enctype="multipart/form-data" class="row g-3">
                                        {{@csrf_field()}}


                                        <div class="col-md-12">
                                            <label for="" class="form-label">Credit Category Name:*</label>
                                            <input type="text" class="form-control rounded-0" name="name" id="" value="" placeholder="Category">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" id="" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Edit modal -->
                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="EditModalLabel">Update Category</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">

                                    <form action="" method="post" enctype="multipart/form-data" class="row g-3">
                                        {{@csrf_field()}}

                                        <input type="hidden" id="id" name="id" />
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Credit Category Name:*</label>
                                            <input type="text" class="form-control rounded-0" name="categoryname" id="categoryname" value="" placeholder="Category">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" id="" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End -->

                    <!--Delete modal -->
                    <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                    <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                    <h5 class="text-danger">Are you sure to remove this Category?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" id="delete" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                </div>

            </div>
            <div class="row mb-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped my-3 k">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Credit Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category_credit as $i=>$item)
                            <tr>
                                <td>
                                    <input type="hidden" id="eid" value="{{$item->id}}">
                                    {{$i+1}}
                                </td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <div class="d-flex justify-content-start">
                                        <a href="javascript:void(0)" data-url="" id="id">
                                            <button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModalEdit">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                        </a>
                                        <button class="btn btn-danger btn-sm" id="category_delete">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
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

<script>
    $(document).on('click', '#category_delete', function() {
        var current_row = $(this).closest('tr');
        let id = current_row.find('#eid').val();
        $('#exampleModaldelete').modal('show');
        $('#delete').attr('href', `/credit/category/delete/${id}`);

    });
</script>
@endsection