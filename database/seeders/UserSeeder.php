<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            //Admin

            [
                'nip' => '000000000012345678',
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '08989000301',
                'address' => 'Mastrip V 41',
                'role' => 'admin',
            ],

            // User
            [
                'nip' => '000000000087654321',
                'name' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'phone' => '08989000301',
                'address' => 'Tegal Besar V 41',
                'role' => 'user',
            ],
        ]);
    }
}
