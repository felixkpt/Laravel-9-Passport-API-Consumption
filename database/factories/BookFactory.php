<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => ucwords(implode(" ", $this->faker->words($nb=3, $asText = false))),
            'price' => $this->faker->numberBetween(500, 5000),
            'copies_sold' => $this->faker->numberBetween(1000, 50000),
            'user_id' => auth()->user()->id
        ];
    }
}
