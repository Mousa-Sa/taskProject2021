<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['name','number','customer_id'];

    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
    public function products(){
        return $this->belongsToMany(Product::class,'orders_products','order_id','product_id')->withTimestamps();
    }
}
