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
                'education' => 'string|max:255',
                'notes' => 'string|max:255',
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
    public function destroy($id)
    {
        // if (is_null($this->user) || !$this->user->can('user.delete')) {
        //     abort('403', 'Unauthorized access');
        // }
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
    public function Login()
    {
        return view('Admin.Login.login');
    }
    public function LoginSubmit(Request $request)
    {
        // Validate Login Data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect to dashboard
            session()->flash('success', 'Successully Logged in !');
            return redirect(route('dashboard'));
        } else {
            session()->flash('error', 'Invalid email and password');
            return back();
        }
    }
    public function ChangePassword(Request $request, $id)
    {
        $request->validate(
            [
                'oldpassword' => 'required',
                'newpassword' => 'required|min:8|different:oldpassword',
                'confirmpassword' => 'required|same:newpassword',

            ],
            [
                'oldpassword.required' => 'The old password field is required.',
                'newpassword.required' => 'The new password field is required.',
                'newpassword.min' => 'The new password must be at least 8 characters long.',
                'newpassword.different' => 'The new password must be different from the old password.',
                'confirmpassword.required' => 'The confirm password field is required.',
                'confirmpassword.same' => 'The confirm password must match the new password.',
            ]
        );
        $user = User::where('id', $id)->first();
        $isMatched = Hash::check($request->oldpassword, $user->password);
        if ($isMatched) {
            $user->password = Hash::make($request->confirmpassword);
            $user->save();
            return back()->with("msg", "Password successfuly updated");
        } else {
            return back()->with('msg', "The old password is wrong");
        }
    }
}
