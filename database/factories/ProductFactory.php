<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->realText(rand(40, 50));
        return [
            'category_id' => rand(1, 2),
            'product_name' => $name,
            'price' => rand(1000, 2000),
        ];
    }
}
