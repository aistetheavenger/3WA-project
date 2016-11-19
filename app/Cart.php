<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

   protected $items=[];

    public function addItem($dishId $quantity){
        if (array_key_exists($dishId, $this->items)){
            $this->items[$dishId] +=$quantity;
        }else{
            $this->items[$dishId] =$quantity;
        }
    }

    public function getItems(){
        return $this->items;
    }
}
