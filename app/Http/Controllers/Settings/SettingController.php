<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use File;

class SettingController extends Controller
{
    public function generalView()
    {   
        $setting = GeneralSetting::where('id',1)->first();
        return view('Admin.Settings.general',compact('setting'));
    }


    public function systemView()
    {
        return view('Admin.Settings.system');
    }

    public function UpdateSetting(Request $request)
    {
        $setting = GeneralSetting::where('id',1)->first();
        $setting->company_name = $request->company_name;
        $setting->contact_name = $request->contact_name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->address_1 = $request->address_1;
        $setting->address_2 = $request->address_2;
        $setting->city = $request->city;
        $setting->state = $request->state;
        $setting->zip = $request->zip;

        if($request->file('image')){
            $file = $request->file('image');
            // @unlink(public_path('backend/images/users/'.$admin->image));
            @unlink('SettingImage/'.$setting->image);
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move('SettingImage/',$filename);
            $setting->image= $filename;
        }

        $setting->update();
        return redirect()->back();
    }
}
