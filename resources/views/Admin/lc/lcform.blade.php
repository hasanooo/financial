@extends('Admin.layouts.dashboard')
@section('titel')
    lcform
@endsection
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
      
        
        <div class="container mt-5">
            <h2>LC Form</h2>
            <form action="{{route('lc.form.submit')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Category:</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="issue_date">Issue Date:</label>
                    <input type="date" class="form-control" id="issue_date" name="issue_date" required>
                </div>
                <div class="form-group">
                    <label for="payment_date">Payment Date:</label>
                    <input type="date" class="form-control" id="payment_date" name="payment_date" required>
                </div>
                <div class="form-group">
                    <label for="total_amount">Total Amount:</label>
                    <input type="text" class="form-control" id="total_amount" name="total_amount" required>
                </div>
                <div class="form-group">
                    <label for="bank_name">Bank Name:</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                </div>
                <div class="form-group">
                    <label for="any_details">Any Details:</label>
                    <input type="text" class="form-control" id="any_details" name="any_details">
                </div>
                <div class="form-group">
                    <label for="file">File:</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
        
        
@endsection
