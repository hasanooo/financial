<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    Protected function profileIndex()
    {
        return view('Admin.Profile.profileindex');
    }

}
