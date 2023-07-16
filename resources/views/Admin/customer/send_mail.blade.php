@extends('Admin.layouts.dashboard')

@section('content')


<div class="section">
    <div class="container">
        <div class="row mt-3">
            <div class="col-12">
                <h3>Customers Info <span style="font-size: 12px;color:rgb(75, 95, 75)"> Send Email to Customer</span></h3>
            </div>
        </div>
        

        <section class="content">
            {{-- <form method="post" action="">
                @csrf --}}
          
            <div class="card">
                <div class="row">
                    <div class="col-md-11 d-flex justify-content-end mt-3">
                  <button class="btn btn-success" type="submit">Send Email</button>
                    </div>
    
                </div>
                
                <!-- /.card-header -->
                <div class="card-body">
                    
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th class="text-center">Serial</th>
                      <th class="text-center">Customer</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Select</th>
                      {{-- <th class="text-center">Action</th> --}}
                    </tr>
                    </thead>
                    <tbody>
    
                    
    
                    @foreach ($customers as $key => $customer)
                    <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td class="text-center">{{ $customer->name }}</td>
                        <td class="text-center">{{ $customer->email }}</td>
                        <td class="text-center">
                            <input type="checkbox" name="selected_users[]" value="{{ $customer->id }}">
                        </td>
                      </tr>
                    @endforeach
    
                    
    
                    
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">Serial</th>
                        <th class="text-center">Customer</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Select</th>
                        {{-- <th class="text-center">Action</th> --}}
                    </tr>
                    </tfoot>
                  </table>
    
                
                </div>
                <!-- /.card-body -->
              </div>
            {{-- </form> --}}
           
    
        </section>


        <div class="pagination d-flex justify-content-end">

        </div>
    </div>
</div>
</div>



@endsection