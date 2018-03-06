<?php

namespace App\Providers;

use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use App\ProductType;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $type_product = ProductType::all();
            $view->with(['type_product' => $type_product]);
        });
        view()->composer('header',function($view){
            if (Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with(['cart' => $cart,'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,'totalQty'=> $cart->totalQty]);
            }
        });
        view()->composer('pages.dat_hang',function($view){
            if(Session('cart')){
                $cart = Session::get('cart');
                $view->with(['cart' => $cart,'product_cart' => $cart->items,
                    'totalPrice' => $cart->totalPrice,'totalQty'=> $cart->totalQty]);
            }
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
