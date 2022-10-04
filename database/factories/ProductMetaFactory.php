<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductMetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'product_id' => $this->faker->randomDigit,
            'meta_key' => $this->faker->word,
            'meta_value' => $this->faker->word,
        ];
    }
}
