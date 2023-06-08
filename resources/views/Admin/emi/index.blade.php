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
                    
                    <a class="btn btn-success" href="{{ route('emi.sale.index') }}">Add new EMI sale</a>

                </div>

            </div>

            <div class="row">
                
                <div class="col-6">
                    <div class="right d-flex justify-content-start">
                        <form class="d-flex">
                            <label class="me-1 mt-1">Search:</label>
                            <input class="form-control me-2 rounded-0" name="search" type="search" id="in" placeholder="Name or Mobile No. or Id No.">
                        </form>
                    </div>
                </div>
            </div>

            <table class="table table-bordered table-striped my-3 k">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Invoice</th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Payable Amount</th>
                        <th>Paid Amount</th>
                        <th>Due</th>
                        <th>EMI Due</th>
                        <th>EMI Paid</th>
                        <th>EMI Quantity</th>
                        <th>Per EMI Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emi as $i=>$item)
                    <tr>
                        {{csrf_field()}}
                        <td>{{$i+1}}</td>
                        {{-- <td></td> --}}
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        {{-- <td>{{$item->address}}</td> --}}
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>


                            <a href="{{ route('customer.update.page', $item->id) }}" data-url="" id="id">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-sharp fa-solid fa-print"></i>
                                </button>
                            </a>
                       
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