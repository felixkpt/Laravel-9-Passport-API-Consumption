<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\People>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        DB::table('posts')->truncate();

        return  ['name' => $this->faker->name($nb=2, $asText=false),
        'gender' => (new class{function dsds() {$arr = ['male', 'female']; shuffle($arr); return $arr[0];}})->dsds(),
        'dob' => $this->faker->dateTimeBetween($startDate = '-40 years', $endDate = '-10 years'),
        'county' => implode(" ", $this->faker->words($nb=3, $asText=false)),
        'hobby' => implode(", ", $this->faker->words($nb=5, $asText=false)),
        'about' => "<p>".implode('</p>
        <p class="blockquote border border-3 border-info">', $this->faker->paragraphs($nb=3, $asText=false))."</p>",
        ];
    }
}
