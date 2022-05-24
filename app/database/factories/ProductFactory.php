<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
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
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'code' => Str::random(10),
            'description' => $this->faker->text,
            'price' => rand(50, 1000),
            'category_id' => function (){
             return Category::first()->id ?? Category::factory(1)->create()->id;
            },
            'available_count' => rand(10 , 100),
            'status'=> true//active
        ];
    }
}
