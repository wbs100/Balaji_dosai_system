<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'address' => 'required|string|max:500',
        ]);

        Address::create([
            'public_user_id' => Auth::guard('public_user')->id(),
            'title' => $request->title,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address added successfully.');
    }

    /**
     * Update an existing address.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:addresses,id',
            'title' => 'required|string|max:100',
            'address' => 'required|string|max:500',
        ]);

        $address = Address::where('id', $request->id)
            ->where('public_user_id', Auth::guard('public_user')->id())
            ->firstOrFail();

        $address->update([
            'title' => $request->title,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Address updated successfully.');
    }

    /**
     * Delete an address.
     */
    public function destroy($id)
    {
        $address = Address::where('id', $id)
            ->where('public_user_id', Auth::guard('public_user')->id())
            ->firstOrFail();

        $address->delete();

        return redirect()->back()->with('success', 'Address deleted successfully.');
    }
}
