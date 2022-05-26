<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Discount;
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
            'name' => $this->faker->firstNameFemale() . " dress",
            'code' => Str::random(10),
            'description' => $this->faker->text,
            'price' => rand(50 , 100),
            'discount_id' => null ,//Discount::all()->random()->id ,
            'available_count' => rand(10 , 100),
            'status'=> true//active
        ];
    }
}
