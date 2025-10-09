<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicParentController;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends PublicParentController
{
    public function goToWishlist()
    {
        $user = Auth::guard('public_user')->user();
        $wishlists = Wishlist::with('product')->where('public_user_id', $user->id)->get();

        return view('public.pages.wishlist', compact('wishlists'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;

        $user = Auth::guard('public_user')->user();

        if (!$user) {
            return redirect()->route('user.login');
        }
        
        Wishlist::firstOrCreate([
            'public_user_id' => $user->id,
            'product_id' => $productId,
        ]);

        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    public function remove($id)
    {
        $user = Auth::guard('public_user')->user();
        Wishlist::where('id', $id)->where('public_user_id', $user->id)->delete();

        return redirect()->back()->with('success', 'Removed from wishlist.');
    }
}
