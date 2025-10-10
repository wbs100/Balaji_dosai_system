@extends('public.layouts.app')

@section('title', 'My Account') {{-- Added title for completeness --}}

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/account.css') }}" />
@endpush

@section('content')
    <main class="account-page">
        <div class="account-container">
            <!-- Welcome Header -->
            <div class="welcome-header wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="200ms">
                <div class="welcome-content">
                    <h1>Welcome back, {{ Auth::guard('public_user')->user()->name }}!</h1>
                    <p>Manage your orders, profile, and preferences</p>
                </div>
                <div class="user-avatar">
                    <i class="bi bi-person-circle"></i>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <div class="stat-value">12</div>
                    <div class="stat-label">Total Orders</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div class="stat-value">3</div>
                    <div class="stat-label">Pending Orders</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <div class="stat-value">8</div>
                    <div class="stat-label">Wishlist Items</div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="stat-value">Rs. 24,500</div>
                    <div class="stat-label">Total Spent</div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="account-main">
                <!-- Sidebar Navigation -->
                <aside class="account-sidebar wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <h3 class="sidebar-title">My Account</h3>
                    <ul class="account-nav">
                        <li>
                            <a href="#" class="account-nav-link active" data-tab="dashboard">
                                <i class="bi bi-grid"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#" class="account-nav-link" data-tab="orders">
                                <i class="bi bi-bag"></i>
                                My Orders
                            </a>
                        </li>
                        <li>
                            <a href="#" class="account-nav-link" data-tab="profile">
                                <i class="bi bi-person"></i>
                                Profile Settings
                            </a>
                        </li>
                        {{-- <li>
                            <a href="#" class="account-nav-link" data-tab="addresses">
                                <i class="bi bi-geo-alt"></i>
                                Addresses
                            </a>
                        </li> --}}
                        <li>
                            <a href="#" class="account-nav-link" data-tab="wishlist">
                                <i class="bi bi-heart"></i>
                                Wishlist
                            </a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('auth.logout') }}" id="logout-form">
                        @csrf
                        <button class="logout-btn" onclick="document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            Logout
                        </button>
                    </form>

                </aside>

                <!-- Content Area -->
                <div class="account-content-wrapper">
                    <!-- Dashboard Tab -->
                    <div id="dashboard" class="account-content tab-content active wow fadeInRight"
                        data-wow-duration="1000ms" data-wow-delay="400ms">
                        <div class="content-header">
                            <h2 class="content-title">Dashboard Overview</h2>
                        </div>

                        <div class="dashboard-info">
                            <h3 style="margin-bottom: 20px; color: var(--green-deep);">Recent Activity</h3>
                            <p style="color: var(--text-muted); margin-bottom: 30px;">Here's a summary of your recent
                                activities and orders.</p>

                            <!-- Recent Orders Preview -->
                            <h4 style="margin-bottom: 15px; color: var(--text-dark);">Recent Orders</h4>
                            <div class="account__table">
                                <div class="account__table--header">
                                    <div class="account__table--header__child--items">Order ID</div>
                                    <div class="account__table--header__child--items">Date</div>
                                    <div class="account__table--header__child--items">Status</div>
                                    <div class="account__table--header__child--items">Total</div>
                                    <div class="account__table--header__child--items">Action</div>
                                </div>
                                <div class="account__table--body">
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2024</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 24, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Status</span><span class="value"><span
                                                    class="status-badge status-fulfilled">Fulfilled</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 2,340</span></div>
                                        <div class="account__table--body__child--items"><button class="orders-action-btn"
                                                aria-label="View Order #2024"><i class="bi bi-eye"></i> View</button></div>
                                    </div>
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2023</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 20, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Status</span><span class="value"><span
                                                    class="status-badge status-pending">Processing</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 1,850</span></div>
                                        <div class="account__table--body__child--items"><button class="orders-action-btn"
                                                aria-label="View Order #2023"><i class="bi bi-eye"></i> View</button>
                                        </div>
                                    </div>
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2022</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 15, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Status</span><span class="value"><span
                                                    class="status-badge status-fulfilled">Fulfilled</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 3,200</span></div>
                                        <div class="account__table--body__child--items"><button class="orders-action-btn"
                                                aria-label="View Order #2022"><i class="bi bi-eye"></i> View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders Tab -->
                    <div id="orders" class="account-content tab-content">

                        <h4 style="margin-bottom: 15px; color: var(--text-dark);">Recent Orders</h4>

                        <div class="table-responsive" style="overflow:auto;">
                            <div class="account__table">
                                <div class="account__table--header">
                                    <div class="account__table--header__child--items">Order ID</div>
                                    <div class="account__table--header__child--items">Date</div>
                                    <div class="account__table--header__child--items">Payment</div>
                                    <div class="account__table--header__child--items">Fulfillment</div>
                                    <div class="account__table--header__child--items">Total</div>
                                    <div class="account__table--header__child--items">Action</div>
                                </div>
                                <div class="account__table--body">
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2024</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 24, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Payment</span><span class="value"><span
                                                    class="status-badge status-paid">Paid</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Fulfillment</span><span class="value"><span
                                                    class="status-badge status-fulfilled">Fulfilled</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 2,340</span></div>
                                        <div class="account__table--body__child--items"><button class="btn-primary-green"
                                                style="padding: 8px 16px; font-size: 14px;"><i class="bi bi-receipt"></i>
                                                Invoice</button></div>
                                    </div>
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2023</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 20, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Payment</span><span class="value"><span
                                                    class="status-badge status-paid">Paid</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Fulfillment</span><span class="value"><span
                                                    class="status-badge status-unfulfilled">Processing</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 1,850</span></div>
                                        <div class="account__table--body__child--items"><button class="btn-primary-green"
                                                style="padding: 8px 16px; font-size: 14px;"><i class="bi bi-receipt"></i>
                                                Invoice</button></div>
                                    </div>
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2022</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 15, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Payment</span><span class="value"><span
                                                    class="status-badge status-paid">Paid</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Fulfillment</span><span class="value"><span
                                                    class="status-badge status-fulfilled">Fulfilled</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 3,200</span></div>
                                        <div class="account__table--body__child--items"><button class="btn-primary-green"
                                                style="padding: 8px 16px; font-size: 14px;"><i class="bi bi-receipt"></i>
                                                Invoice</button></div>
                                    </div>
                                    <div class="account__table--body__child">
                                        <div class="account__table--body__child--items"><span class="label">Order
                                                ID</span><span class="value order-id">#2021</span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Date</span><span class="value">November 10, 2024</span>
                                        </div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Payment</span><span class="value"><span
                                                    class="status-badge status-pending">Pending</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Fulfillment</span><span class="value"><span
                                                    class="status-badge status-unfulfilled">Pending</span></span></div>
                                        <div class="account__table--body__child--items"><span
                                                class="label">Total</span><span class="value">Rs. 1,280</span></div>
                                        <div class="account__table--body__child--items"><button class="btn-primary-green"
                                                style="padding: 8px 16px; font-size: 14px;"><i class="bi bi-receipt"></i>
                                                Invoice</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Tab -->
                    <div id="profile" class="account-content tab-content">
                        <div class="content-header">
                            <h2 class="content-title">Profile Settings</h2>
                        </div>

                        <form class="profile-form">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-person"></i> First Name
                                    </label>
                                    <input type="text" class="form-input" value="Kasun" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-person"></i> Last Name
                                    </label>
                                    <input type="text" class="form-input" value="Perera" placeholder="Last Name">
                                </div>
                                <div class="form-group form-group-full">
                                    <label class="form-label">
                                        <i class="bi bi-envelope"></i> Email Address
                                    </label>
                                    <input type="email" class="form-input" value="kasun.perera@example.com"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-telephone"></i> Phone Number
                                    </label>
                                    <input type="tel" class="form-input" value="+94 77 123 4567"
                                        placeholder="Phone">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-cake2"></i> Date of Birth
                                    </label>
                                    <input type="date" class="form-input" value="1990-05-15">
                                </div>
                            </div>

                            <h3 style="margin: 30px 0 20px; color: var(--green-deep);">Change Password</h3>
                            <div class="form-grid">
                                <div class="form-group form-group-full">
                                    <label class="form-label">
                                        <i class="bi bi-lock"></i> Current Password
                                    </label>
                                    <input type="password" class="form-input" placeholder="Enter current password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-lock-fill"></i> New Password
                                    </label>
                                    <input type="password" class="form-input" placeholder="Enter new password">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-lock-fill"></i> Confirm Password
                                    </label>
                                    <input type="password" class="form-input" placeholder="Confirm new password">
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn-primary-green">
                                    <i class="bi bi-check-circle"></i> Save Changes
                                </button>
                                <button type="button" class="btn-secondary">
                                    <i class="bi bi-x-circle"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Addresses Tab -->
                    <div id="addresses" class="account-content tab-content">
                        <div class="content-header">
                            <h2 class="content-title">My Addresses</h2>
                            <div class="content-actions">
                                <button class="btn-primary-green" id="addAddressBtn">
                                    <i class="bi bi-plus-circle"></i> Add New Address
                                </button>
                            </div>
                        </div>

                        <div class="address-grid" id="addressGrid">
                            <!-- Address cards will be rendered here by JS -->
                        </div>

                        <!-- Address Modal -->
                        <div id="addressModal" class="modal"
                            style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); align-items:center; justify-content:center; z-index:9999;">
                            <div class="modal-dialog"
                                style="background:white; border-radius:12px; padding:22px; width:420px; max-width:95%; box-shadow:0 10px 40px rgba(0,0,0,0.2);">
                                <h3 style="margin-top:0;">Address</h3>
                                <form id="addressForm">
                                    <input type="hidden" id="addrIndex">
                                    <div style="margin-bottom:10px;"><label>Label</label><input id="addrLabel"
                                            class="form-input" placeholder="Home / Office" required></div>
                                    <div style="margin-bottom:10px;"><label>Name</label><input id="addrName"
                                            class="form-input" placeholder="Full name" required></div>
                                    <div style="margin-bottom:10px;"><label>Address line</label><input id="addrLine"
                                            class="form-input" placeholder="Street address" required></div>
                                    <div style="margin-bottom:10px;"><label>City / Province</label><input id="addrCity"
                                            class="form-input" placeholder="City, Province" required></div>
                                    <div style="margin-bottom:10px; display:flex; gap:8px;">
                                        <div style="flex:1;"><label>Postal</label><input id="addrPostal"
                                                class="form-input" placeholder="Postal code"></div>
                                        <div style="flex:1;"><label>Phone</label><input id="addrPhone" class="form-input"
                                                placeholder="Phone number"></div>
                                    </div>
                                    <div style="display:flex; gap:10px; justify-content:flex-end; margin-top:14px;">
                                        <button type="button" id="cancelAddr" class="btn-secondary">Cancel</button>
                                        <button type="submit" class="btn-primary-green">Save Address</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist Tab -->
                    <div id="wishlist" class="account-content tab-content">
                        <div class="content-header">
                            <h2 class="content-title">My Wishlist</h2>
                            <div class="content-actions">
                                <button class="btn-secondary" id="clearWishlistBtn">
                                    <i class="bi bi-trash"></i> Clear All
                                </button>
                            </div>
                        </div>

                        <!-- Wishlist Items Grid -->
                        <div id="wishlistGrid" class="wishlist-grid">
                            <!-- Sample Wishlist Items -->
                            <div class="wishlist-card">
                                <div class="wishlist-img-wrapper">
                                    <!-- Use placeholder image URL -->
                                    <img src="https://placehold.co/150x150/d4edda/3c763d?text=Mixture+1"
                                        alt="Classic Kara Boondhi">
                                    <button class="wishlist-remove-btn" onclick="removeFromWishlist(this)">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                                <div class="wishlist-card-body">
                                    <h3 class="wishlist-product-name">Classic Kara Boondhi</h3>
                                    <p class="wishlist-product-qty">Qty: 2 × Rs. 230.00</p>
                                    <p class="wishlist-product-price">Rs. 460.00</p>
                                    <div class="wishlist-card-actions">
                                        <button class="wishlist-btn-cart"
                                            onclick="addToCart('Classic Kara Boondhi', 460)">
                                            <i class="bi bi-cart-plus"></i> Go to Cart
                                        </button>
                                        <button class="wishlist-btn-checkout" onclick="checkout('Classic Kara Boondhi')">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="wishlist-card">
                                <div class="wishlist-img-wrapper">
                                    <!-- Use placeholder image URL -->
                                    <img src="https://placehold.co/150x150/d4edda/3c763d?text=Mixture+2"
                                        alt="Madras Mixture">
                                    <button class="wishlist-remove-btn" onclick="removeFromWishlist(this)">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                                <div class="wishlist-card-body">
                                    <h3 class="wishlist-product-name">Madras Mixture</h3>
                                    <p class="wishlist-product-qty">Qty: 1 × Rs. 210.00</p>
                                    <p class="wishlist-product-price">Rs. 210.00</p>
                                    <div class="wishlist-card-actions">
                                        <button class="wishlist-btn-cart" onclick="addToCart('Madras Mixture', 210)">
                                            <i class="bi bi-cart-plus"></i> Go to Cart
                                        </button>
                                        <button class="wishlist-btn-checkout" onclick="checkout('Madras Mixture')">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="wishlist-card">
                                <div class="wishlist-img-wrapper">
                                    <!-- Use placeholder image URL -->
                                    <img src="https://placehold.co/150x150/d4edda/3c763d?text=Mixture+3"
                                        alt="Peanut Masala">
                                    <button class="wishlist-remove-btn" onclick="removeFromWishlist(this)">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </div>
                                <div class="wishlist-card-body">
                                    <h3 class="wishlist-product-name">Peanut Masala</h3>
                                    <p class="wishlist-product-qty">Qty: 3 × Rs. 180.00</p>
                                    <p class="wishlist-product-price">Rs. 540.00</p>
                                    <div class="wishlist-card-actions">
                                        <button class="wishlist-btn-cart" onclick="addToCart('Peanut Masala', 540)">
                                            <i class="bi bi-cart-plus"></i> Go to Cart
                                        </button>
                                        <button class="wishlist-btn-checkout" onclick="checkout('Peanut Masala')">
                                            Checkout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Empty State (hidden by default) -->
                        <div id="wishlistEmpty" class="wishlist-empty" style="display: none;">
                            <i class="bi bi-heart wishlist-empty-icon"></i>
                            <p class="wishlist-empty-text">Your wishlist is empty. Start adding your favorite items!</p>
                            <button class="btn-primary-green" onclick="window.location.href='shop.html'">
                                <i class="bi bi-shop"></i> Browse Products
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- Error/Success Notification Scripts (Kept original logic) --}}
    @if (session('success'))
        <script>
            // Ensure Swal is loaded for this to work
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            } else {
                console.log('Success: ' + "{{ session('success') }}");
            }
        </script>
    @endif

    @if (session('error'))
        <script>
            // Ensure Swal is loaded for this to work
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session('error') }}",
                });
            } else {
                console.error('Error: ' + "{{ session('error') }}");
            }
        </script>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.account-nav-link');
            const tabContents = document.querySelectorAll('.account-content.tab-content');
            const accountContentWrapper = document.querySelector('.account-content-wrapper');

            // --- Tab Switching Logic ---
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();

                    const targetTabId = link.getAttribute('data-tab');
                    const targetContent = document.getElementById(targetTabId);

                    if (!targetContent) return;

                    // 1. Deactivate all navigation links and content tabs
                    navLinks.forEach(l => l.classList.remove('active'));
                    tabContents.forEach(content => content.classList.remove('active',
                        'fadeInRight'));

                    // 2. Activate the clicked link
                    link.classList.add('active');

                    // 3. Activate the target content
                    // We must ensure the WOW classes are removed before adding them back
                    // to potentially re-trigger the animation (if WOW.js is configured for it).
                    targetContent.classList.add('active');

                    // Re-trigger WOW animation on the newly active content, if WOW.js is in use.
                    // This is usually done by removing and re-adding the animation class,
                    // or by calling a separate WOW.js function if available.
                    // For now, we simply ensure the class is present on the active tab.
                    // If your wow.js library does not re-animate, you might need an extra step
                    // like `new WOW().sync()` if your entire page is static.
                    targetContent.classList.add('wow', 'fadeInRight');
                });
            });

            // --- Address Modal Logic (from existing structure) ---
            const addressModal = document.getElementById('addressModal');
            const addAddressBtn = document.getElementById('addAddressBtn');
            const cancelAddrBtn = document.getElementById('cancelAddr');

            // Show modal
            if (addAddressBtn) {
                addAddressBtn.addEventListener('click', () => {
                    if (addressModal) addressModal.style.display = 'flex'; // Use flex for centering
                });
            }

            // Hide modal
            if (cancelAddrBtn) {
                cancelAddrBtn.addEventListener('click', () => {
                    if (addressModal) addressModal.style.display = 'none';
                });
            }
        });

        // Placeholder functions for wishlist/cart actions (to prevent JS errors)
        function removeFromWishlist(button) {
            console.log("Removing item from wishlist...");
            // Logic to remove item
            const card = button.closest('.wishlist-card');
            if (card) {
                card.remove();
                // Check if wishlist is empty and show the empty state
            }
        }

        function addToCart(productName, price) {
            console.log(`Adding ${productName} (Rs. ${price}) to cart.`);
        }

        function checkout(productName) {
            console.log(`Checking out ${productName}.`);
        }
    </script>
@endpush
