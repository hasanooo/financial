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
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Add a new Category</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">

                                    <form action="{{route('credit.category.Submit')}}" method="post" enctype="multipart/form-data"
                                    class="row g-3">
                                    {{@csrf_field()}}

                                
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Credit Category Name:*</label>
                                            <input type="text" class="form-control rounded-0" name="name" id="" value=""
                                                placeholder="Category">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" id="" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Edit modal -->
                    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="EditModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="EditModalLabel">Update Category</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">

                                    <form action="" method="post" enctype="multipart/form-data"
                                    class="row g-3">
                                    {{@csrf_field()}}

                                        <input type="hidden" id="id" name="id" />
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Credit Category Name:*</label>
                                            <input type="text" class="form-control rounded-0" name="categoryname" id="categoryname" value=""
                                                placeholder="Category">

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" id="" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End -->

                    <!--Delete modal -->
                    <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                    <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                    <h5 class="text-danger">Are you sure to remove this Category?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" id="delete" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End -->
                </div>

            </div>
            <div class="row mb-3">
                <div class="row">
                    <div class="col-6">
                        <div class="left">
                            <p class="d-inline">Show</p>
                            <select class="form-select-sm rounded-0">
                                <option selected>25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="All">All</option>
                            </select>
                            <p class="d-inline">entries</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="right d-flex justify-content-end">
                            <form class="d-flex">
                                <label class="me-1 mt-1">Search:</label>
                                <input class="form-control me-2 rounded-0" name="search" type="search" id="in">
                                <div class="dropdown">
                                    <a class="btn btn-info text-light" href="#" role="button"
                                        data-bs-toggle="dropdown">Action</a>
                                    <ul class="dropdown-menu bg-info">
                                        <li><a class="dropdown-item bg-info text-light" href="#"><i
                                                    class="fa-regular fa-clipboard"></i> Copy </a></li>
                                        <li><a class="dropdown-item bg-info text-light" href="#"><i
                                                    class="fa-regular fa-clipboard"></i> Export to CSV</a></li>
                                        <li><a class="dropdown-item bg-info text-light" href="#"> <i
                                                    class="fa-regular fa-clipboard"></i> Export to Excel</a></li>
                                        <li><a class="dropdown-item bg-info text-light" href="#"> <i
                                                    class="fa-regular fa-clipboard"></i> Export to PDF</a></li>
                                        <li><a class="dropdown-item bg-info text-light" href="#"> <i
                                                    class="fa-solid fa-print"></i> Print</a></li>
                                        <li><a class="dropdown-item bg-info text-light" href="#"> <i
                                                    class="fa-regular fa-clipboard"></i> Column visibility</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
                            <a href="javascript:void(0)" data-url="" id="id">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalEdit">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                </a>
                            
                                <button class="btn btn-danger btn-sm" id="category_delete">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    
                    </tbody> 
                </table>   
            </div>
            <div>
                <p>Showing 1 to 2 of 2 entries</p>
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