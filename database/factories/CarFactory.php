<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        DB::table('cars')->truncate();

        $price = range(10000, 50000);
        shuffle($price);

        $instock = [true, false];
        shuffle($instock);

        return [
            //
          'name' => ucwords($this->faker->words($nb=3, $asText=true)),
            'description' => $this->faker->paragraph($nb = 2),
          'model' => $this->faker->unique()->numberBetween(2000,5000),
          'founded' => $this->faker->unique()->dateTimeBetween($startDate = '-30 years', $endDate = '-10 years'),
            'price' => $price[0],
            'instock' => $instock[0],
        ];
    }
}
