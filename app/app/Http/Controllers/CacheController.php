<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function get(Request $request){
        $cache = Cache::get($request->get('cache'));
        $data = [];
        foreach ($cache as $key => $count){
           $data[$key] =  Product::where('id' , $key)->with('firstImage', 'discount')->without('images')->first();
           //'id', 'name','code' , 'firstImages' ,'price'
           $data[$key]['count'] = $count;
        }
        return $data;

    }

    public function delete(Request $request){
        return Cache::forget($request->get('cache'));
    }

    public function put(Request $request){
        if(Cache::has($request->get('cache'))){
            $data = Cache::get($request->get('cache'));
            $data[$request->get('product')] = $request->get('count');
           $res =  Cache::put($request->get('cache') , $data   , 20 *60 *60 );
        }else
           $res = Cache::put($request->get('cache') , [$request->get('product') => $request->get('count')]  , 20 *60 *60);
        return $res;
    }

}
