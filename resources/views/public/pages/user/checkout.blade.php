@extends('public.layouts.app')

@section('content')
    <main class="main main-test bg-gray">
        <div class="container checkout-container">
            <!--breadcrumb-->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('shop.index') }}">Products</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('cart.index') }}">Cart</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Checkout
                    </li>
                </ol>
            </nav>

            <div class="mt-2"></div>

            <div class="checkout-discount">
                <h4>Have a coupon?
                    <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
                </h4>

                <div id="collapseTwo" class="collapse">
                    <div class="feature-box">
                        <div class="feature-box-content">
                            <p>If you have a coupon code, please apply it below.</p>

                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm w-auto"
                                        placeholder="Coupon code" required />
                                    <div class="input-group-append">
                                        <button class="btn btn-sm mt-0" type="submit">
                                            Apply Coupon
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('checkout.store') }}" method="POST" id="checkout-form">
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
                                            <input type="text" name="first_name" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last name <abbr class="required">*</abbr></label>
                                            <input type="text" name="last_name" class="form-control" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company name (optional)</label>
                                    <input type="text" name="company" class="form-control" />
                                </div>

                                <div class="form-group mb-1 pb-2">
                                    <label>Street address <abbr class="required">*</abbr></label>
                                    <input type="text" name="address_line1" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <input type="text" name="address_line2" class="form-control"
                                        placeholder="Apartment, suite, etc. (optional)" />
                                </div>

                                <div class="form-group">
                                    <label>Town / City <abbr class="required">*</abbr></label>
                                    <input type="text" name="city" class="form-control" required />
                                </div>

                                <div class="select-custom bg-gray">
                                    <label>Province <abbr class="required">*</abbr></label>
                                    <select name="province" class="form-control bg-white">
                                        <option value="Central">Central</option>
                                        <option value="Southern">Southern</option>
                                        <option value="Western">Western</option>
                                        <option value="Northern">Northern</option>
                                        <option value="Uva">Uva</option>
                                        <option value="Sabaragamu">Sabaragamu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Postcode / Zip <abbr class="required">*</abbr></label>
                                    <input type="text" name="postal_code" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Phone <abbr class="required">*</abbr></label>
                                    <input type="tel" name="phone" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Email address <abbr class="required">*</abbr></label>
                                    <input type="email" name="email" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label class="order-comments">Order notes (optional)</label>
                                    <textarea name="notes" class="form-control" placeholder="Notes about your order."></textarea>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>
                            <table class="table table-mini-cart">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach ($cart->items as $item)
                                        @php
                                            $price = $item->product->selling_price;
                                            if ($item->product->product_discount > 0) {
                                                $price -= ($price * $item->product->product_discount) / 100;
                                            }
                                            $lineTotal = $price * $item->quantity;
                                            $total += $lineTotal;
                                        @endphp
                                        <tr>
                                            <td class="product-col">
                                                <h3 class="product-title">
                                                    {{ $item->product->name }} ×
                                                    <span class="product-qty">{{ $item->quantity }}</span>
                                                </h3>
                                            </td>
                                            <td class="price-col">
                                                <span>{{ number_format($lineTotal, 2) }} LKR</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <td>
                                            <h4>Subtotal</h4>
                                        </td>
                                        <td class="price-col"><span>{{ number_format($total, 2) }} LKR</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td><b class="total-price"
                                                style="color: var(--my-secondary);">{{ number_format($total, 2) }} LKR</b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4>Payment methods</h4>
                                <ul>
                                    <li>
                                        <label for="card_payment" class="d-flex align-items-center">
                                            <p class="p-0 m-0 pr-2">Card Payment</p>
                                            <input type="radio" name="payment_method" id="card_payment" value="card"
                                                required />
                                        </label>
                                    </li>
                                    <li>
                                        <label for="cash_on_delivery" class="d-flex align-items-center">
                                            <p class="p-0 m-0 pr-2">Cash On Delivery</p>
                                            <input type="radio" name="payment_method" id="cash_on_delivery"
                                                value="cash" required />
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-dark btn-place-order my-button-2" form="checkout-form">
                                Place order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    @endif
</script>
