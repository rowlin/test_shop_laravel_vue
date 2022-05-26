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
        $colors = ['red' , 'green' ];
        $array = ['Out of stock' , null , "{$procent}% Off" ];
        return [
            'procent' => $procent,
            'message' => $array[rand(0 , sizeof($array)-1)],
            'position' => rand(0 ,1),
            'color' => $colors[rand(0 , sizeof($colors)-1)]
        ];
    }
}
