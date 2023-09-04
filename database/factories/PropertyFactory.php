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
        $rooms = $this->faker->numberBetween(1,9);
        return [
            'description' => $this->faker->sentence(6,true),
            'surface' => $this->faker->numberBetween(20, 350),
            'rooms' => $rooms,
            'bedrooms' => $this->faker->numberBetween(1,$rooms),
            'floor' => $this->faker->numberBetween(1,9),
            'city' => $this->faker->city,
            'address' => $this->faker->address,
            'title' => $this->faker->sentence(4,true),
            'sold' => false,
            'price' => $this->faker->numberBetween(10000,100000),
            'postal_code' => $this->faker->postcode()

        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
