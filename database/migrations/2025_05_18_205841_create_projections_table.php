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
        // ¡Elimina la duplicación de Schema::create!
        Schema::create('projections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained('courses');  // Relación con courses
            $table->foreignId('program_id')->constrained('programs');// Relación con programs
            $table->foreignId('user_id')->constrained('users');      // Relación con users
            $table->string('period');
            $table->integer('year');
            $table->integer('groups');
            $table->integer('students_estimated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projections');
    }
};