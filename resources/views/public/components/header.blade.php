<header class="modern-header">
    <nav class="navbar-modern">
        <div class="container-fluid">
            <div class="nav-wrapper">
                <!-- Left Side - Logo -->
                <div class="nav-logo">
                    <a href="{{ route('home') }}">
                        <img src="/assets/images/logo.png" alt="Dosa Coffee" class="logo-image">
                    </a>
                </div>

                <!-- Center - Navigation Menu -->
                <div class="nav-menu">
                    <ul class="nav-links">
                        <li><a href="{{ route('home') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['home']) ? 'active' : '' }}">Home</a>
                        </li>
                        <li><a href="#" class="nav-link">Menu</a></li>
                        <li><a href="#" class="nav-link">Snacks</a></li>
                        <li>
                            <a href="{{ route('about') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['about']) ? 'active' : '' }}">About
                            </a>
                        </li>
                        <li><a href="#" class="nav-link">Locations</a></li>
                        {{-- <li><a href="{{ route('specialties') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['specialties']) ? 'active' : '' }}">Specialties</a>
                        </li>
                        <li><a href="{{ route('services') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['services']) ? 'active' : '' }}">Services</a>
                        </li>
                        <li><a href="{{ route('gallery') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['gallery']) ? 'active' : '' }}">Gallery</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('contact') }}" class="nav-link {{ in_array(Route::currentRouteName(), ['contact']) ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>

                <!-- Right Side - Login Button -->
                <div class="nav-actions">

                    @auth('public_user')
                        <a href="{{ route('user.dashboard') }}" class="me-3 d-none d-lg-block">
                            <i class="bi bi-person-circle"></i> Profile
                        </a>

                        {{-- <form method="POST" action="{{ route('auth.logout') }}" id="logout-form">
                            @csrf
                            <a href="javascript:void(0)" onclick="document.getElementById('logout-form').submit();"">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </form> --}}
                    @else
                        <a href="{{ route('user.login') }}" class="btn-login">Login</a>
                    @endauth

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <!-- Cart Dropdown -->
                    <div class="cart-dropdown">
                        {{-- Cart Toggle Button --}}
                        <a class="btn-cart position-relative" href="#" role="button">
                            <i class="bi bi-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $cartCount }}
                            </span>
                        </a>

                        {{-- Dropdown Content --}}
                        <ul class="dropdown-menu dropdown-menu-end p-3 my-cart-menu">
                            @if (($cart?->items ?? []) && count($cart->items) > 0)
                                {{-- PHP Calculation Block: Must be run here to get totals for the summary --}}
                                @php
                                    $subtotal = 0;
                                    $discount = 0;
                                    $packaging = 0; // Assuming 0 as per the main cart code snippet
                                    $warranty = 0; // Assuming 0 as per the main cart code snippet

                                    // Calculate item prices and totals
                                    foreach ($cart->items as $item) {
                                        $price = $item->product->selling_price;
                                        $quantity = $item->quantity;

                                        $subtotal += $price * $quantity;

                                        if ($item->product->product_discount > 0) {
                                            $discount +=
                                                (($price * $item->product->product_discount) / 100) * $quantity;
                                        }
                                    }
                                    $total = $subtotal + $packaging + $warranty - $discount;
                                @endphp

                                <!-- Cart Items Loop -->
                                @foreach ($cart->items as $item)
                                    @php
                                        $unitPrice = $item->product->selling_price;
                                        if ($item->product->product_discount > 0) {
                                            $unitPrice -= ($unitPrice * $item->product->product_discount) / 100;
                                        }
                                        $itemSubtotal = $unitPrice * $item->quantity;
                                    @endphp
                                    <li class="cart-list-item d-flex align-items-center">

                                        <img src="{{ asset($item->product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                            class="me-2 rounded nav-prod-img" alt="{{ $item->product->name }}"
                                            style="width: 50px; height: 50px; object-fit: cover;">
                                        <div class="flex-grow-1 me-2">
                                            <div style="font-size: 0.9rem;">{{ $item->product->name }}</div>
                                            <small class="text-muted">Qty: {{ $item->quantity }} × Rs.
                                                {{ number_format($unitPrice, 2) }}</small>
                                        </div>
                                        <div class="fw-bold text-nowrap" style="color: var(--green-deep);">
                                            Rs. {{ number_format($itemSubtotal, 2) }}
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider my-2">
                                    </li>
                                @endforeach

                                <!-- Cart Summary -->
                                <li class="cart-summary-item d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted">Subtotal ({{ count($cart->items) }} items):</span>
                                    <span class="fw-bold">Rs. {{ number_format($subtotal - $discount, 2) }}</span>
                                </li>

                                @if ($discount > 0)
                                    <li
                                        class="cart-summary-item d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted">Discount Savings:</span>
                                        <span class="fw-bold text-danger">- Rs.
                                            {{ number_format($discount, 2) }}</span>
                                    </li>
                                @endif

                                <li
                                    class="cart-summary-item d-flex justify-content-between align-items-center mb-3 pt-1 border-top">
                                    <span style="font-size: 1.1rem; font-weight: 600;">Total:</span>
                                    <span style="font-size: 1.1rem; font-weight: 600; color: var(--green-deep);">Rs.
                                        {{ number_format($total, 2) }}</span>
                                </li>


                                <!-- Buttons -->
                                <div class="proceed-check">
                                    <a href="{{ route('checkout.show') }}" class="btn-primary-gold btn-medium">PROCEED
                                        TO
                                        CHECKOUT</a>
                                </div>
                            @else
                                <!-- Empty Cart State -->
                                <li class="text-center text-muted py-3">
                                    Your cart is empty.
                                </li>
                                <li class="d-grid">
                                    <a href="{{ route('specialties') }}" class="btn btn-primary btn-cart-view">Browse
                                        Products</a>
                                </li>
                            @endif
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-nav-menu">
        <ul class="mobile-nav-links">
            <li><a href="{{ route('home') }}" class="mobile-nav-link">Home</a></li>
            <li><a href="{{ route('about') }}" class="mobile-nav-link">About Us</a></li>
            <li><a href="{{ route('specialties') }}" class="mobile-nav-link">Specialties</a></li>
            <li><a href="{{ route('services') }}" class="mobile-nav-link">Services</a></li>
            <li><a href="{{ route('gallery') }}" class="mobile-nav-link">Gallery</a></li>
            <li><a href="{{ route('contact') }}" class="mobile-nav-link">Contact Us</a></li>

            @auth('public_user')
                <li><a href="{{ route('user.dashboard') }}" class="mobile-nav-link">Profile</a></li>
            @else
                <li><a href="{{ route('user.login') }}" class="mobile-nav-link">Login</a></li>
            @endauth
        </ul>
    </div>
</header>
