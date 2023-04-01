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
        Schema::create('revise_curriculum', function (Blueprint $table) {
            $table->id();
            $table->integer('curriculum_id');
            $table->decimal('version');
            $table->json('metadata')->default('[]');
            $table->string('department_id');
            $table->string('status')->default('p');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revise_curriculum');
    }
};
