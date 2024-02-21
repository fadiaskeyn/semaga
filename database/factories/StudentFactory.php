<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name' => $this->faker->name,
            'nis' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'grade' => $this->faker->randomElement(['10', '11', '12']),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'major_id' => $this->faker->numberBetween(1, 10),
            'exam_id' => $this->faker->numberBetween(1, 5),
        ];
    }
}
