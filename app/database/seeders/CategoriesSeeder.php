<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    protected function availableCategories(){
        return ["Dress" , "Woman" , "A-line", "Apron", "Asymmetrical" ,"Basic" , "Bodycon"];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->availableCategories() as $c){
            Category::factory(['name' => $c])->create();
        }

    }
}
