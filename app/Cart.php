<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Cart extends Collection
{
   protected $items=[];

    /**
     * @param $dishId
     * @param $quantity
     */
    public function addItem($dishId, $quantity){
        if (array_key_exists($dishId, $this->items)){
            $this->items[$dishId] +=$quantity;
        }else{
            $this->items[$dishId] =$quantity;
        }
    }

    /**
     * @return array
     */
    public function getItems(){
        return $this->items;

    }
}
