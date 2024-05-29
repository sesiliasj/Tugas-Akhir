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
        Schema::create('users_has_courses', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->primary();
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade')->primary();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_has_courses');
    }
};
