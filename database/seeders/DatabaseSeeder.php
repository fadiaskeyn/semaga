<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Database\Seeders\MapelSeeder;

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
            MapelSeeder::class
        ]);

        /* *
         * send random data from factory/factories to database
         * loaction : database/factories/*.php
         */
        User::factory(10)->create();
        Student::factory(27)->create();
    }
}
