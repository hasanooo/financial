@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span style="font-size:27px; font-weight:23px;">Pending OPEX</span> <small style="color:gray;"> Manage your
                    OPEX</small>
            </div>
        </div>
        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-md-6">
                    <span>Pending OPEX</span>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a class="btn btn-primary" href="{{route('opex.create')}}">
                        <i class="fa-solid fa-plus"></i> Add
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                    <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                    <h5 class="text-danger">Are you sure to remove this product?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" id="con-del" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-12 my-1">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control rounded-0" placeholder="Search Expenditure..." id="search">
                        <span class="input-group-text rounded-0"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></span>

                   </div>
            </div>
           
            <div class="card  table-responsive my-3">
                <div class="card-body">
                    <table class="table table-bordered  table-head-fixed text-nowrap k_search">
                        <thead>
                            <tr class="text-center">
                                <th>Serial</th>
                                <th>Date</th>
                                <th>Department</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($product as $i=>$item) --}}
                            <tr>
                                <td>1</td>
                                <td>2023-07-01</td>
                                <td>Finance</td>
                                <td>Office Furniture</td>
                                <td>$5,000</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>2023-07-02</td>
                                <td>Marketing</td>
                                <td>Advertising Campaign</td>
                                <td>$10,000</td>
                                <td class="text-warning">Pending</td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>2023-07-03</td>
                                <td>Operations</td>
                                <td>Equipment Maintenance</td>
                                <td>$2,500</td>
                                <td><span class="text-danger">Rejected</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>2023-07-04</td>
                                <td>Human Resources</td>
                                <td>Training Program</td>
                                <td>$8,000</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>2023-07-05</td>
                                <td>IT</td>
                                <td>Software Licenses</td>
                                <td>$3,500</td>
                                <td><span class="text-danger">Rejected</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>2023-07-06</td>
                                <td>Sales</td>
                                <td>Product Samples</td>
                                <td>$1,200</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>2023-07-07</td>
                                <td>Research & Development</td>
                                <td>Laboratory Equipment</td>
                                <td>$15,000</td>
                                <td><span class="text-danger">Rejected</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>2023-07-08</td>
                                <td>Operations</td>
                                <td>Warehouse Renovation</td>
                                <td>$20,000</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>2023-07-09</td>
                                <td>Finance</td>
                                <td>Software Upgrade</td>
                                <td>$6,500</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>2023-07-10</td>
                                <td>Marketing</td>
                                <td>Print Collateral</td>
                                <td>$1,500</td>
                                <td><span class="text-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            
                            {{-- @endforeach --}}
                          
                        </tbody>
                    </table>
                </div>
            </div>

            
            
            
            
            <div class="pagination d-flex justify-content-end">
            
            </div>
        </div>
    </div>
</div>

@endsection