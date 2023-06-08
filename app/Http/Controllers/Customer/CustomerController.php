<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function Index()
    {
        $customer = Customer::all();
        return view('Admin.customer.index',compact('customer'));
    }
    public function Add(Request $request)
    {
        $customer = new Customer();
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->city=$request->city;
        $customer->address=$request->address;
        $customer->opening_balance=$request->opening_balance;
        $customer->credit_limit=$request->credit_limit;
        $customer->save();
        return redirect()->back();
    }

    public function UpdatePage($id)
    {
        $customer = Customer::find($id);
        return view('Admin.customer.update', compact('customer'));
    }
    public function Update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->phone=$request->phone;
        $customer->city=$request->city;
        $customer->address=$request->address;
        $customer->opening_balance=$request->opening_balance;
        $customer->credit_limit=$request->credit_limit;
        $customer->update();
        return redirect()->back();
        
    }
}
