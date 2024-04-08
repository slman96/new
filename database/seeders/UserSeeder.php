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
        $user = user::create([
            'firstname' => 'ahmad',
            'lastname' => 'ahmad',
            'role'=> 'admin',
            "email" =>  "ahmad@email.com",
            "Phone" =>  "0963258741",
            "password" =>  Hash::make('123456789'),
        ]);
        $user->assignRole('admin');
    }
}
