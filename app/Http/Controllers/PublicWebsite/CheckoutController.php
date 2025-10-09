<?php

namespace App\Http\Controllers\PublicWebsite;

use App\Http\Controllers\PublicParentController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends PublicParentController
{
    public function show()
    {
        $user = Auth::guard('public_user')->user();
        $cart = Cart::with('items.product.primaryImage')->where('public_user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('public.pages.user.checkout', compact('cart'));
    }

    // public function store(Request $request)
    // {
    //     $user = Auth::guard('public_user')->user();

    //     $request->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'address_line1' => 'required|string',
    //         'city' => 'required|string',
    //         'province' => 'required|string',
    //         'postal_code' => 'required|string',
    //         'phone' => 'required|string',
    //         'email' => 'required|email',
    //         'payment_method' => 'required|string',
    //     ]);

    //     $cart = Cart::with('items.product')->where('public_user_id', $user->id)->first();

    //     if (!$cart || $cart->items->isEmpty()) {
    //         return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    //     }

    //     DB::beginTransaction();

    //     try {
    //         $latestOrder = Order::latest()->first();
    //         $nextNumber = $latestOrder ? intval(substr($latestOrder->order_code, 3)) + 1 : 1;
    //         $orderCode = 'YIO' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

    //         $order = Order::create([
    //             'order_code' => $orderCode,
    //             'public_user_id' => $user->id,
    //             'first_name' => $request->first_name,
    //             'last_name' => $request->last_name,
    //             'company' => $request->company,
    //             'address_line1' => $request->address_line1,
    //             'address_line2' => $request->address_line2,
    //             'city' => $request->city,
    //             'province' => $request->province,
    //             'postal_code' => $request->postal_code,
    //             'phone' => $request->phone,
    //             'email' => $request->email,
    //             'notes' => $request->notes,
    //             'payment_method' => $request->payment_method,
    //             'total' => $cart->items->sum(
    //                 fn($item) =>
    //                 ($item->product->selling_price - $item->product->selling_price * $item->product->product_discount / 100)
    //                 * $item->quantity
    //             ),
    //         ]);

    //         if ($request->payment_method === 'card') {
    //             // Redirect to PayHere with order ID
    //             return view('payhere.redirect', [
    //                 'merchant_id' => '1231269', // Your merchant ID
    //                 'return_url' => route('payment.success'),
    //                 'cancel_url' => route('payment.cancel'),
    //                 'notify_url' => route('payment.notify'),
    //                 'order_id' => $order->order_code,
    //                 'items' => 'Order #' . $order->order_code,
    //                 'amount' => number_format($order->total, 2, '.', ''),
    //                 'first_name' => $order->first_name,
    //                 'last_name' => $order->last_name,
    //                 'email' => $order->email,
    //                 'phone' => $order->phone,
    //                 'address' => $order->address_line1,
    //                 'city' => $order->city,
    //                 'country' => 'Sri Lanka'
    //             ]);
    //         }

    //         foreach ($cart->items as $item) {
    //             $discountedPrice = $item->product->selling_price;
    //             if ($item->product->product_discount > 0) {
    //                 $discountedPrice -= $discountedPrice * $item->product->product_discount / 100;
    //             }

    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'product_id' => $item->product_id,
    //                 'quantity' => $item->quantity,
    //                 'unit_price' => $discountedPrice,
    //                 'price' => $discountedPrice * $item->quantity,
    //             ]);

    //             $product = $item->product;
    //             if ($product->stock_quantity >= $item->quantity) {
    //                 $product->stock_quantity -= $item->quantity;
    //                 $product->save();
    //             } else {
    //                 throw new \Exception("Insufficient stock for product: {$product->name}");
    //             }
    //         }

    //         // Clear cart
    //         $cart->items()->delete();
    //         $cart->delete();

    //         DB::commit();

    //         return redirect()->route('home')->with('success', 'Order placed successfully!');

    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return back()->with('error', 'Checkout failed: ' . $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        $user = Auth::guard('public_user')->user();

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address_line1' => 'required|string',
            'city' => 'required|string',
            'province' => 'required|string',
            'postal_code' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            'payment_method' => 'required|string',
        ]);

        $cart = Cart::with('items.product')->where('public_user_id', $user->id)->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $total = $cart->items->sum(function ($item) {
            $discount = $item->product->product_discount;
            $price = $item->product->selling_price;
            return ($price - ($price * $discount / 100)) * $item->quantity;
        });

        DB::beginTransaction();
        try {
            // Generate order code
            $latestOrder = Order::latest()->first();
            $nextNumber = $latestOrder ? intval(substr($latestOrder->order_code, 3)) + 1 : 1;
            $orderCode = 'YIO' . str_pad($nextNumber, 6, '0', STR_PAD_LEFT);

            // Create the order (for both card and cash)
            $order = Order::create([
                'order_code' => $orderCode,
                'public_user_id' => $user->id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company' => $request->company,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
                'phone' => $request->phone,
                'email' => $request->email,
                'notes' => $request->notes,
                'payment_method' => $request->payment_method,
                'total' => $total,
            ]);

            foreach ($cart->items as $item) {
                $discountedPrice = $item->product->selling_price;
                if ($item->product->product_discount > 0) {
                    $discountedPrice -= $discountedPrice * $item->product->product_discount / 100;
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'unit_price' => $discountedPrice,
                    'price' => $discountedPrice * $item->quantity,
                ]);

                $product = $item->product;
                if ($product->stock_quantity >= $item->quantity) {
                    $product->stock_quantity -= $item->quantity;
                    $product->save();
                } else {
                    throw new \Exception("Insufficient stock for product: {$product->name}");
                }
            }

            $cart->items()->delete();
            $cart->delete();

            DB::commit();

            if ($request->payment_method === 'card') {
                // Redirect to PayHere
                $merchant_id = env('PAYHERE_MERCHANT_ID');

                $merchant_secret = env('PAYHERE_MERCHANT_SECRET');
                $currency = 'LKR';

                $amount = number_format($total, 2, '.', '');
                $order_id = $orderCode;

                // Prepare hash
                $hash = strtoupper(md5(
                    $merchant_id . $order_id . $amount . $currency . strtoupper(md5($merchant_secret))
                ));

                $payment = [
                    "merchant_id" => $merchant_id,
                    "return_url" => route('payment.success'),
                    "cancel_url" => route('payment.cancel'),
                    "notify_url" => route('payment.notify'),
                    "order_id" => $order_id,
                    "items" => 'Order #' . $order_id,
                    "currency" => "LKR",
                    "amount" => $amount,
                    "first_name" => $request->first_name,
                    "last_name" => $request->last_name,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "address" => $request->address_line1,
                    "city" => $request->city,
                    "country" => "Sri Lanka",
                ];

                // Generate the hash signature
                $payment['hash'] = strtoupper(md5(
                    $merchant_id . $payment['order_id'] . $payment['amount'] . $payment['currency'] . strtoupper(md5($merchant_secret))
                ));

                return view('payhere.redirect', compact('payment'));
            }

            return redirect()->route('home')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Checkout failed: ' . $e->getMessage());
        }
    }


    public function paymentSuccess(Request $request)
    {
        return redirect()->route('home')->with('success', 'Payment completed successfully!');
    }

    public function paymentCancel(Request $request)
    {
        return redirect()->route('cart.index')->with('error', 'Payment was cancelled.');
    }

    public function paymentNotify(Request $request)
    {
        Log::info('PayHere Notify Received', $request->all()); // Debug log

        // Step 1: Validate required fields
        $requiredFields = ['merchant_id', 'order_id', 'payhere_amount', 'payhere_currency', 'status', 'md5sig'];
        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                Log::warning("Missing field in IPN: $field");
                return response("Missing field: $field", 400);
            }
        }

        // Step 2: Setup variables
        $merchant_id = env('PAYHERE_MERCHANT_ID');
        $merchant_secret = strtoupper(md5(env('PAYHERE_MERCHANT_SECRET')));
        $order_id = $request->order_id;
        $payhere_amount = $request->payhere_amount;
        $payhere_currency = $request->payhere_currency;
        $status = $request->status;
        $received_md5sig = $request->md5sig;

        // Step 3: Generate the local MD5 signature
        $local_md5sig = strtoupper(
            md5(
                $merchant_id .
                $order_id .
                $payhere_amount .
                $payhere_currency .
                $status .
                $merchant_secret
            )
        );

        // Step 4: Compare signatures
        if ($local_md5sig !== $received_md5sig) {
            Log::error('MD5 Signature Mismatch', [
                'expected' => $local_md5sig,
                'received' => $received_md5sig,
            ]);
            return response('Signature mismatch', 400);
        }

        // Step 5: Handle completed payment (status 2 = success)
        if ((int) $status === 2) {
            $order = Order::where('order_code', $order_id)->first();

            if ($order) {
                if ($order->payment_status !== 'completed') {
                    $order->payment_status = 'completed';
                    $order->order_status = 'processing'; // Optional: update order status
                    $order->save();

                    Log::info("Order #{$order->order_code} payment marked as completed.");
                } else {
                    Log::info("Order #{$order->order_code} payment already completed.");
                }
            } else {
                Log::warning("Order not found for order_code: {$order_id}");
            }
        } else {
            Log::info("Payment not completed. Status: {$status}, Order ID: {$order_id}");
        }

        return response('IPN received', 200);
    }

}
