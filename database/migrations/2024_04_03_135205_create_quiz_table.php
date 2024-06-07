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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('code_quiz')->nullable();
            $table->date('quiz_date')->nullable();
            $table->string('course')->nullable();
            $table->time('start')->nullable();
            $table->time('end')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['active', 'off'])->default('off');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('quizzes');
        Schema::enableForeignKeyConstraints();
    }
};
