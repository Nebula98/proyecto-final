<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_study_plans_table.php
        public function up() {
            Schema::create('study_plans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('program_id')->constrained('programs'); // Relación con programs
                $table->foreignId('course_id')->constrained('courses');   // Relación con courses
                $table->integer('semester');
                $table->string('course_name');
                $table->integer('credits');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_plans');
    }
};
