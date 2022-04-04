<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(20)->create();
        \App\Models\Task::factory(25)->create();
        \App\Models\Car::factory(30)->create();
        \App\Models\Post::factory(100)->create();
        // \App\Models\People::factory(35)->create();
    }
}
