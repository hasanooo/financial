@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Debit Details <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Debit
                        List</span></h3>
            </div>
        </div>

        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a href="{{ route('debit.create') }}">
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
            
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p>For the month of May-2023</p>
                </div>
            </div>

            <table class="table table-bordered table-striped my-3  k_search text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Debit Category</th>
                        <th>Particular Details</th>
                        <th>Cash</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($debit as $key => $d)
                        
                    
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $d->date }}</td>
                        <td>{{ $d->DCategory->name }}</td>
                        <td>{{ $d->particuler }}</td>
                        <td>{{ $d->cash }}$</td>
                        <td>
                            {{-- <a href="javascript:void(0)" data-url="{{route('editcategory.view',$d->id)}}" id="id">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a> --}}

                            <a class="btn btn-info btn-sm" href="{{ route('edit.debitcash.view',$d->id) }}">Edit</a>
                        
                            <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$d->id}}">delete</a>
                        </td>
                    </tr>

                     <!-- Modal -->
                     <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="{{ route('delete.debit.cash',$d->id) }}" type="button" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal --}}

                       
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
