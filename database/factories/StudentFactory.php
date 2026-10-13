<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => fake()->name(),
            'registration_number' => fake()->unique()->numerify('2026####'),
            'class_name' => fake()->randomElement(['1º A', '2º A', '3º B', '4º A', '5º B']),
            'guardian_name' => fake()->name(),
            'guardian_phone' => fake()->numerify('(##) 9####-####'),
            'status' => 'active',
            'enrolled_at' => fake()->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
        ];
    }
}
