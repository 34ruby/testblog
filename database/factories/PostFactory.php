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
            'image' => $this->faker->imageUrl(360, 240, 'cats'),
            'user_id' => 1,
            'name' => $this->faker->word(),
            'company' => $this->faker->word(),
            'year' => $this->faker->word(),
            'price' => $this->faker->word(),
            'type' => $this->faker->word(),
            'shape' => $this->faker->word(),
        ];
    }
}
