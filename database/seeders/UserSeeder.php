<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(100)->create();
        $user = user::create([
            'firstname' => 'ahmad',
            'lastname' => 'ahmad',
            'role'=> 'admin',
            "email" =>  "ahmad@email.com",
            "password" =>  Hash::make('123456789'),
        ]);
        $user->assignRole('admin');
        $user = user::create([
            'firstname' => 'slman',
            'lastname' => 'ismael',
            'role'=> 'user',
            "email" =>  "slman@email.com",
            "password" =>  Hash::make('123456789'),
        ]);
        $user->assignRole('user');
    }
}
