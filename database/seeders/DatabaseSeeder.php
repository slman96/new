<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        user::create([
            'firstname' => 'ahmad',
            'lastname' => 'ahmad',
            'user_type'=> 'admin',
            "email" =>  "ahmad@email.com",
            "Phone" =>  "0963258741",
            "password" =>  Hash::make('123456789'),
        ]);
    }
}
