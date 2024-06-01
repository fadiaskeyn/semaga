<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Quiz;
use Carbon\Carbon;

class QuizTest extends TestCase
{
    /** @test */
    public function it_updates_status_to_active_when_start_time_has_passed()
    {
        // Buat objek Quiz dengan waktu mulai yang sudah lewat (misalnya, satu jam yang lalu)
        $quiz = Quiz::create([
            'title' => 'Quiz Test',
            'code_quiz' => 'Q123',
            'create_by' => 'John Doe',
            'quiz_date' => Carbon::now()->toDateString(), // Tanggal hari ini
            'start' => '23:51:00', // Waktu mulai
            'end' => '00:01:00', // Waktu selesai
            'status' => 'off', // Status awal "off"
        ]);

        // Pastikan status awal adalah 'off'
        $this->assertEquals('off', $quiz->status);

        // Panggil metode checkAndUpdateStatus
        $quiz->checkAndUpdateStatus();

        // Pastikan status telah diubah menjadi 'active'
        $this->assertEquals('active', $quiz->fresh()->status);
    }
}
