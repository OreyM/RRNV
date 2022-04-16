<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition()
    {
        $productName = $this->faker->word();

        return [
            'name'              => $productName,
            'alias'             => \Str::slug($productName),
            'quantity'          => $this->faker->numberBetween(99, 999),
            'stock_status_id'   => 1,
            'image'             => null,
            'manufacturer_id'   => 1,
            'price'             => $this->faker->randomFloat(2, 99, 9999),
            'reward_points'     => null,
            'minimum'           => $this->faker->numberBetween(1, 10),
            'is_active'         => $this->faker->boolean(),
        ];
    }

}
