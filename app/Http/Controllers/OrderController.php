<?php

namespace App\Http\Controllers;


use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('dishesCRUD.orders', compact('orders'));
    }

    public function userIndex(){

        $orders=Order::where('user_id', Auth::user()->id)->get();
        return view('dishesForUser.orders', compact('orders'));
    }

    public function create()
    {
        //
    }

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
        //
    }


    public function destroy($id)
    {
        Order::destroy($id);
        return redirect()->route('orders.index');
    }
}
