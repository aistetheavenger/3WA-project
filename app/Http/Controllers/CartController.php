<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use App\Order;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index(Request $request)
    {

        $cart = Cart::getCart();
        return view('dishesForUser.cart', compact('cart'));
    }

    public function create()
    {
        $dishes = Order::all();
        return view('dishesForUser.cart', compact('dishes'));
    }


    public function store(Request $request)
    {
        return redirect()->route('dishesForUser.cart');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

        Cart::getCart()->addItem($id, (int)$request->get('quantity'))->save();
        return redirect()->route('cart.index');
    }

    public function destroy(Request $request, $id)
    {
        Cart::getCart()->removeItem($id);
        return redirect()->route('cart.index');

    }
}
