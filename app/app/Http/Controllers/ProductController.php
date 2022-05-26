<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected function getProducts(){
        return  Product::where('status' , 1)->paginate(6);
    }

    public function index(){
        $products =  $this->getProducts();
        return view('main.index' , compact('products') );
    }

    public function show(Product $product){
        return view('main.show' , compact('product'));
    }

    public function getList(){


    }

}
