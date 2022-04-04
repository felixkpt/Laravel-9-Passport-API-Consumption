<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        DB::table('posts')->truncate();
        // var_dump(asset(''));die;
        $images = [];
        $uri = 'uploads/images/products/';
        for ($i=1;$i <= 22; $i++){
            $images[] = $uri.'digital_'.$i.'.jpg';
        }
        for ($i=1;$i <= 10; $i++){
        $images[] = $uri.'fashion_'.$i.'.jpg';
        }
        for ($i=1;$i <= 9; $i++){
            $images[] = $uri.'furniture_'.$i.'.jpg';
        }
        for ($i=1;$i <= 10; $i++){
            $images[] = $uri.'kidtoy_'.$i.'.jpg';
        }

        $title = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
        $slug = Str::of($title)->slug('-')->value;
        $content = $this->faker->paragraphs($nb = 3, $asText = false);
        $content = '<p class="px-1">'.implode('</p>
        <p>', $content).'</p>';

        $arr = ['post', 'page'];
        $k = array_rand($arr, 1);
        $post_type = $arr[$k];
        
        return ['title' => $title, 
            'slug' => $slug,
            'content' => $content, 
            'featured_image' => asset($this->faker->randomElement($images)), 
            'user_id' => $this->faker->numberBetween(1, 20), 
            'post_type' => $post_type,
        ];

    }
}
