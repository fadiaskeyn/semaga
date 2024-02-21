<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('nis')->nullable();
            $table->string('grade')->nullable();
            $table->enum('gender', ['L','P'])->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->userCurrent();
            $table->string('password');
            $table->foreignId('major_id')->constrained('majors')->nullable();
            $table->foreignId('exam_id')->constrained('exams')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     Schema::dropIfExists('students');
    }
};
