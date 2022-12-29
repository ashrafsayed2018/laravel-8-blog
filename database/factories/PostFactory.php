<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cover_image'  => "https://picsum.photos/1200/350?random=" . mt_rand(1, 55000),
            "title"        => $this->faker->sentence(),
            "slug"         => make_slug($this->faker->sentence()),
            "body"         => $this->faker->paragraph(6),
            'category_id'  => 1,
            'user_id'      => 1,
            'featured'     => 0,
            'published_at' => now(),
            'created_at'   => now(),
            'updated_at'   => now(),


        ];
    }
}
