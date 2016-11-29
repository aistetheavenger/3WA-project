<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('dishesCRUD.orders', compact('orders'));
        
    }

    public function userIndex(){

        $orders=Order::where('user_id', Auth::user()->id)->get();
        return view('dishesForUser.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart =Cart::getCart();
        $order= new Order();
        $order->user_id = Auth::user()->id;
        $order->total=$cart->getTotal();
        $order->save();

        foreach ($cart->getProducts() as $product) {
            $order->dishes()->attach(
                $product->id, 
                [
                    'price'=>$product->price, 
                    'quantity'=>$cart->get($product->id)
                ]
            );
        }

        $cart->destroy();
        return redirect()->route('user.orders');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Order::destroy($id);
        return redirect()->route('orders.index');
    }
}
