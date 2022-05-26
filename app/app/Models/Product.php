<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'code' , 'description' , 'category_id' , 'status' , 'price' ,  'available_count' , 'discount_id'];

    protected $with = ['images' , 'discount'];
    //'categories' , 'tags', 'options' , 'categories'

    public function images(){
        return $this->hasMany(Image::class ,'product_id' );
    }

    public function categories(){
        return $this->belongsToMany(Category::class , 'pivot_category_product' , 'product_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class , 'pivot_tag_product', 'product_id'  );
    }

    public function options(){
        return $this->belongsToMany(Tag::class , 'pivot_options_product', 'product_id' , 'option_id' );
    }

    public function size(){
        return $this->belongsToMany(Size::class, 'pivot_size_product');
    }

    public function discount(){
        return $this->belongsTo(Discount::class);
    }



}
