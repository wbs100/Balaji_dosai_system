@extends('public.layouts.app')

@section('content')
    <section class="inner-section single-banner mb-0"
        style="background: url(/assets/images/newsletter.jpg) no-repeat center;">
        <div class="container">
            <h2>cartlist</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">cart</li>
            </ol>
        </div>
    </section>

    <section class="inner-section cart-part my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="border: 1px solid #ddd; padding-inline: 0px; border-radius: 4px;">
                    @if ($cart && count($cart->items) > 0)
                        <div class="table-scroll">
                            <table class="table-list">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cart?->items ?? [] as $item)
                                        <tr>
                                            <td class="table-image"><img
                                                    src="{{ asset($item->product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                                    alt="product">
                                            </td>
                                            <td>
                                                <h6>{{ $item->product->name }}</h6>
                                            </td>
                                            <td>
                                                @if ($item->product->product_discount > 0)
                                                    @php
                                                        $discountedPrice =
                                                            $item->product->selling_price -
                                                            ($item->product->selling_price *
                                                                $item->product->product_discount) /
                                                                100;
                                                    @endphp
                                                    <div class="flex flex-col whitespace-nowrap leading-tight">
                                                        <del>
                                                            {{ number_format($item->product->selling_price, 2) }}&nbsp;LKR
                                                        </del>
                                                        <span>
                                                            {{ number_format($discountedPrice, 2) }}&nbsp;LKR
                                                        </span>
                                                        <span class="discount-percent text-green-600 text-xs">
                                                            ({{ number_format($item->product->product_discount, 2) }}% OFF)
                                                        </span>
                                                    </div>
                                                @else
                                                    <span>
                                                        {{ number_format($item->product->selling_price, 2) }}&nbsp;LKR
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="product-action">
                                                        <button type="submit" name="action" value="decrease"
                                                            class="icofont-minus" title="Quantity Minus"></button>
                                                        <input type="text" name="quantity" class="action-input"
                                                            value="{{ $item->quantity }}" readonly>
                                                        <button type="submit" name="action" value="increase"
                                                            class="action-plus" title="Quantity Plus">+</button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>
                                                <h6>
                                                    @php
                                                        $unitPrice = $item->product->selling_price;

                                                        if ($item->product->product_discount > 0) {
                                                            $unitPrice -=
                                                                ($unitPrice * $item->product->product_discount) / 100;
                                                        }

                                                        $subtotal = $unitPrice * $item->quantity;
                                                    @endphp

                                                    {{ number_format($subtotal, 2) }}&nbsp;LKR
                                                </h6>
                                            </td>
                                            <td class="table-action">
                                                <a class="trash" href="{{ route('cart.remove', $item->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('remove-cart-{{ $item->id }}').submit();"><i
                                                        class="icofont-trash"></i></a>

                                                <form id="remove-cart-{{ $item->id }}"
                                                    action="{{ route('cart.remove', $item->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">You have no items in the cart!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="row h-100 d-flex justify-content-center align-items-center">
                            You have no items in the cart!
                        </div>
                    @endif

                </div>

                <!-- Cart Summary -->

                <div class="col-lg-4">
                    <div class="cart-summary" style="border: 1px solid #ddd; padding: 20px; border-radius: 4px;">
                        <ul style="list-style: none; padding: 0; margin: 0 0 15px 0;">
                            @php
                                $subtotal = 0;
                                $discount = 0;

                                foreach ($cart?->items ?? [] as $item) {
                                    $price = $item->product->selling_price;
                                    $quantity = $item->quantity;

                                    $subtotal += $price * $quantity;

                                    if ($item->product->product_discount > 0) {
                                        // Calculate the actual discount amount
                                        $discount += (($price * $item->product->product_discount) / 100) * $quantity;
                                    }
                                }

                                $packaging = 0;
                                $warranty = 0;
                                $total = $subtotal + $packaging + $warranty - $discount;
                            @endphp

                            <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>Items x ({{ count($cart?->items ?? []) }})</span>
                                <span>LKR {{ number_format($subtotal, 2) }}</span>
                            </li>
                            <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>Packaging</span>
                                <span>LKR {{ number_format($packaging, 2) }}</span>
                            </li>
                            <li style="display: flex; justify-content: space-between; margin-bottom: 5px;">
                                <span>Discount(-)</span>
                                <span>LKR {{ number_format($discount, 2) }}</span>
                            </li>
                            <li style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                                <span>Warranty Charges</span>
                                <span>LKR {{ number_format($warranty, 2) }}</span>
                            </li>

                            <li
                                style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                                <span style="font-size: 22px; font-weight: 600;">Total</span>
                                <span style="font-size: 22px; font-weight: 600;">LKR {{ number_format($total, 2) }}</span>
                            </li>
                        </ul>

                        <a href="{{ route('checkout.show') }}" class="btn btn-inline w-100">
                            <i class="fas fa-credit-card"></i><span>Proceed to Checkout</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/wishlist.css') }}" />
@endpush
