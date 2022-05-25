<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizesSeeder extends Seeder
{
    protected function availableSize(){
        return ['XS', 'S' , 'M' , 'L' , 'XL' , 'XXL'];
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->availableSize() as $size) {
            Size::factory($size)->create();
        }
    }
}
