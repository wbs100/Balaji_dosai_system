@extends('public.layouts.app')
@section('title', 'Checkout')

@push('styles')
    {{-- Assuming you have a CSS file for checkout/cart styling --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/checkout.css') }}" />
@endpush

@section('content')
    <main>
        <div class="main-part">
            <div class="page-header text-center"
                style="background-image: url('{{ asset('/assets/images/placeholder.jpg') }}');">
                <div class="container">
                    <h1 class="page-title">Checkout<span style="color: var(--my-secondary);">Order now</span></h1>
                </div>
            </div>

            <div class="page-content">
                <div class="container">
                    {{-- Global Error/Success messages (optional but useful) --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- The main form for checkout --}}
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-7">
                                <ul class="checkout-steps">
                                    <li>
                                        <h2 class="step-title">Billing details</h2>

                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First name <abbr class="required">*</abbr></label>
                                                    {{-- Using old() for persistence, and Auth user data for initial values --}}
                                                    <input type="text" name="first_name" class="form-control"
                                                        value="{{ old('first_name', Auth::guard('public_user')->user()->first_name ?? '') }}"
                                                        required />
                                                    @error('first_name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last name <abbr class="required">*</abbr></label>
                                                    <input type="text" name="last_name" class="form-control"
                                                        value="{{ old('last_name', Auth::guard('public_user')->user()->last_name ?? '') }}"
                                                        required />
                                                    @error('last_name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-1 pb-2">
                                            <label>Street address <abbr class="required">*</abbr></label>
                                            <input type="text" name="address_line1" class="form-control"
                                                value="{{ old('address_line1') }}" required />
                                            @error('address_line1')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Town / City <abbr class="required">*</abbr></label>
                                            <input type="text" name="city" class="form-control"
                                                value="{{ old('city') }}" required />
                                            @error('city')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="select-custom bg-gray">
                                            <label>Province <abbr class="required">*</abbr></label>
                                            <select name="province" class="form-control-select bg-white" required>
                                                <option value="">Select a province...</option>
                                                @foreach (['Central', 'Southern', 'Western', 'Northern', 'Uva', 'Sabaragamu'] as $province)
                                                    <option value="{{ $province }}"
                                                        {{ old('province') == $province ? 'selected' : '' }}>
                                                        {{ $province }}</option>
                                                @endforeach
                                            </select>
                                            @error('province')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Postcode / Zip <abbr class="required">*</abbr></label>
                                            <input type="text" name="postal_code" class="form-control"
                                                value="{{ old('postal_code') }}" required />
                                            @error('postal_code')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Phone <abbr class="required">*</abbr></label>
                                            <input type="tel" name="phone" class="form-control"
                                                value="{{ old('phone', Auth::guard('public_user')->user()->phone ?? '') }}"
                                                required />
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Email address <abbr class="required">*</abbr></label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', Auth::guard('public_user')->user()->email ?? '') }}"
                                                required />
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="order-comments">Order notes (optional)</label>
                                            <textarea name="notes" class="form-control" placeholder="Notes about your order.">{{ old('notes') }}</textarea>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-5">
                                <div class="order-summary sticky-top" style="top: 20px;">
                                    <h3>YOUR ORDER</h3>
                                    <table class="table table-mini-cart">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total = 0; @endphp
                                            @forelse ($cart->items ?? [] as $item)
                                                @php
                                                    $price = $item->product->selling_price;
                                                    // Assuming selling_price is used for the final line calculation
                                                    $finalPrice = $item->product->selling_price;
                                                    $discountAmount = 0;

                                                    if ($item->product->product_discount > 0) {
                                                        // Calculate the discounted price
                                                        $discountAmount =
                                                            ($item->product->selling_price *
                                                                $item->product->product_discount) /
                                                            100;
                                                        $finalPrice -= $discountAmount;
                                                    }

                                                    $lineTotal = $finalPrice * $item->quantity;
                                                    $total += $lineTotal;
                                                @endphp
                                                <tr>
                                                    <td class="product-col">
                                                        <h5 class="product-title">
                                                            {{ $item->product->name }} ×
                                                            <span class="product-qty">{{ $item->quantity }}</span>
                                                        </h5>
                                                    </td>
                                                    <td class="price-col">
                                                        <span>Rs. {{ number_format($lineTotal, 2) }}</span>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="text-center">Your cart is empty!</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <td>
                                                    <h5>Subtotal</h5>
                                                </td>
                                                <td class="price-col"><span>Rs. {{ number_format($total, 2) }}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>
                                                    <h5>Total</h5>
                                                </td>
                                                <td><b class="total-price" style="color: var(--my-secondary);">Rs.
                                                        {{ number_format($total, 2) }}</b>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="payment-methods">
                                        <h4>Payment options</h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                <label for="card_payment" class="radio-label mb-2 d-flex align-items-center">
                                                    <p class="p-0 m-0">Bank Transfer (Required Pre-Payment)</p>&nbsp;
                                                    <input type="radio" name="payment_method" id="card_payment"
                                                        value="bank transfer" checked required />
                                                </label>
                                                {{-- Since COD is removed, this field is now permanently visible and required --}}
                                                <div id="payment-slip-attachment"
                                                    style="padding: 10px; border: 1px dashed #ccc; margin-bottom: 15px; border-radius: 4px;">
                                                    <p class="mb-2 text-sm text-danger">Please attach a clear photo of your
                                                        **deposit slip**.</p>

                                                    <label for="payment_slip_input"
                                                        class="form-label font-weight-bold">Payment
                                                        Slip
                                                        <abbr class="required">*</abbr></label>

                                                    <div class="custom-file-upload">
                                                        {{-- Actual hidden file input (Triggered by the label below) --}}
                                                        <input type="file" name="payment_slip" id="payment_slip_input"
                                                            class="custom-file-input" accept="image/*" required />

                                                        {{-- Styled label that looks like a button --}}
                                                        <label for="payment_slip_input" class="custom-file-label">
                                                            <i class="bi bi-upload me-2"></i> Select Proof of Payment
                                                        </label>

                                                        {{-- Display selected file name and preview image --}}
                                                        <span id="file-name-display" class="file-name-display">No file
                                                            chosen</span>
                                                        <div style="display: none;" id="slip-preview-container">
                                                            <img id="slip-preview" src="#" height="100px"
                                                                alt="Payment Slip Preview" />
                                                        </div>
                                                    </div>

                                                    @error('payment_slip')
                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <button type="submit" href="{{ route('checkout.show') }}" class="btn btn-menu"
                                        style="width: 100%"><i class="bi bi-bag-check"></i> Place order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentSlipInput = document.getElementById('payment_slip_input');
            const fileNameDisplay = document.getElementById('file-name-display');
            const slipPreviewContainer = document.getElementById('slip-preview-container');
            const slipPreview = document.getElementById('slip-preview');
            const checkoutForm = document.getElementById('checkout-form');
            const placeOrderButton = document.getElementById('place-order-button');

            // Set the bank transfer radio to always be required and selected
            const bankTransferRadio = document.getElementById('card_payment');
            if (bankTransferRadio) {
                bankTransferRadio.checked = true;
            }

            // Since there is only one option (Bank Transfer), the slip is always required
            if (paymentSlipInput) {
                paymentSlipInput.required = true;
            }

            // --- Functionality for file name display and Image Preview ---
            if (paymentSlipInput) {
                paymentSlipInput.addEventListener('change', function(event) {
                    slipPreviewContainer.style.display = 'none';
                    if (this.files && this.files.length > 0) {
                        const file = this.files[0];

                        // 1. Display file name
                        fileNameDisplay.textContent = file.name;

                        // 2. Display Image Preview
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            slipPreview.src = e.target.result;
                            slipPreviewContainer.style.display = 'block';
                        };

                        reader.onerror = function() {
                            // Fallback for non-image files or errors
                            slipPreview.src = '#';
                            slipPreviewContainer.style.display = 'none';
                        };

                        reader.readAsDataURL(file);

                    } else {
                        // Reset if no file is chosen (e.g., user cancels dialog)
                        fileNameDisplay.textContent = 'No file chosen';
                        slipPreview.src = '#';
                        slipPreviewContainer.style.display = 'none';
                    }
                });
            }
            // -----------------------------------------------

            // Handle form submission UX
            if (checkoutForm) {
                checkoutForm.addEventListener('submit', function(e) {
                    // Disable button and show spinner to indicate processing
                    placeOrderButton.disabled = true;
                    placeOrderButton.innerHTML =
                        `<i class="bi bi-gear-fill spin me-2"></i> Placing Order...`;
                });
            }
        });
    </script>
@endpush
