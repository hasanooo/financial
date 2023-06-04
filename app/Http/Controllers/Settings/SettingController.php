<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function generalView()
    {
        return view('Admin.Settings.general');
    }


    public function systemView()
    {
        return view('Admin.Settings.system');
    }
}
