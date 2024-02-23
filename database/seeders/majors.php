<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class majors extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majors')->insert([
            ['name' => 'Bahasa Indonesia'],
            ['name' => 'Matematika'],
            ['name' => 'Bahasa Cicak'],
        ]
    );
    }
}
