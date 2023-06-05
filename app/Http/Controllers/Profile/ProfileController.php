<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected function create()
    {
        return view("Admin.Profile.create");
    }
    Protected function profileIndex()
    {
        return view('Admin.Profile.profileindex');
    }

}
