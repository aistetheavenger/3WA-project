<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable = [
        'id', 'title', 'photo', 'description', 'price',
    ];

    public function getPhotoUrl(){

        return asset('uploads/' . $this->photo);
    }
}


