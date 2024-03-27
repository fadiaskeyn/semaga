<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([

            'nis' => '0123456789',
            'name' => 'Abubakar',
            'grade' => 'XII',
            'gender' => 'L',
            'email' => 'abubakar@gmail.com',
            'password' => Hash::make('password'),
        ]);

    }
}
