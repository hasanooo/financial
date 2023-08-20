<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    function supplierform()
    {
        $supplier=Supplier::all();
        return view('admin.Contact.SupplierView')
        ->with('supplier',$supplier);
    }
    function supplierformsumbit(Request $req)
    {
        $supplier=new Supplier();
        $supplier->contact_id=$req->contact_id;
        $supplier->name=$req->name;
        $supplier->business_name=$req->name;
        $supplier->city=$req->city;
        $supplier->state=$req->state;
        $supplier->country=$req->country;
        $supplier->email =$req->email;
        $supplier->mobile =$req->mobile ;
        $supplier->mobile =$req->mobile ;
        $supplier->second_contact =$req->second_contact ;
        $supplier->business_name =$req->business_name ;
        $supplier->landmark =$req->landmark ;
        $supplier->save();
        $notification = array(
            'message' => 'Supplier Information Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    function supplierEditView($id)
    {
        $supplier=Supplier::find($id);
        return view('Admin.Contact.SupplierUpdate',compact('supplier'));
    }

    function supplierUpdate(Request $req, $id)
    {
      
        $supplier=Supplier::find($id);
        $supplier->contact_id=$req->contact_id;
        $supplier->name=$req->name;
        $supplier->business_name=$req->name;
        $supplier->city=$req->city;
        $supplier->state=$req->state;
        $supplier->country=$req->country;
        $supplier->email =$req->email;
        $supplier->mobile =$req->mobile ;
        $supplier->mobile =$req->mobile ;
        $supplier->second_contact =$req->second_contact ;
        $supplier->business_name =$req->business_name ;
        $supplier->landmark =$req->landmark ;
        $supplier->update();
        $notification = array(
            'message' => 'Supplier Information Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}