<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products =  Product::where('status' , 1)->paginate(6);

        return view('main.index' , compact('products') );
    }

    public function show(Product $product){
        return view('main.show' , compact('product'));
    }

}
