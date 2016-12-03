<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', function($view){
            $cart=session()->get('cart', new Cart());
            $cartCount= $cart->count();
            $view->with(compact( 'cartCount'));
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
