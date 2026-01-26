<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Printer>
 */
class PrinterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entrydate' => $this->faker->dateTime(),
            'BOL' => $this->faker->bothify('######'),
            'serial' => $this->faker->bothify('##########'),
            'slp' => $this->faker->bothify('##########'),
            'sku' => $this->faker->bothify('#########'),
            'condition' => $this->faker->randomElement(['STOCK', 'RESERVED', 'RECEIVED', 'SOLD']),
            'location' => $this->faker->city(),
            'verified_at' => null,
            'reserved_at' => null,
            'sold_at' => null,
        ];
    }

    public function stocked(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => 'STOCK',
        ]);
    }

    public function reserved(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => 'RESERVED',
        ]);
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'condition' => 'SOLD',
        ]);
    }

    public function verified(): static
    {
        return $this->state(fn (array $attributes) => [
            'verified_at' => $this->faker->dateTime(),
        ]);
    }
}