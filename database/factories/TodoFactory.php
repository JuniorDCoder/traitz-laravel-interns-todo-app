<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::first()->id ?? User::factory()->create()->id,
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'is_completed' => fake()->boolean(30), // 30% chance of being completed
            'due_date' => fake()->optional()->dateTimeBetween('now', '+30 days'),
            'priority' => fake()->randomElement(['low', 'medium', 'high']),
        ];
    }
}
