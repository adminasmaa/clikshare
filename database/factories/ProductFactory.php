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
        return [
            'category_id'        => $this->faker->numberBetween(1, 20),
            'name'               => $this->faker->text(60),
            'description'        => $this->faker->paragraph(),
            'price'              => $this->faker->numberBetween(1000, 20000),
            'manage_stock'       => false,
            'in_stock'           => $this->faker->boolean(),
            'sku'                => $this->faker->word(),
            'qty'                => $this->faker->numberBetween(100,1000),
            'status'             => $this->faker->numberBetween(1,3),
            'created_by'         => auth()->user()->id ?? 5,
            'created_on'         => now()->toDateTimeString(),
        ];
    }
}
