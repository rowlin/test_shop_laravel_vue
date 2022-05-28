<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Image;
use App\Models\Size;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{

    protected function imageLinks(): array{
        return [
            '1' => [
                'https://imgcdn.loverepublic.ru/upload/images/22540/2254007506_65.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22540/2254007506_65_1.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22540/thumb/600_9999/2254007506_65_2.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22540/thumb/600_9999/2254007506_65_4.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22540/thumb/600_9999/2254007506_65_5.jpg'
            ],
            '2' => [
                'https://imgcdn.loverepublic.ru/upload/images/22552/thumb/600_9999/2255263585_50.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22552/thumb/600_9999/2255263585_50_1.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22552/thumb/600_9999/2255263585_50_2.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22552/thumb/600_9999/2255263585_50_4.jpg',
                'https://imgcdn.loverepublic.ru/upload/images/22552/thumb/600_9999/2255263585_50_5.jpg'
            ],
            '3' => [
                'https://toptop.ru/system/item_images/attachments/000/138/624/w448v1/1393.jpg',
                'https://toptop.ru/system/items/covers/bdc/cbe/b7-/w448v1/2008723066783.jpg'
            ],
            '4' => [
                'https://toptop.ru/system/items/covers/620/4c8/36-/w448v1/2008723069791.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/681/w448v1/2344.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/682/w448v1/2353-2.jpg'
            ],
            '5' => [
                'https://toptop.ru/system/item_images/attachments/000/138/003/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B9%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B00560-2.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/002/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B9%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B00601-2.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/004/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B9%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B00603-2.jpg?',
                'https://toptop.ru/system/item_images/attachments/000/138/001/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B9%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B00552-2.jpg'
            ],
            '6' => [
                'https://toptop.ru/system/item_images/attachments/000/137/973/w448v1/2008723056098.jpg',
                'https://toptop.ru/system/item_images/attachments/000/137/972/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B01561.jpg',
                'https://toptop.ru/system/item_images/attachments/000/137/976/w448v1/12.04.22_%D0%9A%D0%B0%D1%82%D0%B0%D0%BB%D0%BE%D0%B3_%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%9D%D0%B8%D0%BA%D0%B8%D1%82%D0%B01604.jpg',
                'https://toptop.ru/system/item_images/attachments/000/137/975/w448v1/2008723056098.jpg',
                'https://toptop.ru/system/item_images/attachments/000/137/658/w448v1/2008723056098.jpg',
                'https://toptop.ru/system/item_images/attachments/000/137/793/w448v1/13226-2.jpg?1649860912',
                'https://toptop.ru/system/item_images/attachments/000/137/795/w448v1/13203-2.jpg'
            ],
            '7' => [
                'https://toptop.ru/system/item_images/attachments/000/138/594/w448v1/1_46.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/593/w448v1/1_11-4.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/595/w448v1/1_29.jpg?1653303125',
                'https://toptop.ru/system/item_images/attachments/000/138/596/w448v1/1_17.jpg?1653303126',
                'https://toptop.ru/system/item_images/attachments/000/138/592/w448v1/1_16.jpg?1653303125'
            ],
            '8' => [
                'https://toptop.ru/system/items/covers/aee/915/32-/w448v1/2008723055077.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/277/w448v1/%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%B8_%D0%A2%D0%B0%D0%B1%D1%83_%2816-04-22%290153_1.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/276/w448v1/%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%B8_%D0%A2%D0%B0%D0%B1%D1%83_%2816-04-22%290128_1.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/274/w448v1/%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%B8_%D0%A2%D0%B0%D0%B1%D1%83_%2816-04-22%290163.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/278/w448v1/%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%B8_%D0%A2%D0%B0%D0%B1%D1%83_%2816-04-22%290140_1.jpg',
                'https://toptop.ru/system/item_images/attachments/000/138/275/w448v1/%D0%94%D0%B6%D0%B5%D0%B8%CC%86%D0%BD_%D0%B8_%D0%A2%D0%B0%D0%B1%D1%83_%2816-04-22%290159_1.jpg'
            ],
        ];

    }

    protected function getImage(string $url) : string{
        header("Content-Type: image/jpeg");
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.1 Safari/537.11');
        $res = curl_exec($ch);
        $rescode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($rescode !== 200){
            var_dump($rescode);
        }
        return  $res;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->imageLinks() as $cc => $images) {
            $product = \App\Models\Product::factory(1)
                ->hasOptions(rand(3, 9))
                ->create();
            $product =  $product->first();
            $product->categories()->attach([ Category::all()->random()->id]);
            $product->tags()->attach([ Tag::all()->random()->id]);
            $product->size()->attach([ Size::all()->random()->id]);
            if($cc % 2 === 1){
                $product->discount_id = Discount::all()->random()->id;
                $product->save();
            }

            foreach ($images as $count => $link) {
                $product_id = $product->id;
                $res = $this->getImage($link);
                $path = '/images/' . $product_id . '/' .$count.'.jpg' ;
                Storage::put($path , $res );
                Image::factory(['path' => $path , 'product_id' => $product_id])->create();
            }
        }
    }
}
