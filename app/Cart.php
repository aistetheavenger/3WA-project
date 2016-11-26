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

    public static function getCart(){
        return session('cart', new Cart());
    }

    public static function getTotal(){
        $quantities = static::getCart()->getItems();
        $ids = array_keys($quantities);
        $dishes = Dish::whereIn('id', $ids)->get();
        $total = 0;

        foreach($dishes as $dish){
            $total += $quantities[$dish->id] * $dish->price;
        }
        $total = number_format($total, 2);
        

    }
        public  function save(){
        session()->put('cart', $this);
        session()->save();
        return $this;
    }
}
