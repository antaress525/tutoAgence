<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(5, true),
            'description' => $this->faker->sentences(4, true),
            'surface' => $this->faker->numberBetween(40, 400),
            'price' => $this->faker->numberBetween(4500, 10000),
            'floor' => $this->faker->numberBetween(0, 20),
            'room' => $this->faker->numberBetween(1, 4),
            'piece' => $this->faker->numberBetween(1, 4),
            'city' => $this->faker->city(),
            'adress' => $this->faker->address(),
            'postal_code' => $this->faker->postcode(),
            'sold'=> false,
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
