<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    public function index()
    {
        // if (is_null($this->user) || !$this->user->can('roles.view')) {
        //     abort('403', 'Unauthorized access');
        // }
        $roles = Role::all();
        return view('Admin.Roles.index', compact('roles'));
    }
    public function create()
    {
        // if (is_null($this->user) || !$this->user->can('roles.create')) {
        //     abort('403', 'Unauthorized access');
        // }
        $permissions = Permission::all();
        $permissionsGroup = User::getPermissionGroups();
        return view('Admin.Roles.create', compact('permissions', 'permissionsGroup'));
    }

    public function edit($id)
    {

        // if (is_null($this->user) || !$this->user->can('roles.edit')) {
        //     abort('403', 'Unauthorized access');
        // }
        $roles = Role::findById($id);
        $permissions = Permission::all();
        $permissionsGroup = User::getPermissionGroups();
        return view('Admin.Roles.edit', compact('permissions', 'permissionsGroup', 'roles'));
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | unique:roles'
            ],
            [
                'name.required' => 'Please give a role name'
            ]
        );
        $role = Role::create(['name' => $request->name]);
        $permission = $request->permissions;
        if (!empty($permission)) {
            $role->syncPermissions($permission);
        }
        session()->flash('success', 'Roll has been added');
        return back();
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required | max:100 | unique:roles,name,' . $id
            ],
            [
                'name.required' => 'Please give a role name'
            ]
        );
        $roles = Role::findById($id);
        $permission = $request->permissions;
        if (!empty($permission)) {
            $roles->name = $request->name;
            $roles->save();
            $roles->syncPermissions($permission);
        }
        session()->flash('success', 'Roll has been updated');
        return back();
    }
    public function destroy($id)
    {
        // if (is_null($this->user) || !$this->user->can('roles.delete')) {
        //     abort('403', 'Unauthorized access');
        // }
        $roles = Role::findById($id);
        if (!empty($roles)) {
            $roles->delete();
        }
        session()->flash('success', 'Roll has been deleted');
        return back();
    }
}
