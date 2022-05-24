<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Option::factory(5)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Tag::factory(2)->create();
        \App\Models\Size::factory(3)->create();
        \App\Models\Image::factory(4)->create();
        \App\Models\User::factory(1)->create();
        \App\Models\Product::factory(5)->create();
        \App\Models\Order::factory(1)->create();



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
