@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Capex Pending List <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Capex Pending
                        List</span></h3>
            </div>
        </div>

        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a href="">
                        <button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Add
                        </button>
                    </a>
                </div>

                <div class="col-12 mt-3">

                    <div class="right d-flex justify-content-end">

                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" name="search" type="search" id="search">
                            <div class="dropdown">
                                <a class="btn btn-info text-light" href="#" role="button" data-bs-toggle="dropdown">Action</a>
                                <ul class="dropdown-menu bg-info">
                                    <li><a class="dropdown-item bg-info text-light" href="#"><i class="fa-regular fa-clipboard"></i> Copy </a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"><i class="fa-regular fa-clipboard"></i> Export to CSV</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Export to Excel</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Export to PDF</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-solid fa-print"></i> Print</a></li>
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i class="fa-regular fa-clipboard"></i> Column visibility</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 d-flex justify-content-center">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <p>For the month of {{date ('F Y')}}</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped my-3 k_search text-center">
                        <thead>
                            <tr class="text-white" style="background-color:#0d5e8b;">
                                <th>SL</th>
                                <th>Date</th>
                                <th>Supplier/Vendor Name</th>
                                <th>Category</th>
                                <th>Descriptipn</th>
                                <th>Created By</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                
                                <td>1</td>
                                <td>7/13/2023</td>
                                <td>Computer Store</td>
                                <td>Equipment</td>
                                <td>Dell core i5 8th gen Laptop Purchase</td>
                                <td>POC Department</td>
                                <td>65000</td>
                                <td>Pending</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu text-left px-3" role="menu" aria-labelledby="menu1">
                                            <li role="presentation">
                                            
                                            <a data-toggle="modal" data-target="" class="btn  btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-sm" href="">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>

                                

                            </tr>
                            
                            <tr class="text-center">
                                <th colspan="4">Total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection