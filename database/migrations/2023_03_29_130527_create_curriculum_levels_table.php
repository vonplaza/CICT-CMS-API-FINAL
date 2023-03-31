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
        Schema::create('curriculum_levels', function (Blueprint $table) {
            $table->id();
            $table->integer('curriculum_id');
            $table->integer('year_level');
            $table->string('status')->default('a');
            $table->decimal('version')->default(1.0);
            $table->json('metadata')->default('{}');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum_levels');
    }
};
