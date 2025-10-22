<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicParentController;
use App\Models\Address;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PublicDashboardController extends PublicParentController
{
    public function publicDashboard()
    {
        $user = Auth::guard('public_user')->user();

        $orders = Order::where('public_user_id', $user->id)->get();

        $addresses = Address::where('public_user_id', $user->id)->get();

        // Get addresses
        $addresses = Address::where('public_user_id', $user->id)->get();

        // Calculate stats
        $totalOrders = $orders->count();

        $pendingOrders = $orders->where('order_status', 'pending')->count();

        $wishlistCount = Wishlist::where('public_user_id', $user->id)->count();

        $totalSpent = $orders->where('order_status', 'completed')->sum('total'); // sum total of paid orders

        return view('public.pages.user.dashboard', compact(
            'user',
            'orders',
            'addresses',
            'totalOrders',
            'pendingOrders',
            'wishlistCount',
            'totalSpent'
        ));
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::guard('public_user')->user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:public_users,email,' . $user->id,
            'password' => 'nullable|string',
            'new-password' => 'nullable|string|min:6|same:confirm-password',
            'confirm-password' => 'nullable|string'
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if ($request->filled('password') || $request->filled('new-password')) {
            if (!$request->filled('password') || !$request->filled('new-password')) {
                return back()->withErrors(['new-password' => 'Both current and new password are required.']);
            }

            if (!Hash::check($request->input('password'), $user->password)) {
                return back()->withErrors(['password' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->input('new-password'));
        }

        $user->save();

        return back()->with('success', 'Account updated successfully!');
    }

    /**
     * Update user profile (name, email, contact)
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:public_users,email,' . Auth::guard('public_user')->id(),
            'contact' => 'nullable|string|max:20',
        ]);

        $user = Auth::guard('public_user')->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    /**
     * Update user password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'new-password' => 'nullable|string|min:6|same:confirm-password',
            'confirm-password' => 'nullable|string'
        ]);

        $user = Auth::guard('public_user')->user();

        if ($request->filled('password') || $request->filled('new-password')) {
            if (!$request->filled('password') || !$request->filled('new-password')) {
                return back()->withErrors(['new-password' => 'Both current and new password are required.']);
            }

            if (!Hash::check($request->input('password'), $user->password)) {
                return back()->withErrors(['password' => 'Current password is incorrect.']);
            }

            $user->password = Hash::make($request->input('new-password'));
            $user->save();
        }

        return redirect()->back()->with('success', 'Password updated successfully.');
    }

}
