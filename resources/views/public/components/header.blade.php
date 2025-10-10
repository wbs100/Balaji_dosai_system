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
                        <li><a href="{{ route('about') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['about']) ? 'active' : '' }}">About
                                Us</a></li>
                        <li><a href="{{ route('specialties') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['specialties']) ? 'active' : '' }}">Specialties</a>
                        </li>
                        <li><a href="{{ route('services') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['services']) ? 'active' : '' }}">Services</a>
                        </li>
                        <li><a href="{{ route('gallery') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['gallery']) ? 'active' : '' }}">Gallery</a>
                        </li>
                        <li><a href="{{ route('contact') }}"
                                class="nav-link {{ in_array(Route::currentRouteName(), ['contact']) ? 'active' : '' }}">Contact
                                Us</a></li>
                    </ul>
                </div>

                <!-- Right Side - Login Button -->
                <div class="nav-actions">

                    @auth('public_user')
                        <a href="{{ route('user.dashboard') }}" class="me-3">
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
                        <a class="btn-cart position-relative" href="#" role="button">
                            <i class="bi bi-cart"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                2
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end p-3 my-cart-menu">
                            <!-- Cart Items -->
                            <li class="cart-list-item">
                                <img src="/assets/images\Mixture\mixture-1.jpg" class="me-2 rounded nav-prod-img"
                                    alt="Classic Kara Boondhi">
                                <div class="flex-grow-1">
                                    <div>Classic Kara Boondhi</div>
                                    <small class="text-muted">Qty: 2 × Rs. 230.00</small>
                                </div>
                                <div class="fw-bold">Rs. 460.00</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="cart-list-item">
                                <img src="/assets/images\Mixture\mixture-2.jpg" class="me-2 rounded nav-prod-img"
                                    alt="Madras Mixture">
                                <div class="flex-grow-1">
                                    <div>Madras Mixture</div>
                                    <small class="text-muted">Qty: 1 × Rs. 210.00</small>
                                </div>
                                <div class="fw-bold">Rs. 210.00</div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <!-- Buttons -->
                            <li class="d-grid gap-2">
                                <a href="#cart" class="btn btn-primary btn-cart-view">Go to Cart</a>
                                <a href="#checkout" class="btn btn-primary btn-cart-checkout">Checkout</a>
                            </li>
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
            <li><a href="#login" class="mobile-nav-link">Login</a></li>
        </ul>
    </div>
</header>
