<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'email' => fake()->safeEmail,
            'tin_number' => fake()->sentence(1),
            'address' => fake()->sentence(1),
            'phone_number' => fake()->sentence(1),
            'company_name' => fake()->sentence(1),
        ];
    }
}
