<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
          $services = ['Web Development','Mobile Application Development','IT Support','Web Hosting'];
        return [
            'name' => $this->faker->randomElement($services),
            'description' => fake()->sentence(1),
            'price' => '2000',
        ];
    }
}
