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

        $cart = $request->session()->get('cart', new Cart());
        $quantities = $cart->getItems();
        $ids = array_keys($quantities);
        $dishes = Dish::whereIn('id', $ids)->get();

        // suskaiciuoti totalus- each per dishus price*quantity

       // foreach ($dishes as $total){
       //      $total-> $price->price
       //     $total = $quantities*price
       // }

        //     foreach($dishes as $dish)
 
        // $quantities[$dish->id]
        // $dish->price 
        // $totals =($quantities[$dish->id]) * ($dish->price)

        // endforeach

        // return view
        // -> dishes
        // -> quantities
        // -> totalus
        // ne all, o tuos kurie yra sesijoje

        return view('dishesForUser.cart', compact('dishes', 'quantities'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        $item = $request->all();
        $dish = Dish::find($id);
        $quantity = (int)$request->get('quantity');

        $cart = $request->session()->get('cart', new Cart());

        $cart->addItem($dish->id, $quantity);

        $request->session()->put('cart', $cart);
        $request->session()->save();

        return redirect()->route('cart.index');
    }


    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('cart', new Cart());
        $cart->forget($id);

        $request->session()->put('cart', $cart);
        $request->session()->save();

        return redirect()->route('cart.index');

    }
}
