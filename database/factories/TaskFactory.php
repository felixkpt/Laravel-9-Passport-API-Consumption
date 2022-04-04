<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        DB::table('tasks')->truncate();

        $reminder = [true, false];
        shuffle($reminder);
        
        $days = [];
        for($i=1; $i<=50; $i++) {
            $days[] = date('Y-m-d H:i', strtotime("+$i days"));
        }

        shuffle($days);
        $day = $days[0];

        return [
            'text' => ucwords($this->faker->words($nb=3, $asText=true)),
            'day' => $day,
            'reminder' => $reminder[0],
        ];
    }
}
