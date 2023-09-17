<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'price',
        'status',
        'date',
    ];

      //user-one-to-many-relation
      public function user()
      {
          return $this->belongsTo(User::class);
      }

        //order many to many relation with product

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
