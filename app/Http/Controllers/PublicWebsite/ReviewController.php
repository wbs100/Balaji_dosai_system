<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PublicUser;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $validated = $request->validate([
            'rating' => 'nullable|integer|min:0|max:5',
            'review' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
        ]);

        $validated['rating'] = $validated['rating'] ?? 0;

        try {
            $product = Product::findOrFail($productId);
            $user = Auth::guard('public_user')->user();

            Review::create([
                'product_id' => $product->id,
                'public_user_id' => $user->id ?? null,
                'name' => $validated['name'],
                'email' => $validated['email'] ?? null,
                'rating' => $validated['rating'],
                'review' => $validated['review'],
            ]);

            return back()->with('success', 'Thank you! Your review has been submitted.');
        } catch (\Exception $e) {
            Log::error('Review Save Error:', ['error' => $e->getMessage()]);
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }

}
