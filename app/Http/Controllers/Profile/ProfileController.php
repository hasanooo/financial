<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use File;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    protected function create()
    {
        $roles = Role::all();
        return view("Admin.Profile.create", compact('roles'));
    }
    protected function profileIndex()
    {

        return view('Admin.Profile.profileindex');
    }
    public function submit(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'business_name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'education' => 'required|string|max:255',
                'notes' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',

            ],
            [
                'required' => 'The :attribute field is required.',
                'string' => 'The :attribute field must be a string.',
                'max' => 'The :attribute field should not exceed :max characters.',
                'email' => 'The :attribute field must be a valid email address.',
                'unique' => 'The :attribute has already been taken.',
                'confirmed' => 'The :attribute confirmation does not match.',
                'image' => 'The :attribute must be an image file (jpeg, png, jpg).',
                'mimes' => 'The :attribute must be a file of type: :values.',
                'min' => 'The :attribute field must be at least :min characters.',
            ]
        );

        // Create New User
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->business_name = $request->input('business_name');
        $user->contact_no = $request->input('contact_number');
        $user->address = $request->input('address');
        $user->education = $request->input('education');
        $user->notes = $request->input('notes');
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been created !!');
        return redirect()->route('profile.index');
    }
    public function ProfileList()
    {
        $users = User::all();
        return view('Admin.Profile.index', compact('users'));
    }
    public function ProfileEdit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::all();
        return view('Admin.Profile.edit', compact('user', 'roles'));
    }
    public function ProfileUpdate(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'business_name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'address' => 'required|string|max:255',
                'education' => 'required|string|max:255',
                'notes' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                // 'password' => 'required|string|min:8|confirmed',
                // 'password_confirmation' => 'required|string|min:8',

            ],
            [
                'required' => 'The :attribute field is required.',
                'string' => 'The :attribute field must be a string.',
                'max' => 'The :attribute field should not exceed :max characters.',
                'email' => 'The :attribute field must be a valid email address.',
                'unique' => 'The :attribute has already been taken.',
                'confirmed' => 'The :attribute confirmation does not match.',
                'image' => 'The :attribute must be an image file (jpeg, png, jpg).',
                'mimes' => 'The :attribute must be a file of type: :values.',
                'min' => 'The :attribute field must be at least :min characters.',
            ]
        );
        $user = User::where('id', $id)->first();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->business_name = $request->input('business_name');
        $user->contact_no = $request->input('contact_number');
        $user->address = $request->input('address');
        $user->education = $request->input('education');
        $user->notes = $request->input('notes');
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated !!');
        return back();
    }
}
