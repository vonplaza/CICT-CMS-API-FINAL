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
        Schema::create('curriculum_subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->integer('curriculum_level_id');
            $table->integer('subject_id');
            $table->integer('corereq_id');
            $table->integer('prereq_id');
            $table->decimal('units')->default(0);
            $table->decimal('lecture_units')->default(0);
            $table->decimal('lab_units')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_subjects');
    }
};
