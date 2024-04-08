<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $AdminPermission = [
            'manage users' ,'create' , 'update' , 'delete' ,'view' ,'change password'
        ];
        $UserPermission = [
            'view current profile' , 'update his password'
        ];
        $AdminPermissions= collect($AdminPermission )->map(function($Adminpermission){
            return ['name' => $Adminpermission,'guard_name'=>'web'];
        });
        $UserPermissions= collect($UserPermission)->map(function($Userpermission){
            return ['name' => $Userpermission,'guard_name'=>'web'];
        });

        Permission::insert($AdminPermissions -> toArray());
        Permission::insert($UserPermissions -> toArray());
        
        $AdminRole = Role::create(['name' => 'admin'])->givePermissionTo ([$AdminPermission,$UserPermission]);
        $UserRole = Role::create(['name' => 'user'])->givePermissionTo ($UserPermission);

    }
}
