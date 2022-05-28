<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{

    protected function getResult($cache){
        $data = [];
        foreach ($cache as $key => $count){
            $product =  Product::where('id' , $key)->with('firstImage', 'discount')->without('images')->first();
            $data[$key] =  $product;
            //'id', 'name','code' , 'firstImages' ,'price'
            $data[$key]['count'] = $count;
            $data[$key]['price_total'] = (($product->price_with_discount > 0) ? $product->price_with_discount : $product->price) * $count;
        }
        return $data;
    }

    public function get(Request $request){
        $cache = Cache::get($request->get('cache'));
        return $cache ? $this->getResult($cache) : [];
    }

    public function delete(Request $request){
        $cache = Cache::get($request->get('cache')); //pull retrives the value and removes it
        if($cache) {
            unset($cache[$request->id]);
            Cache::put($request->get('cache'), $cache, 60);
        }
        return $this->get($request);
    }

    public function put(Request $request){
        if(Cache::has($request->get('cache'))){
            $data = Cache::get($request->get('cache'));
            $data[$request->get('product')] = $request->get('count');
            Cache::put($request->get('cache') , $data   , 20 *60 *60 );
        }else
            Cache::put($request->get('cache') , [$request->get('product') => $request->get('count')]  , 20 *60 *60);

        return $this->get($request);
    }

}
