<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
     /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
     {
          Category::query()->create(['name' => 'Chicken', 'description' => 'Chicken',])->save();
          Category::query()->create(['name' => 'Pork', 'description' => 'Pork',])->save();
          Category::query()->create(['name' => 'Beef', 'description' => 'Beef',])->save();
          Category::query()->create(['name' => 'Veggies', 'description' => 'Veggies',])->save();
          Category::query()->create(['name' => 'Dessert', 'description' => 'Dessert',])->save();
          Category::query()->create(['name' => 'Drinks', 'description' => 'Drinks',])->save();
          Category::query()->create(['name' => 'Coffee', 'description' => 'Coffee',])->save();
     }
}
