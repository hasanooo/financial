@extends('Admin.layouts.dashboard')
@section('titel')
System Settings
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>System Settings Manage</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Home</a></li>
                    <li class="breadcrumb-item active"><a href="">System Settings</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--First Row -->
                    <div class="form-row mt-3">
                            
                        <div class="col-4">
                            <label for="" class="form-label">Date Format:*</label>
                            <div class="input-group">
                    
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <select name="" class="form-control" style="background-color:whitesmoke;" id="">
                                    <option>Please Select</option>
                                    <option value="">dd-mm-YYYY (04-06-2023)</option>
                                    <option value="">mm-dd-YYYY (06-04-2023)</option>
                                    <option value="">MM-dd-YYYY (JUN-04-2023)</option>
                                    <option value="">dd-MM-YYYY (04-JUN-2023)</option>
                                    

                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="timezone" class="form-label">Time Zone:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <select name="timezone" id="timezone" class="form-select" style="background-color: whitesmoke;">
                                    <option value="">Select Time Zone</option>
                                    <option value="GMT-12:00">GMT-12:00</option>
                                    <option value="GMT-11:00">GMT-11:00</option>
                                    <option value="GMT-10:00">GMT-10:00</option>
                                    <!-- Add more options for different time zones as needed -->
                                </select>
                            </div>
                        </div>


                        <div class="col-4">
                            <label for="currencyCode" class="form-label">Currency Code:*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                                </div>
                                <select name="currencyCode" id="currencyCode" class="form-control" style="background-color: whitesmoke;">
                                    <option value="">Select Currency Code</option>
                                    <option value="USD">USD </option>
                                    <option value="EUR">EUR </option>
                                    <option value="GBP">GBP </option>
                                    <option value="BDT">BDT </option>
                                   
                                </select>
                            </div>
                        </div>

                        
                    </div>

                    <div class="form-row mt-3">
                            
                    <div class="col-4">
                        <label for="currencySymbol" class="form-label">Currency Symbol:*</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <select name="currencySymbol" id="currencySymbol" class="form-control" style="background-color: whitesmoke;">
                                <option value="">Select Currency Symbol</option>
                                <option value="$">$ - United States Dollar</option>
                                <option value="€">€ - Euro</option>
                                <option value="£">£ - British Pound Sterling</option>
                                <option value="৳">৳ - Bangladeshi Taka</option>
                                <!-- Add more currency symbol options as needed -->
                            </select>
                        </div>
                    </div>



                        <div class="col-4">
                            <label for="" class="form-label">Currency (Symbol/Code):*</label>
                            <div class="input-group">
                    
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <select name="" id="" class="form-control" style="background-color: whitesmoke;">
                                <option value="">Select Currency Type</option>
                                <option value="">Currency Symbol</option>
                                <option value="">Currency Code</option>
                               
                            </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">Currency Position</label>
                            <div class="input-group">
                    
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <select name="" class="form-control" style="background-color:whitesmoke;" id="">

                                    <option>Please Select</option>
                                    <option value="">Suffix</option>
                                    <option Value="">Prefix</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-row mt-3">
                        <div class="col-4">
                            <label for="" class="form-label">IS RTL?</label>
                            <div class="input-group">
                    
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <select name="" class="form-control" style="background-color:whitesmoke;" id="">

                                    <option>Please Select</option>
                                    <option value="">Yes</option>
                                    <option Value="">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-4">
                            <label for="" class="form-label">First Transaction Date:*</label>
                            <div class="input-group">
                    
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" name="" class="form-control" style="background-color:whitesmoke;" id="" value="">
                            </div>
                        </div>

                        
                    </div>


                    <div class="row mt-3">
                        <div class="col-12 d-flex justify-content-end">
                            <input type="submit"  value="Save"
                            class="btn btn-primary mt-4 pr-4 pl-4" />
                        </div>
                    
                    </div>

                    
                </form>



            </div>
        </div>
    </div>
</section>


@endsection