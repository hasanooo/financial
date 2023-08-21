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

            
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p>For the month of May-2023</p>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped my-3 k_search text-center">
                    <thead>
                        <tr class="text-white" style="background-color:#0d5e8b;">
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
                                <td>{{ $d->DCategory->name ?? 'Account Receivable' }}</td>
                                <td>{{ $d->particuler }}</td>
                                <td>{{ $d->cash }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('edit.debitcash.view',$d->id) }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$d->id}}">Delete</a>
                                </td>
                            </tr>
            
                            <!-- Modal -->
                            <div class="modal fade" id="deleteModal{{ $d->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this?
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
</div>

@endsection
