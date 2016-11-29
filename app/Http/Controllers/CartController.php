<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Dish;
use App\Order;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        return redirect()->route('dishesForUser.cart');

        // request produkto ID
        // sesijoje reikia krepselio masyvo
        // produkto ID -> krepselio sessijos masyvas

        // redirect -> cart items list (cart@index)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
