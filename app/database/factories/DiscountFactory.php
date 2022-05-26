<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discount>
 */
class DiscountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $procent = rand(10 , 30);
        $array = ['Out of stock' , null , "{$procent} Off" ];
        return [
            'procent' => $procent,
            'massage' => $array[rand(0 , sizeof($array))]
        ];
    }
}
