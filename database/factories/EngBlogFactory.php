<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EngBlog>
 */
class EngBlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'=> $this->faker->unique()->slug(),
            'title'=> $this->faker->title(),
            'intro'=>$this->faker->text(),
            'body'=>$this->faker->paragraph(),
        ];
    }
}
