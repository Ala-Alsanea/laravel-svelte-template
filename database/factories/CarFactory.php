<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'model' => fake()->name(),
            // 'brand' => fake()->name(),
            'description' => fake()->sentence(20),
            'price' => fake()->numberBetween(3000, 20000),
            // 'color' => fake()->colorName(),
            'color_id' => Color::find(rand(1, 10))->id,
            'brand_id' => Brand::find(rand(1, 10))->id,
            'year' => fake()->year(),


            //
        ];
    }
}