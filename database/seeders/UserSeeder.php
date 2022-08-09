<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          // create sa user
          $user = User::query()->create(
               [
                    'name' => 'Yester Selga',
                    'email' => 'yesterselga@gmail.com',
                    'password' => Hash::make('password'),
               ]
          );
          $user->assignRole('super-admin');
          $user->save();
     }
}
