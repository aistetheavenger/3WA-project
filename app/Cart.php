<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Cart extends Collection
{
    public function addItem($dishId, $quantity){
        if (array_key_exists($dishId, $this->items)){
            $this->items[$dishId] +=$quantity;
        }else{
            $this->items[$dishId] =$quantity;
        }

        return $this;
    }

    public static function getCart(){
        return session('cart', new Cart());
    }

        public function getProducts(){
        $dishes = Dish::whereIn('id', $this->keys())->get();

        return $dishes;
    }

    public  function getTotal(){
        $dishes = $this->getProducts();
        $total = 0;
        foreach($dishes as $dish){
            $total += $this->get($dish->id) * $dish->price;
        }
        $total = number_format($total, 2);
        return $total;
    }

    public  function getTotalTax(){
        $dishes = $this->getProducts();
        $total = 0;
        foreach($dishes as $dish){
            $total +=  $this->get($dish->id) * $dish->getSalePrice();
        }
        
        return $total;
    }

    public function removeItem($id){
        $this->forget($id)->save();
    }

        public  function save(){
        session()->put('cart', $this);
        session()->save();
        return $this;
    }

    public function destroy(){
        $this->items=[];
        $this->save();
    }
}
