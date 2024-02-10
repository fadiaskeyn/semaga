<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    DB::table('users')->insert([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('admin123')
     ]);
    }
}
