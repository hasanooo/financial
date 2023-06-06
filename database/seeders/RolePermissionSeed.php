<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create roles

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        
        //permission roles
        $permissions = [
            [
                'group_name' => 'admin',
                'permissions' => [
                    //admin permission
                    'admin.dashboard',
                ],
            ],
            [
                'group_name' => 'user',
                'permissions' => [
                    //admin permission
                    'user.create',
                    'user.view',
                    'user.edit',
                    'user.delete'
                ],
            ],
            [

                'group_name' => 'roles',
                'permissions' => [
                    //roles permission
                    'roles.create',
                    'roles.view',
                    'roles.edit',
                    'roles.delete'
                ],
            ],

            [
                'group_name' => 'finance',
                'permissions' => [

                    //finance permission
                    //debit
                    'debit.create',
                    'debit.view',
                    'debit.edit',
                    'debit.delete',
                    //credit
                    'credit.create',
                    'credit.view',
                    'credit.edit',
                    'credit.delete',
                    //debit category
                    'debitcategory.create',
                    'debitcategory.view',
                    'debitcategory.edit',
                    'debitcategory.delete',
                    //credit category
                    'creditcateory.view',
                    'creditcateory.add',
                    'creditcateory.edit',
                    'creditcateory.delete',
                ],
            ],

            

            
           
            [
                'group_name' => 'setting',
                'permissions' => [

                    //General setting
                    
                    'generalsetting.add',
                    'generalsetting.edit',
                    //system setting
                    
                    'systemsetting.add',
                    'systemsetting.edit',
                    
                ],
            ],
            
           

        ];
        //create & assign permission
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
