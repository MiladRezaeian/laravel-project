<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use faker

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $factory->define(Article::class, function (Faker $faker) {
            return [
                'title' => $faker->text(50),
                'slug' => $faker->slug(),
                'body' => $faker->paragraph(rand(5,20))
            ];
        });
    }
}



