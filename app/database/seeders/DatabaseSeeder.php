<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Option;
use App\Models\Tag;
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
        $this->call(CategoriesSeeder::class);
        $this->call(SizesSeeder::class);
        Tag::factory(10)->create();
        Option::factory(30)->create();
        $this->call(ImageSeeder::class);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
