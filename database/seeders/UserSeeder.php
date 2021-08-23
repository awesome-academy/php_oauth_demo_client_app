<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::unguard();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@sun-asterisk.com',
            'password' => Hash::make('123456'),
        ]);

        User::reguard();
    }
}
