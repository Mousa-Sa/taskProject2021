<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price'];

    public function orders(){
        return $this->belongsToMany(Order::class,'orders_products','product_id','order_id')->withTimestamps();
    }
}
