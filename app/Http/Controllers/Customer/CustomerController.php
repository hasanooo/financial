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

        $request->validate([
            'name'=>'required|string|max:255',
            'phone'=>'required|numeric',
            'city'=>'required|string|max:255',
        ], [
            'name.required' => 'Please enter customer name!',
            'phone.required' => 'Please provide contact number!',
            'city.required' => 'Please provide customer city!',

        ]);

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

    public function SelectCustomer()
    {
        $customers = Customer::all();
        return view('admin.customer.send_mail',compact('customers'));
    }

    // public function SendEmail(Request $request)
    // {
    //     $selectedUserIds = $request->input('selected_users');
    
    //     $users = Customer::whereIn('id', $selectedUserIds)->get();
    
    //     foreach ($users as $user) {
    //         Mail::to($user->email)->send(new SendMail);
    //     }
    
    //     return 'Emails Sent Successfully to selected users';
    // }
}
