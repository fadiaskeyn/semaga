<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class exams extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('exams')->insert([
        ['title' => 'Ujian MTK Coy', 'date' => now()],
    ]);
    DB::table('exams')->insert(['title' => 'Ujian Bahasa coy', 'date'=>now(),]);
    DB::table('exams')->insert(['title' => 'Ujian IPS coy', 'date'=>now(),]);
}

}
