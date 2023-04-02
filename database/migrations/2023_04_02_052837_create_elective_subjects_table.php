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
        Schema::create('elective_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('track')->unique();
            $table->string('elective_1')->unique();
            $table->string('elective_2')->unique();
            $table->string('elective_3')->unique();
            $table->string('elective_4')->unique();
            $table->string('elective_5')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elective_subjects');
    }
};
