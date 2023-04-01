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
        Schema::create('old_curriculum', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('version');
            $table->json('metadata')->default('[]');
            $table->integer('curriculum_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('old_curriculum');
    }
};
