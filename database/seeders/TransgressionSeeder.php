<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransgressionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transgressions')->insert([
            [
                'name' => 'Tidak Sopan',
                'point' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Tidak Hadir',
                'point' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name' => 'Menyontek saat ujian',
                'point' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //@add more seeder [...],
        ]);
    }
}
