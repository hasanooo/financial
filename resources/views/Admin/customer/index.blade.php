@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Suppliers Info <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Suppliers
                        Information</span></h3>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-plus"></i> Add
                    </button>

                    <!--add Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Add a new contact</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{route('customer.add')}}" method="post"
                                        enctype="multipart/form-data" id="create-post-form" class="row g-3">
                                        {{@csrf_field()}}
                                        <div class="row">
                                           
                                            <div class="col-4">
                                                <label for="name" class="form-label">Name:*</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    </div>
                                                    <input type="text" name="name" class="form-control rounded-0" value="{{old('name')}}" placeholder="Name" id="supplier_name">
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label for="businessname" class="form-label">Email:</label>
                                                
                                                <div class="input-group">
                                        
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                                    </div>
                                                    <input type="email" name="email" class="form-control rounded-0"
                                                        value="" placeholder="Enter valid email">
                                                        
                                                </div>
                                                @error('business_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-4">
                                                <label for="" class="form-label">Phone:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                                    </div>
                                                    <input type="number" name="phone" class="form-control rounded-0 " value="{{old('contact_id')}}" placeholder="Contact ID." id="c_id">
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                @enderror  
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-4">
                                            <div class="col-3">
                                                <label for="" class="form-label">City:</label>
                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text" name="city" class="form-control rounded-0"
                                                        value="" placeholder="City">
                                                      
                                                </div>
                                                @error('city')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Address:*</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                                    </div>
                                                    <input type="text-area" name="address" class="form-control rounded-0"
                                                        value="" placeholder="address">
                                                       
                                                </div>
                                                @error('mobile')
                                                     <span class="text-danger">{{$message}}</span><br>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Opening Balance</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="number" name="opening_balance"
                                                        class="form-control rounded-0" value="0"
                                                        placeholder="" min="0">
                                                        
                                                         
                                                </div>
                                               
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Credit Limit:</label>
                                                
                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="number" name="credit_limit" class="form-control rounded-0"
                                                        id="" placeholder="" value="10000" min="0">
                                                        
                                                </div>
                                            </div>

                                        </div>



                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success rounded-1">Save</button>
                                            <button type="button" class="btn btn-danger rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">
                
                <div class="col-6">
                    <div class="right d-flex justify-content-start">
                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" name="search" type="search" id="in" placeholder="Name or Mobile No. or Id No.">
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
                        {{-- <th>Image</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Opening Balace</th>
                        <th>Credit Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer as $i=>$item)
                    <tr>
                        {{csrf_field()}}
                        <td>{{$i+1}}</td>
                        {{-- <td></td> --}}
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->city}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->opening_balance}}</td>
                        <td>{{$item->credit_limit}}</td>
                        <td>


                            <a href="{{ route('customer.update.page', $item->id) }}" data-url="" id="id">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-sharp fa-solid fa-eye"></i>
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm" id="supplier_delete">
                                <i class="fa-solid fa-trash"></i> 
                            </button>
                       
                        </td>
                    </tr>
                    @endforeach

                   
                </tbody>
            </table>

            <div>
                <p>Showing 1 to 2 of 2 entries</p>
            </div>
            <div class="pagination d-flex justify-content-end">
            
            </div>
        </div>
    </div>
</div> 



@endsection