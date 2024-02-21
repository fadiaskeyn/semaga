<?php

namespace Database\Seeders;

namespace Database\Seeders;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class students extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
Student::factory(5)->create();
    }
}
