<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /**
         * registry seeders
         * loaction : database/seeders/*.php
         */
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
        ]);

        /* *
         * send random data from factory/factories to database
         * loaction : database/factories/*.php
         */
        User::factory(10)->create();
        Student::factory(27)->create();

    }
}
