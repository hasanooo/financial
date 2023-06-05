@extends('Admin.layouts.dashboard')

@section('content')
<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>CashBook <span style="font-size: 12px;color:rgb(75, 95, 75)"> View monthly cashbook
                        </span></h3>
            </div>
        </div>

        <div class="card bg-light p-3">
           
            <div class="col-12 mt-3">

                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('cashbook.select.month') }}">
                        <div class="input-group mb-3">
                            <select name="month" id="mySelect" class="form-select form-control">
                                <option value="2023-06-01" selected>This Month</option>
                                {{-- @foreach ( as ) --}}
                                <option value="2023-01-01">January</option>
                                <option value="2023-02-01">February</option>
                                <option value="2023-03-01">March</option>
                                <option value="2023-04-01">April</option>
                                <option value="2023-05-01">May</option>
                                <option value="2023-06-01">June</option>
                                <option value="2023-07-01">July</option>
                                <option value="2023-08-01">August</option>
                                <option value="2023-09-01">September</option>
                                <option value="2023-10-01">October</option>
                                <option value="2023-11-01">November</option>
                                <option value="2023-12-01">December</option>
                                {{-- @endforeach --}}
                            </select>
                            <button type="submit" class="input-group-text btn btn-sm bg-danger text-light" href=""><i class="fa fa-2x fa-eye text-light"></i></button>
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
            
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{-- <p>For the month of {{date ('F Y')}}</p> --}}
                    <p>For the month of <strong>{{$monthName}}</strong> {{date ('Y')}}</p>
                </div>
            </div>

            <div style="display: flex;">
            <table class="table table-bordered table-striped my-3 k_search text-center">
                <!-- First table content -->
                <thead>
                    <tr class="text-center">
                        <th colspan="2"></th>
                        <th>Debit</th>
                    </tr>
                    <tr>
                        <th>SL</th>
                        <th>Date</th>
                        <th>Debit Category</th>
                        <th>Particular Details</th>
                        <th>Cash</th>
                        <th></th>
                       
                    </tr>

                </thead>
                <tbody>

                    @foreach ($debit_data as $key => $d)        
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $d->date }}</td>
                        <td>{{ $d->DCategory->name }}</td>
                        <td>{{ $d->particuler }}</td>
                        <td>
                            {{ $d->cash }} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="text-center">
                        <th>Total</th>
                        <th colspan="3"></th>
                        <th>{{ $debit_sum }}<i class="fa-solid fa-bangladeshi-taka-sign"></i></th>
                        <th></th>
                    </tr>
                    <tr class="text-center">
                        <th colspan="2">Debit Balance</th>
                        <th colspan="3"></th>
                        

                    </tr>

                </tbody>
            </table>

            <table class="table table-bordered table-striped my-3 k_search text-center">
                <!-- Second table content -->

                <thead>
                    <tr  class="text-center">
                        <th colspan="2"></th>
                        <th>Credit</th>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Particular Details</th>
                        <th>Cash</th>
                        
                    </tr>
                </thead>
                <tbody>

                    @foreach($credit_data as $key => $c)
                    <tr>
                        <td>{{$c->date}}</td>
                        <td>{{$c->Credit_Category->name}}</td>
                        <td>{{$c->particuler}}</td>
                        <td>
                            {{$c->cash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="text-center">
                        <th colspan="3"></th>
                        <th>{{$credit_sum}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></th>
                        <th></th>
                    </tr>
                    <tr class="text-center">
                        <th colspan="2"></th>
                        <th>{{$debit_sum}}-{{$credit_sum}} = {{$debit_sum - $credit_sum}} <i class="fa-solid fa-bangladeshi-taka-sign"></i>          
                        </th>
                        <th></th>
                        
                    </tr>
                    
                </tbody>
            </table>
            </div>

        </div>
    </div>
</div>

@endsection
