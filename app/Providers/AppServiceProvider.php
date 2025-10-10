<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            // Initialize variables for all views
            $cart = null;
            $cartCount = 0;
            $wishlistCount = 0;
            $cartTotal = 0;

            if (Auth::guard('public_user')->check()) {
                $user = Auth::guard('public_user')->user();

                $cart = Cart::with('items.product')->where('public_user_id', $user->id)->first();

                if ($cart) {
                    $cartCount = $cart->items->sum('quantity');

                    foreach ($cart->items as $item) {
                        $price = $item->product->selling_price;

                        if ($item->product->product_discount > 0) {
                            $price -= ($price * $item->product->product_discount) / 100;
                        }

                        $cartTotal += $price * $item->quantity;
                    }
                }

                $wishlistCount = Wishlist::where('public_user_id', $user->id)->count();
            }

            $view->with([
                'cart' => $cart,
                'cartCount' => $cartCount,
                'wishlistCount' => $wishlistCount,
                'cartTotal' => $cartTotal,
            ]);
        });

        View::composer('*', function ($view) {
            $view->with('header_categories', Category::all());
        });
    }
}
