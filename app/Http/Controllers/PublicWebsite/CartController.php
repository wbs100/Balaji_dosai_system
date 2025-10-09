<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicParentController;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends PublicParentController
{
    public function add(Request $request)
    {
        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please log in to add items to your cart.');
        }

        $product = Product::findOrFail($request->product_id);

        $cart = Cart::firstOrCreate([
            'public_user_id' => $user->id
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += 1;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function addQuantity(Request $request)
    {
        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please log in to add items to your cart.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cart = Cart::firstOrCreate([
            'public_user_id' => $user->id,
        ]);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addFromView(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'You must be logged in to add to cart.']);
        }

        $product = Product::find($request->product_id);

        $cart = Cart::firstOrCreate(['public_user_id' => $user->id]);

        $item = $cart->items()->where('product_id', $product->id)->first();

        if ($item) {
            $item->quantity += $request->quantity;
            $item->save();
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function index()
    {
        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to view your cart.');
        }

        $cart = Cart::with('items.product')->where('public_user_id', $user->id)->first();

        return view('public.pages.user.cart', [
            'cart' => $cart,
        ]);
    }

    public function remove($id)
    {
        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to manage your cart.');
        }

        $cart = Cart::where('public_user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $cartItem = CartItem::where('id', $id)
            ->where('cart_id', $cart->id)
            ->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Item not found in cart.');
        }

        $cartItem->delete();

        return redirect()->back()->with('success', 'Product removed from cart.');
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login')->with('error', 'Please login to update your cart.');
        }

        $cart = Cart::where('public_user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        $cartItem = CartItem::where('id', $id)
            ->where('cart_id', $cart->id)
            ->firstOrFail();

        if ($request->action === 'increase') {
            $cartItem->quantity += 1;
        } elseif ($request->action === 'decrease' && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
        }

        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }
}
