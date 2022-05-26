<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Option;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\SizeFactory;
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
        Discount::factory(3)->create();
        $this->call(CategoriesSeeder::class);
        $this->call(SizesSeeder::class);
        Tag::factory(2)->create();
        Option::factory(10)->create();
        $this->call(ImageSeeder::class);
        User::factory(2)->create();
        Post::factory(7)->create();




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
