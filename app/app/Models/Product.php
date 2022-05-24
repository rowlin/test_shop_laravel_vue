<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'code' , 'description' , 'category_id' , 'status' , 'price' ,  'available_count'];




}
