@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h1>Suppliers Info <span style="font-size: 12px;color:rgb(75, 95, 75)"> View Suppliers
                        Information</span></h1>
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
                                    <form action="{{route('formsupplier.submit')}}" method="post"
                                        enctype="multipart/form-data" id="create-post-form" class="row g-3">
                                        {{@csrf_field()}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="" class="form-label">Contact type:*</label>
                                                <div class="input-group">
                                        
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                    </div>
                                                    <select name="type" id="" class="form-control rounded-0">
                                                        <option value="">Suppliers</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
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

                                            <div class="col-3">
                                                <label for="businessname" class="form-label">Business Name:</label>
                                                
                                                <div class="input-group">
                                        
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                                                    </div>
                                                    <input type="text" name="business_name" class="form-control rounded-0"
                                                        value="{{old('business_name')}}" placeholder="Business Name">
                                                        
                                                </div>
                                                @error('business_name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-3">
                                                <label for="" class="form-label">Contact ID.:</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-id-badge"></i></span>
                                                    </div>
                                                    <input type="contact" name="contact_id" class="form-control rounded-0 " value="{{old('contact_id')}}" placeholder="Contact ID." id="c_id">
                                                </div>
                                                @error('contact_id')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                @enderror  
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            <div class="col-3">
                                                <label for="" class="form-label">Email:</label>
                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                    </div>
                                                    <input type="text-area" name="email" class="form-control rounded-0"
                                                        value="{{old('email')}}" placeholder="Email">
                                                      
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span><br>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Mobile:*</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-mobile"></i></span>
                                                    </div>
                                                    <input type="text-area" name="mobile" class="form-control rounded-0"
                                                        value="{{old('mobile')}}" placeholder="Mobile Number">
                                                       
                                                </div>
                                                @error('mobile')
                                                     <span class="text-danger">{{$message}}</span><br>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Alternate contact number:</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text-area" name="second_contact"
                                                        class="form-control rounded-0" value="{{old('second_contact')}}"
                                                        placeholder="Alternate contact number">
                                                        
                                                         
                                                </div>
                                               
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Landline:</label>
                                                
                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                                    </div>
                                                    <input type="text-area" name="landline" class="form-control rounded-0"
                                                        id="" placeholder="Landline">
                                                        
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-3">
                                                <label for="" class="form-label">City:</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-city"></i></span>
                                                    </div>
                                                    <input type="text-area" name="city" class="form-control rounded-0"
                                                        value="{{old('city')}}" placeholder="City">
                                                        
                                                </div>
                                                @error('city')
                                                        <span class="text-danger">{{$message}}</span><br>
                                                   @enderror
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">State:</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-location-dot"></i></span>
                                                    </div>
                                                    <input type="text-area" name="state" class="form-control rounded-0"
                                                        value="{{old('state')}}" placeholder="state">
                                                       
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Country:</label>
                                               
                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-earth-asia"></i></span>
                                                    </div>
                                                    <input type="text-area" name="country" class="form-control rounded-0"
                                                        value="{{old('country')}}" placeholder="Country">
                                                        
                                                </div>
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Landmark:</label>

                                                <div class="input-group">
                                                
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-location"></i></span>
                                                    </div>
                                                    <input type="text-area" name="landmark" class="form-control rounded-0"
                                                        value="{{old('landmark')}}" placeholder="Landmark">
                                                        

                                                </div>
                                                
                                            </div>

                                        </div>


                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <!--Edit Modal -->
                    {{-- <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content rounded-0">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Edit contact</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{route('SupplierEditSub')}}" method="post"
                                        enctype="multipart/form-data" class="row g-3">
                                        {{@csrf_field()}}
                                        <input type="hidden" id="id" name="id" />
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="" class="form-label">Contact type:*</label>
                                                <select name="type" id="" class="form-control rounded-0">
                                                    <option value="">Suppliers</option>

                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="" class="form-label">Name:*</label>
                                                <input type="text" name="name" class="form-control rounded-0 supplier_name" id="name"
                                                    value="{{old('name')}}" placeholder="Name">
                                                    
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Business Name:</label>
                                                <input type="email" name="business_name" class="form-control rounded-0"
                                                    id="bname" value="{{old('business_name')}}" placeholder="Business Name">
                                                    
                                            </div>
                                            
                                            <div class="col-3">
                                                <label for="" class="form-label">Contact ID.:</label>
                                                <input type="contact" name="contact_id" class="form-control rounded-0"
                                                    id="contact_id"  value="{{old('contact_id')}}" placeholder="Contact ID.">
                                                
                                            </div>

                                        </div>
                                            
                                       
                                       
                                        <div class="row mt-3">
                                            <div class="col-3">
                                                <label for="" class="form-label">Email:</label>
                                                <input type="text-area" name="email" class="form-control rounded-0"
                                                    id="email" value="{{old('email')}}" placeholder="Email">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Mobile:*</label>
                                                <input type="text-area" name="mobile" class="form-control rounded-0"
                                                    id="mobile" value="{{old('mobile')}}" placeholder="Mobile Number">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Alternate contact number:</label>
                                                <input type="text-area" name="second_contact"
                                                    class="form-control rounded-0" id="second_contact"
                                                    value="{{old('second_contact')}}"
                                                    placeholder="Alternate contact number">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Landline:</label>
                                                <input type="text-area" name="landline" class="form-control rounded-0"
                                                    id="" placeholder="Landline">
                                                    
                                            </div>

                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-3">
                                                <label for="" class="form-label">City:</label>
                                                <input type="text-area" name="city" class="form-control rounded-0"
                                                    id="city" value="{{old('city')}}" placeholder="City">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">State:</label>
                                                <input type="text-area" name="state" class="form-control rounded-0"
                                                    id="state" value="{{old('state')}}" placeholder="state">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Country:</label>
                                                <input type="text-area" name="country" class="form-control rounded-0"
                                                    id="country" value="{{old('country')}}" placeholder="Country">
                                                   
                                            </div>

                                            <div class="col-3">
                                                <label for="" class="form-label">Landmark:</label>
                                                <input type="text-area" name="landmark" class="form-control rounded-0"
                                                    id="landmark" value="{{old('landmark')}}" placeholder="Landmark">
                                                   
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary rounded-0">Save</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                   
                    <!--Delete modal -->
                    {{-- <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body text-center d-flex flex-column" style="gap:2rem;">
                                    <i class="fa-solid fa-trash text-danger" style="font-size:40px;"></i>
                                    <h5 class="text-danger">Are you sure to remove this user?</h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" id="con-del" href="">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}


                    <!-- Payment modal -->
                    {{--<div class="modal fade" id="exampleModalpayment" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title" id="exampleModalLabel">Make Due payment</p>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <form action="{{route('makepayment')}}" method="post" enctype="multipart/form-data"
                                        class="row g-3">
                                        {{@csrf_field()}}


                                        <div class="col-md-12">
                                            <input type="hidden" name="invoice_id" id="invoice_id">
                                            <input type="hidden" name="purchase_invoice_id" id="purchase_invoice_id">
                                            <label for="" class="form-label">Total Due:*</label>
                                            <input type="text" class="form-control rounded-0" id="due" value=""
                                                placeholder="Due Payment">

                                        </div>

                                        <div class="col-md-12">
                                            <label for="" class="form-label">Pay amount:*</label>
                                            <input type="number" name="pay_amount" class="form-control rounded-0"
                                                id="pay_amount" value="{{old('due_amount')}}" placeholder="Pay amount">
                                        </div>
                                        <span id="alert_msg" class="text-danger"></span>
                                        <div class="modal-footer">
                                            <button type="submit" id="payment_submit"
                                                class="btn btn-primary rounded-0">Make Payment</button>
                                            <button type="button" class="btn btn-secondary rounded-0"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                    <!--End Payment modal -->


                    <!-- invoice view modal -->
                    {{-- @include('Admin.purchase.view_invoice_modal') --}}

                </div>

            </div>

            {{-- <div class="row">
                <div class="col-6">
                    <div class="left">
                        <p class="d-inline">Show</p>
                        <select class="form-select-sm rounded-0">
                            <option selected>25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="200">200</option>
                            <option value="All">All</option>
                        </select>
                        <p class="d-inline">entries</p>
                    </div>
                </div>
                <div class="col-6">
                    <div class="right d-flex justify-content-end">
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
                        <th>Contact ID</th>

                        <th>Business Name</th>
                        <th>Name</th>
                        <th>Contact No.</th>
                        <th>Total Purchase Due</th>
                        <th>Total Purchase Return Amount</th>
                        <th>Make Payment</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ss as $i=> $s)
                    <tr>
                        {{csrf_field()}}
                        <td>{{$i+1}}</td>
                        <td>
                            <input type="hidden" id="did" value="{{$s->id}}">
                            {{$s->contact_id}}
                        </td>



                        <td>{{$s->business_name}}</td>
                        <td>{{$s->name}}</td>
                        <td>{{$s->mobile}}</td>

                        @php

                            $total_due = 0;
                            if ($s->supplier_invoices) {
                                foreach ($s->supplier_invoices as $invoice) {
                                    $remaining_balance = ($invoice->payable_amount -
                                    $invoice->purchase_invoice_purchase_payment->pluck('amount_paid')->sum())
                                    -$invoice->purchase_invoice_purchase_return->pluck('return_price')->sum();
                                    $total_due += $remaining_balance;
                                }
                            }
                        @endphp

                        <td id="d_amount_{{$s->supplier_invoices}}" class="{{$total_due<0?'text-danger':'text-primary'}}">{{ $total_due }}</td>

                        @php

                            $totalreturn = 0;
                            if ($s->supplier_invoices) {
                                foreach ($s->supplier_invoices as $invoice) {
                                    $return = $invoice->purchase_invoice_purchase_return->pluck('return_price')->sum();
                                    $totalreturn += $return;
                                }
                            }
                        @endphp

                        <td>{{$totalreturn}}</td>
                        <td>
                            <a href="{{route('purchase.history',$s->id)}}" class="btn btn-sm btn-warning">Purchase History</a>
                        </td>
                        <td>


                            <a href="javascript:void(0)" data-url="{{route('viewSupplierEdit',$s->id)}}" id="id">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalEdit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </button>
                            </a>
                            <a href="{{route('supplier.View',$s->id)}}">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa-sharp fa-solid fa-eye"></i> View
                                </button>
                            </a>
                            <button class="btn btn-danger btn-sm" id="supplier_delete">
                                <i class="fa-solid fa-trash"></i> Delete
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
            {{ $ss->links() }}
            </div>
        </div>
    </div>
</div> --}}



@endsection