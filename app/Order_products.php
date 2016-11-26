<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    protected $fillable = [
        'id', 'order_id', 'product_id', 'quantity', 'price'
    ];

    public function products()
    {
        return $this->belongsTo('App\Order');
    }

        public function dish()
    {
        return $this->belongsTo('App\Dish');
    }
}