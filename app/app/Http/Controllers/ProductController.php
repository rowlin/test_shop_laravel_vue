<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;


class ProductController extends Controller
{

    protected function getProducts(){
        return  Product::where('status' , 1);
    }

    public function index(){
        $products =  $this->getProducts()->paginate(6);
        return view('main.index' , compact('products') );
    }

    public function show(Product $product){
        return view('main.show' , compact('product'));
    }

    public function get_list(ProductRequest $request){
        return Product::where('status' , 1)->when($request->has('orderBy') , function (Builder $q) use ($request){
            $q->orderBy($request->get('orderBy') , 'DESC');
        })->paginate($request->has('perPage') ? $request->get('curPage') : 6);
    }




}
