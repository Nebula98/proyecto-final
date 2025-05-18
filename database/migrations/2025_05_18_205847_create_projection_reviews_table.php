<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_create_projection_reviews_table.php
        public function up() {
            Schema::create('projection_reviews', function (Blueprint $table) {
                $table->id();
                $table->foreignId('projection_id')->constrained('projections'); // Relación con projections
                $table->foreignId('reviewed_by')->constrained('users');         // Relación con users (revisor)
                $table->text('comments');
                $table->enum('status', ['pending', 'approved', 'rejected']);
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projection_reviews');
    }
};
