<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'descreption',
        'price',
        'stock',
        'image',
        'status',
        'category_id',
    ];


    //category-one-to-many-relation
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    //product many to many relation with order

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

     //product many to many relation with cart

     public function carts()
     {
         return $this->belongsToMany(Cart::class);
     }
}
