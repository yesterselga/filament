<?php

namespace Database\Seeders;

use Chiiya\FilamentAccessControl\Database\Seeders\FilamentAccessControlSeeder;
use Chiiya\FilamentAccessControl\Models\FilamentUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          // Reset cached roles and permissions
          app()[PermissionRegistrar::class]->forgetCachedPermissions();

          // create permissions

          //Customers
          Permission::create(['name' => 'customers.create']);
          Permission::create(['name' => 'customers.edit']);
          Permission::create(['name' => 'customers.delete']);
          Permission::create(['name' => 'customers.list']);
          Permission::create(['name' => 'customers.view']);

          //Branch
          Permission::create(['name' => 'branch.create']);
          Permission::create(['name' => 'branch.edit']);
          Permission::create(['name' => 'branch.delete']);
          Permission::create(['name' => 'branch.list']);
          Permission::create(['name' => 'branch.view']);

          Permission::create(['name' => 'branch.search']);
          Permission::create(['name' => 'branch.filter']);

          //Users, Roles, Permissions
          Permission::create(['name' => 'admin-users.update']);
          Permission::create(['name' => 'permissions.update']);

          // create roles and assign existing permissions

          //sa
          $sa = Role::create(['name' => 'super-admin']);
          $sa->givePermissionTo('admin-users.update')
               ->givePermissionTo('permissions.update')
               ->givePermissionTo('customers.create')
               ->givePermissionTo('customers.edit')
               ->givePermissionTo('customers.delete')
               ->givePermissionTo('customers.list')
               ->givePermissionTo('customers.view');
          $sa->givePermissionTo('branch.create')
               ->givePermissionTo('branch.edit')
               ->givePermissionTo('branch.delete')
               ->givePermissionTo('branch.list')
               ->givePermissionTo('branch.view');

          //admin
          $admin = Role::create(['name' => 'admin']);
          $admin->givePermissionTo('admin-users.update')
               ->givePermissionTo('permissions.update')
               ->givePermissionTo('customers.create')
               ->givePermissionTo('customers.edit')
               ->givePermissionTo('customers.delete')
               ->givePermissionTo('customers.list')
               ->givePermissionTo('customers.view');

          //writer
          $writer = Role::create(['name' => 'writer']);
          $writer->givePermissionTo('customers.create')
               ->givePermissionTo('customers.edit')
               ->givePermissionTo('customers.delete')
               ->givePermissionTo('customers.list')
               ->givePermissionTo('customers.view');

          // create sa user
          $user = FilamentUser::query()->create(
               [
                    'first_name' => 'Yester',
                    'last_name' => 'Selga',
                    'email' => 'yesterselga@gmail.com',
                    'password' => Hash::make('password'),
               ]
          );
          $user->assignRole($sa);
          $user->save();
     }
}
