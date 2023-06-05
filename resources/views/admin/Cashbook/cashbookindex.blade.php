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
                    
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <p>For the month of {{date ('F Y')}}</p>
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
                    @php
                        $debittotalcash=0;
                        
                    @endphp
                    @foreach ($debit as $key => $d)        
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $d->date }}</td>
                        <td>{{ $d->DCategory->name }}</td>
                        <td>{{ $d->particuler }}</td>
                        <td>
                            @php
                             $debittotalcash += $d->cash
                            @endphp
                            {{$d->cash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                        </td>
                    </tr>
                    @endforeach
                    <tr class="text-center">
                        <th>Total</th>
                        <th colspan="3"></th>
                        <th>{{$debittotalcash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></th>
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
                        @php
                            $credittotalcash=0;
                            
                        @endphp
                        @foreach($index_credit as $i=>$item)
                        <tr>
                            <td>{{$item->date}}</td>
                            <td>{{$item->Credit_Category->name}}</td>
                            <td>{{$item->particuler}}</td>
                            <td>
                                @php
                                $credittotalcash += $item->cash

                                @endphp
                                {{$item->cash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                            </td>
                        </tr>
                        @endforeach
                        <tr class="text-center">
                            <th colspan="3"></th>
                            <th>{{$credittotalcash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i></th>
                            <th></th>
                        </tr>
                        @php
                            $totalremainingcash=0;
                            $totalremainingcash = $debittotalcash - $credittotalcash
                        @endphp
                        <tr class="text-center">
                            <th colspan="2"></th>
                            <th>{{$debittotalcash}}-{{$credittotalcash}} = {{$totalremainingcash}} <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                
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
