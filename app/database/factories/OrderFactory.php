<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    protected $product ;
    protected $count;

    protected function getProduct()
    {
        $this->product =  Product::all()->random(1) ?? Product::factory(1)->create();
        $this->count = rand(1, 10);
        return $this->product;
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id', function(){
                return $this->getProduct()->id();
            },
            'count' => $this->count,
            'was_paid' => rand(0 , 1) ,
            'amount' => function(){
                return $this->product->price + $this->count;
            } ,
            'user_id' => function (){
                return User::all()->random(1)->id ?? User::factory(1)->create()->id;
            },
            'status' => rand(0 ,3),
            'info' => $this->faker->text
        ];
    }
}
