@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container-fluid">
        <div class="row border-top border-bottom" style="background-color: #f5f5f5; padding: 20px 0px">
            <div class="col-12">
                <h3>Categories <span style="font-size: 12px;color:rgb(75, 95, 75)"> Manage your categories</span></h3>
            </div>
        </div>
        <div class="p-3">
            <div class="row mb-3">
                <div class="col-sm-12 d-flex justify-content-end d-grid">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Add new category</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{ route('product.category.submit') }}" method="POST" class="row g-3"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Category Name:*</label>
                                            <input type="text" name="name" class="form-control rounded-0" id=""
                                                placeholder="Category Name">
                                                @error('name')<!--validation-->
                                                {{$message}}<br>
                                           @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Category Image:</label>
                                            <input type="file" name="image" class="form-control rounded-0" id=""
                                                placeholder="Category Image">
                                                @error('image')<!--validation-->
                                                {{$message}}<br>
                                           @enderror
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> <!-- End Modal -->
                </div>
                    <!--Edit  Modal -->
                    {{-- <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded-0">
                                <div class="modal-body ">
                                    <form action="{{ route('CategoryEditSub') }}" method="POST" class="row g-3"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12">
                                            <input type="hidden" id="id"  name="id"/>
                                            <label for="" class="form-label">Category Name:*</label>
                                            <input type="text" name="name" class="form-control rounded-0" id="name"
                                                placeholder="Category Name">
                                                @error('name')<!--validation-->
                                                {{$message}}<br>
                                           @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="form-label">Category Image:</label>
                                            <input type="file" name="image" class="form-control rounded-0" id=""
                                                placeholder="Category Image">
                                                @error('image')<!--validation-->
                                                {{$message}}<br>
                                           @enderror
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> <!-- End Edit Modal --> --}}

            </div>
            <!-- <div class="row">
                <div class="col-lg-6 col-md-12 pb-2">
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
                <div class="col-lg-6 col-md-12">
                    <div class="right d-flex justify-content-end">
                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" type="search">
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
            </div> -->
            <table class="table table-bordered table-striped my-3">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Image</th>
                      
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   

                    @foreach($category as $i=>$item)
                    <tr>
                        <td>{{$i+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                            <img style="height: 30px; width: 30px; background: white" class="img"
                                src="/ProductImage/CategoryImage/{{$item->image}}" alt="">
                        </td>
                        
                        <td class="">
                        <a href="javascript:void(0)"  data-url="" id="id"><button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" > <i class="fa-solid fa-pen-to-square"></i></button></a>
                           
                        </td>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
            
           
        </div>
    </div>
</div>

{{--<script>
     $(document).ready(function(){
        $('body').on('click', '#id', function(){
            var urlData = $(this).data('url');
        $.get(urlData, function(data) {
            $('#exampleModalEdit').modal('show');
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#short_code').val(data.short_code);
                      
        });
        });
    });
</script> --}}


@endsection