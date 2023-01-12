<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'login' => 'admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'name' => 'Admin',
            'password' => bcrypt('admin@123')
        ]);
    }
}
