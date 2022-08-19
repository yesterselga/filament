<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
     /**
      * Define the model's default state.
      *
      * @return array<string, mixed>
      */

     protected $model = Product::class;

     public function definition()
     {
          return [
               'brand_id' => 1,
               'name' => fake()->name(),
               'description' => fake()->text(),
               'category' => 1,
               'tags' => fake()->colorName(),
               'photo' => fake()->image(),
          ];
     }
}
