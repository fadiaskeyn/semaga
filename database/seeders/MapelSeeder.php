<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mapels')->insert([
            ["mapel" => "Bahasa indonesia"],
            ["mapel" => "Bahasa Inggris"],
            ["mapel" => "Kimia"],
            ["mapel" => "Biologi"],
            ["mapel" => "Matematika"],

        ]);
    }
}
