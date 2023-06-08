@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Credit Details <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Debit
                        List</span></h3>
            </div>
        </div>

        <div class="card bg-light p-3">
            <div class="row mb-3">

            <div class="col-12 mt-3">
                
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('cashbook.select.credit') }}" method="POST">
                            @csrf
                        <div class="input-group mb-3">
                            <select name="cat" id="mySelect" class="form-select form-control">
                                <option value="1" selected>Select Credit Category</option>
                                @foreach ($cat as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="input-group-text btn btn-sm bg-success text-light" href=""><i class="fa fa-2x fa-eye text-light"></i></button>
                            {{-- <button type="submit">save</button> --}}
                          </div>
                        </form>

                    </div>

                    <div class="right col-md-6 d-flex justify-content-end">
                    
                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" name="search" type="search" id="search">
                            <div class="dropdown">
                                <a class="btn btn-info text-light" href="#" role="button"
                                    data-bs-toggle="dropdown">Action</a>
                                <ul class="dropdown-menu bg-info">
                                    <li><a class="dropdown-item bg-info text-light" href="#"> <i
                                                class="fa-regular fa-clipboard"></i> Export to PDF</a></li>  
                                </ul>
                            </div>
                        </form>
                    </div>


                </div>
                
            </div>
            
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h5>For the credit category of <strong>{{ $category->name }}</strong>.</h5>
                </div>
            </div>

            <table class="table table-bordered table-striped my-3  k_search text-center">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Particular Details</th>
                        <th>Cash</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($c_category as $key => $d)
                        
                    
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $d->date }}</td>
                        <td>{{ $d->particuler }}</td>
                        <td>{{ $d->cash }}</td>
                    </tr>     
                        @endforeach
                        <tr class="text-center">
                            <th>Total</th>
                            <th colspan="2"></th>
                            <th>{{$category_sum}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></th>
                            <th></th>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
