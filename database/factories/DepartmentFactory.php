<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departmentCode = $this->faker->randomElement(['bsit', 'blis']);
        $desc = $departmentCode ==  'bsit' ? 'Bachelor of Science in Information and Technology' : 'Bachelor in Libray in Information System';

        return [
            'department_code' => $departmentCode,
            'description' => $desc
        ];
    }
}
