@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Credit Details <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Credit
                        List</span></h3>
            </div>
        </div>

        <div class="card bg-light p-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-end">
                    <!-- Button trigger modal -->
                    <a href="{{route('credit.create')}}">
                        <button type="button" class="btn btn-primary">
                            <i class="fa-solid fa-plus"></i> Add
                        </button>
                    </a>
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
                    <table id="example1" class="table table-bordered table-striped my-3 k_search text-center">
                        <thead>
                            <tr class="text-white" style="background-color:#0d5e8b;">
                                <th>SL</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Particular Details</th>
                                <th>Cash</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalcash=0;
                            @endphp
                            @foreach($index_credit as $i=>$item)
                            <tr>
                                <td>{{$i+1}}</td>
                                <td>{{$item->date}}</td>
                                <td>{{$item->Credit_Category->name}}</td>
                                <td>{{$item->particuler}}</td>
                                <td>
                                    @php
                                    $totalcash += $item->cash
                                    @endphp
                                    {{$item->cash}}
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu text-left px-3" role="menu" aria-labelledby="menu1">
                                            <li role="presentation">
                                            
                                            <a data-toggle="modal" data-target="#deleteModal{{$item->id}}" class="btn  btn-sm">
                                                <i class="fa-solid fa-trash"></i> Delete </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-sm" href="{{route('creditview.edit',$item->id)}}">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                            <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                            <h5 class="text-danger">Are you sure to remove this Credit info?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <a href="{{ route('delete.credit.cash',$item->id) }}" type="button" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>Total</th>
                                <th colspan="3"></th>
                                <th>{{$totalcash}}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection