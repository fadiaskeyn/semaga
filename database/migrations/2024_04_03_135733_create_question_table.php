<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->json('options'); // Menggunakan kolom json untuk menyimpan opsi dalam bentuk array
            $table->unsignedBigInteger('quiz_id'); // Menggunakan kolom unsignedBigInteger untuk kunci luar ke tabel 'quizzes'
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade'); // Membuat kunci luar ke tabel 'quizzes' dengan tindakan penghapusan otomatis (cascade)
            $table->string('correct_answer');
            $table->timestamps(); // Kolom untuk menyimpan waktu pembuatan dan pembaruan record
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question');
    }
};
