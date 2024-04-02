<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Transgression;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            TransgressionSeeder::class,
        ]);

        User::factory(5)->create();
        Student::factory(3)->create();
        // @ this factory if you want random transgression
        // already have factory
        // Transgression::factory(5)->create();

    }
}
