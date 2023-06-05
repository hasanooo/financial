<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','imon@gmail.com')->first();
        if(is_null($user))
        {
            $user = new User();
        $user->name = "Super Admin";
        $user->email = "superadmin@gmail.com";
        $user->business_name = "Founder and CEO";
        $user->contact_no = "01976543332";
        $user->image = " ";
        $user->address = "Basundhara R/A, Dhaka";
        $user->education = "BSc in CSE";
        $user->notes = "NONE";
        $user->password = Hash::make("superadmin123");
        $user->save();
        $user->assignRole('superadmin');
        }
        
    }
}