<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curriculum;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory(6)
            ->hasProfile(1)
            ->create();

        Department::factory(2)
            ->hasCurriculums(1)
            ->create();


        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 1,
            'year_level' => 1,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 1,
            'year_level' => 2,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 1,
            'year_level' => 3,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 1,
            'year_level' => 4,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 2,
            'year_level' => 1,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 2,
            'year_level' => 2,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 2,
            'year_level' => 3,
        ]);

        \App\Models\CurriculumLevel::factory()->create([
            'curriculum_id' => 2,
            'year_level' => 4,
        ]);


        // $dep->curriculums()->createMany(
        //     Curriculum::factory(3)->make()->toArray()
        // );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
