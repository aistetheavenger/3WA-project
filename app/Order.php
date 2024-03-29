<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'id', 'user_id', 'total'
    ];

        public function user()
    {
        return $this->belongsTo('App\User');
    }

        public function dishes()
    {
        return $this->belongsToMany('App\Dish')->withPivot('id', 'price', 'quantity');
    }
}





