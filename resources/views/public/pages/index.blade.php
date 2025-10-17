@extends('public.layouts.app')
@section('title', 'Home')
@section('content')
<!-- Start Main -->
<main style="position: relative; z-index: auto;">
    <div class="main-part">
        <!--hero-->
        <section class="hero-section" style="margin-top: 80px;">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 hero-content">
                        <div class="ps-lg-5">
                            <div class="welcome-badge">Welcome To Balaji Dosai</div>
                            <h1 class="hero-title">Fresh<br>Authentic<br>Unmistakably South Indian</h1>
                            <p class="hero-description">
                                Since 2008, Balaji Dosai has been serving the true taste of South India - from crispy
                                dosas to comforting curries - prepared fresh daily with Sri Lankan warmth and
                                hospitality.
                            </p>
                            <div class="button-group">
                                <a href="{{ route('specialties') }}" class="btn btn-menu">View Menu</a>
                                <a href="https://www.ubereats.com/lk/store/balaji-dosai/8tj9-oCxTiaw9yK_JPLFyw?ps=1" class="btn btn-contact">Order Online</a>{{-- {{ route('shop.index') }} --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="image-container">
                            <!-- Replace these src attributes with your actual image paths -->
                            <img src="/assets/images/hero-bgs/plate.png" alt="Dosa Plate" class="plate-image">
                            <img src="/assets/images/hero-bgs/tall.png" alt="Utensils" class="utensils-image">

                            <!-- Branch decorations - replace with your branch images -->
                            <img src="/assets/images/hero-bgs/leaf-up.webp" alt="" class="branch-decoration branch-1">
                            <img src="/assets/images/hero-bgs/leaf-down.webp" alt="" class="branch-decoration branch-2">

                            <!-- Rotating Food Images -->
                            <div class="rotating-foods">
                                <div class="food-orbit">
                                    <img src="/assets/images/index/Ghee-Dos.webp" alt="Ghee Dosa"
                                        class="food-item food-1">
                                    <img src="/assets/images/index/Ghee-Pongal.webp" alt="Ghee Pongal"
                                        class="food-item food-2">
                                    <img src="/assets/images/index/Masala-Vada.webp" alt="Masala Vada"
                                        class="food-item food-3">
                                    <img src="/assets/images/index/Medhu-Vada.webp" alt="Medhu Vada"
                                        class="food-item food-4">
                                    <img src="/assets/images/index/Mysore-Bonda.webp" alt="Mysore Bonda"
                                        class="food-item food-5">
                                    <img src="/assets/images/index/Onion-Medhu-Vada.webp" alt="Onion Medhu Vada"
                                        class="food-item food-6">
                                    <img src="/assets/images/index/Pani-Poori.webp" alt="Pani Poori"
                                        class="food-item food-7">
                                    <img src="/assets/images/index/Podi-Idly.webp" alt="Podi Idly"
                                        class="food-item food-8">
                                    <img src="/assets/images/index/Poori.webp" alt="Poori" class="food-item food-9">
                                    <img src="/assets/images/index/Samosa.webp" alt="Samosa" class="food-item food-10">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Start Mixture Products Section -->
        <section class="mixture-section">
            <div class="container">
                <div class="mixture-header">
                    <div style="display: flex; flex-direction: column;">
                        <h2 class="mixture-title">Our Signature Snacks</h2>
                        <p>
                            Straight from our kitchen — made fresh, packed with flavour, and ready to enjoy at home.
                        </p>
                    </div>
                    <a href="/shop?category=10" class="btn-shop-now">Explore All</a>{{-- {{ route('shop.index')}} --}}
                </div>

                <div class="mixture-products-slider">

                    @foreach ($snacks as $snack)
                    <div class="mixture-product-card">
                        <div class="product-image-wrapper">
                            <img src="{{ asset($snack->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                alt="{{ $snack->name }}" class="product-image">
                        </div>
                        <h3 class="product-name">{{ $snack->name }}</h3>
                        @if ($snack->product_discount > 0)
                        @php
                        $discountedPrice =
                        $snack->selling_price -
                        ($snack->selling_price * $snack->product_discount) / 100;
                        @endphp
                        <p class="old-price text-gray-500 line-through mr-2">
                            Rs. {{ number_format($snack->selling_price, 2) }}
                        </p>
                        <span class="product-price text-red-600 font-bold">
                            Rs. {{ number_format($discountedPrice, 2) }}
                        </span>
                        <span class="discount-percent text-green-600 text-sm ml-1">
                            ({{ $snack->product_discount }}% OFF)
                        </span>
                        @else
                        <p class="product-price">
                            Rs. {{ number_format($snack->selling_price, 2) }}
                        </p>
                        @endif
                        <div class="product-actions">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $snack->id }}">
                                <button type="submit" class="btn-product-action btn-add-cart" title="Order Now">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </form>

                            <form method="POST" action="{{ route('wishlist.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $snack->id }}">
                                <button type="submit" class="btn-product-action btn-add-wishlist"
                                    title="Add to Wishlist">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </form>

                            <a href="{{ route('product.quickview', $snack->id) }}"
                                class="btn-product-action btn-view" title="View Product">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            @if (session('success'))
                            <script>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: "{{ session('success') }}",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            </script>
                            @endif

                            @if (session('error'))
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: "{{ session('error') }}",
                                });
                            </script>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- End Mixture Products Section -->

        <!-- Start Welcome Part -->
        <section id="reach-to" class="welcome-part home-icon" style="padding-bottom: 0px">

            <div class="container" style="position: relative;">
                <div class="build-title">
                    <h2>Welcome to Balaji Dosai</h2>
                    <h6>The Home of Authentic South Indian Flavours</h6>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                        data-wow-delay="300ms">
                        <p class="text-center">
                            Since opening our doors in 2008, Balaji Dosai has become a beloved destination for authentic
                            South Indian vegetarian cuisine in Kandy.
                        </p>
                        <p class="text-center">
                            From crisp dosas and fluffy idlis to flavourful curries and meals, every dish is crafted
                            with care, tradition, and a touch of Sri Lankan warmth.
                        </p>
                        <p class="text-center">
                            Whether you’re a local regular or a traveller discovering us for the first time — you’ll
                            always feel at home here.
                        </p>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="300ms">
                        <div class=" mt-3"
                            style="height: 100px; display: flex; justify-content: center; align-items: center">
                            <a href="{{ route('about')}}" class="btn-shop-now">Discover Our Story</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="float-main">
                <div class="icon-top-left">
                    <img src="/assets/images/icon1.png" alt="Spice Icon">
                </div>
                <div class="icon-bottom-left">
                    <img src="/assets/images/icon2.png" class="hidden" alt="Coconut Icon">
                </div>
                <div class="icon-top-right">
                    <img src="/assets/images/icon3.png" class="hidden" alt="Mortar & Pestle Icon">
                </div>
                <div class="icon-bottom-right">
                    <img src="/assets/images/icon4.png" alt="Chef Hat Icon">
                </div>
            </div>
        </section>
        <!-- End Welcome Part -->

        <!-- Start Why People Love Us Part -->
        <section class="why-people-love-us">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Side - Images -->
                    <div class="col-lg-6">
                        <div class="wplu-image-grid">

                            <div class="wplu-main-plate">
                                <img src="/assets/images/index/banner_2.webp" alt="South Indian Thali">
                            </div>

                            <!-- Decorative Elements -->
                            <img src="/assets/images/index/banner-2_vector-4.svg" alt="decorative"
                                class="wplu-pattern-circle wplu-circle-1">
                            <img src="/assets/images/index/banner-2_vector-5.svg" alt="decorative"
                                class="wplu-pattern-circle wplu-circle-2">
                        </div>
                    </div>

                    <!-- Right Side - Content -->
                    <div class="col-lg-6">
                        <div class="wplu-content">
                            <div class="wplu-badge">
                                <span>Why Choose Us ♡</span>
                            </div>
                            <h2 class="wplu-title">A Taste of Home, Wherever You Are</h2>
                            <p class="wplu-description">
                                Whether you’re sitting down for dine-in or grabbing a meal on the go, our promise is
                                simple — to make every meal comforting, authentic, and satisfying.
                            </p>
                            <ul class="wplu-features">
                                <li>
                                    <img src="/assets/images/index/welcome-banner-vector-9.svg" alt="icon"
                                        class="wplu-icon">
                                    <span>100% Pure Vegetarian</span>
                                </li>
                                <li>
                                    <img src="/assets/images/index/welcome-banner-vector-9.svg" alt="icon"
                                        class="wplu-icon">
                                    <span>Freshly Prepared Daily</span>
                                </li>
                                <li>
                                    <img src="/assets/images/index/welcome-banner-vector-9.svg" alt="icon"
                                        class="wplu-icon">
                                    <span>Authentic South Indian Recipes</span>
                                </li>
                                <li>
                                    <img src="/assets/images/index/welcome-banner-vector-9.svg" alt="icon"
                                        class="wplu-icon">
                                    <span>Serving Since 2008</span>
                                </li>
                                <li>
                                    <img src="/assets/images/index/welcome-banner-vector-9.svg" alt="icon"
                                        class="wplu-icon">
                                    <span>Dine-in | Takeaway | Delivery</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Why People Love Us Part -->

        <!-- Start Menu Section -->
        <section class="menu-section">
            <div class="container">
                <div class="menu-header">
                    <h2 class="menu-main-title">MENU</h2>
                    <p class="menu-subtitle">Menu that always makes you fall in love</p>
                </div>

                <!-- Category Tabs -->
                <div class="menu-tabs">
                    <button class="menu-tab active" data-category="dosa">Dosa</button>
                    <button class="menu-tab" data-category="other-mains">Other Mains</button>
                    <button class="menu-tab" data-category="extras">Extras</button>
                    <button class="menu-tab" data-category="drinks">Drinks</button>
                    <button class="menu-tab" data-category="coffee">Coffee</button>
                </div>

                <!-- Menu Grid (uses `assets/images/menuAIfood/` images) -->
                <div class="menu-grid" id="menuGrid">
                    <!-- Dosa Category -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Plain Dosa.jpeg')) }}"
                                alt="Plain Dosa">
                        </div>
                        <h3 class="menu-item-title">Plain Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Paper Dosa.jpeg')) }}"
                                alt="Paper Dosa">
                        </div>
                        <h3 class="menu-item-title">Paper Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Onion Dosa.jpeg')) }}"
                                alt="Onion Dosa">
                        </div>
                        <h3 class="menu-item-title">Onion Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Tomato Onion Uttapam.jpeg')) }}"
                                alt="Tomato Onion Uttapam">
                        </div>
                        <h3 class="menu-item-title">Tomato Onion Uttapam</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Masala Dosa.jpeg')) }}"
                                alt="Masala Dosa">
                        </div>
                        <h3 class="menu-item-title">Masala Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Masala Dosa.jpeg')) }}"
                                alt="Ghee Masala Dosa">
                        </div>
                        <h3 class="menu-item-title">Ghee Masala Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Ghee Dosa">
                        </div>
                        <h3 class="menu-item-title">Ghee Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Kara Dosa.jpeg')) }}"
                                alt="Kara Dosa">
                        </div>
                        <h3 class="menu-item-title">Kara Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mushroom Dosa.jpeg')) }}"
                                alt="Mushroom Dosa">
                        </div>
                        <h3 class="menu-item-title">Mushroom Dosa</h3>
                    </div>

                    <!-- Fallback images for cheese/creative dosas (reuse Ghee Dosa if specific not available) -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Cheese Dosa">
                        </div>
                        <h3 class="menu-item-title">Cheese Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Cheese Onion Dosa">
                        </div>
                        <h3 class="menu-item-title">Cheese Onion Dosa</h3>
                    </div>

                    <!-- Dessert / fusion dosas (use fallback) -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Choco Banana Dosa">
                        </div>
                        <h3 class="menu-item-title">Choco Banana Dosa</h3>
                    </div>

                    <!-- Other Mains -->
                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Idly Set (3pcs).webp')) }}"
                                alt="Idly Set">
                        </div>
                        <h3 class="menu-item-title">Idly Set (3pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mini Sambar Idly (9pcs).jpg')) }}"
                                alt="Mini Sambar Idly">
                        </div>
                        <h3 class="menu-item-title">Mini Sambar Idly (9pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('String Hoppers (10pcs).png')) }}"
                                alt="String Hoppers">
                        </div>
                        <h3 class="menu-item-title">String Hoppers (10pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Chapathi Set and channa (2pcs)')) }}"
                                alt="Chapathi Set">
                        </div>
                        <h3 class="menu-item-title">Chapathi Set w/ channa (2pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Poori Set  potato kima (2pcs).jpg')) }}"
                                alt="Poori Set">
                        </div>
                        <h3 class="menu-item-title">Poori Set w/ potato kima (2pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Vegetable Fried Rice.jpg')) }}"
                                alt="Vegetable Fried Rice">
                        </div>
                        <h3 class="menu-item-title">Vegetable Fried Rice</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Rice & Curry (11am to 3pm).jpeg')) }}"
                                alt="Rice & Curry">
                        </div>
                        <h3 class="menu-item-title">Rice & Curry (11am to 3pm)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('South Indian Thali (11am to 3pm).jpg')) }}"
                                alt="South Indian Thali">
                        </div>
                        <h3 class="menu-item-title">South Indian Thali (11am to 3pm)</h3>
                    </div>

                    <!-- Extras -->
                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ulundu Vada.png')) }}"
                                alt="Ulundu Vada">
                        </div>
                        <h3 class="menu-item-title">Ulundu Vada</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Dhal Vada.jpg')) }}"
                                alt="Dhal Vada">
                        </div>
                        <h3 class="menu-item-title">Dhal Vada</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Bonda.jpg')) }}" alt="Bonda">
                        </div>
                        <h3 class="menu-item-title">Bonda</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Laddu.jpg')) }}" alt="Laddu">
                        </div>
                        <h3 class="menu-item-title">Laddu</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mysorepak.avif')) }}"
                                alt="Mysorepak">
                        </div>
                        <h3 class="menu-item-title">Mysorepak</h3>
                    </div>

                    <!-- Drinks (Lassis & Juices) -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Salt Lassi.jpg')) }}"
                                alt="Salt Lassi">
                        </div>
                        <h3 class="menu-item-title">Salt Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Sweet Lassi.jpg')) }}"
                                alt="Sweet Lassi">
                        </div>
                        <h3 class="menu-item-title">Sweet Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Banana Lassi.jpg')) }}"
                                alt="Banana Lassi">
                        </div>
                        <h3 class="menu-item-title">Banana Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mango Lassi.jpeg')) }}"
                                alt="Mango Lassi">
                        </div>
                        <h3 class="menu-item-title">Mango Lassi</h3>
                    </div>

                    <!-- Fresh juices -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Lime Juice.jpeg')) }}"
                                alt="Lime Juice">
                        </div>
                        <h3 class="menu-item-title">Lime Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Papaya Juice.jpg')) }}"
                                alt="Papaya Juice">
                        </div>
                        <h3 class="menu-item-title">Papaya Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mango Juice.jpg')) }}"
                                alt="Mango Juice">
                        </div>
                        <h3 class="menu-item-title">Mango Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mix Fruit Juice.jpg')) }}"
                                alt="Mix Fruit Juice">
                        </div>
                        <h3 class="menu-item-title">Mix Fruit Juice</h3>
                    </div>

                    <!-- Shakes -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Vanilla Shake.jpg')) }}"
                                alt="Vanilla Shake">
                        </div>
                        <h3 class="menu-item-title">Vanilla Shake</h3>
                    </div>

                    <!-- Coffee -->
                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Americano.jpeg')) }}"
                                alt="Americano">
                        </div>
                        <h3 class="menu-item-title">Americano</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Cappuccino.jpg')) }}"
                                alt="Cappuccino">
                        </div>
                        <h3 class="menu-item-title">Cappuccino</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Caffe Mocha.jpg')) }}"
                                alt="Caffe Mocha">
                        </div>
                        <h3 class="menu-item-title">Caffe Mocha</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Caffe Latte.jpg')) }}"
                                alt="Caffe Latte">
                        </div>
                        <h3 class="menu-item-title">Caffe Latte</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Hot Chocolate.jpg')) }}"
                                alt="Hot Chocolate">
                        </div>
                        <h3 class="menu-item-title">Hot Chocolate</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Espresso.webp')) }}"
                                alt="Espresso">
                        </div>
                        <h3 class="menu-item-title">Espresso</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Espresso Doppio.jpeg')) }}"
                                alt="Espresso Doppio">
                        </div>
                        <h3 class="menu-item-title">Espresso Doppio</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Affogato.jpg')) }}"
                                alt="Affogato">
                        </div>
                        <h3 class="menu-item-title">Affogato</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Flat White.jpeg')) }}"
                                alt="Flat White">
                        </div>
                        <h3 class="menu-item-title">Flat White</h3>
                    </div>

                </div>
                <!-- See more button (appears when a category has more than 9 items) -->
                <div class="menu-see-more-wrap text-center" style="margin-top:18px;">
                    <button id="menuSeeMore" class="btn btn-outline-primary">See More</button>
                </div>
            </div>
        </section>
        <!-- End Menu Section -->

        <!-- A Journey of Flavour. -->
        <section class="client welcome-part home-icon wow fadeInDown signature-dishes journey-section"
            style="padding: 0px" data-background="images/banner3.jpg" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Left Column: Text Content -->
                    <div class="col-lg-6">
                        <div class="journey-content-wrapper">
                            <p class="journey-subtitle">A Journey of Flavour.</p>

                            <h1 class="journey-title">
                                Serving Smiles Since <span class="journey-title-highlight">2008</span>
                            </h1>

                            <p class="journey-description">
                                From our humble beginnings in Kandy, Balaji Dosai has grown into one of Sri Lanka’s most
                                loved vegetarian restaurants.
                            </p>

                            <p class="journey-description">
                                Our journey continues with the same commitment — authentic flavours, pure ingredients,
                                and the joy of serving every guest with a smile.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Images/Videos Grid -->
                    <div class="col-lg-6">
                        <div class="journey-image-wrapper">
                            <!-- "Since 1981" Badge -->
                            <div class="journey-badge">
                                <div class="journey-badge-inner">
                                    <p class="journey-badge-text">Since</p>
                                    <h2 class="journey-badge-year">2008</h2>
                                </div>
                            </div>

                            <!-- Images Grid -->
                            <div class="journey-grid">
                                <!-- Top Left - Vegetable Image -->
                                <div class="journey-grid-item-1">
                                    <video autoplay loop muted playsinline class="journey-video-small">
                                        <source src="/assets/images/index/1.mp4" type="video/mp4">
                                    </video>
                                </div>

                                <!-- Center Large - Cashew Image -->
                                <div class="journey-grid-item-2">
                                    <video autoplay loop muted playsinline class="journey-video-large">
                                        <source src="/assets/images/index/2.mp4" type="video/mp4">
                                    </video>
                                </div>

                                <!-- Bottom Left - Cooking Image -->
                                <div class="journey-grid-item-3">
                                    <video autoplay loop muted playsinline class="journey-video-small">
                                        <source src="/assets/images/index/3.mp4" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--contact us-->
        <div class="contact-section">
            <div class="container">
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-lg-6">
                        <h2 class="section-title">Get In Touch</h2>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Phone">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                            </div>
                            <textarea class="form-control" placeholder="Message"></textarea>

                            <div class="terms-checkbox">
                                <input type="checkbox" id="terms" class="form-check-input">
                                <label for="terms" class="form-check-label ms-2">
                                    I agree to the <a href="#">terms</a> and <a href="#">privacy
                                        policy</a>
                                </label>
                            </div>

                            <button type="button" class="send-btn">Send message</button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div class="col-lg-6 contact-right">
                        <p class="sub-heading">Our Contacts</p>
                        <h2 class="section-title">Visit Us in the Heart of Kandy</h2>
                        <p class="text-muted section-desc">
                            We’re located just minutes away from the Temple of the Tooth — easy to find, hard to forget.
                            Come dine with us or place your order online.
                        </p>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="info-content">
                                <h6>Phone:</h6>
                                <p>+94 812 208 080</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <h6>Open Daily:</h6>
                                <p>7:30 AM – 9:30 PM</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="info-content">
                                <h6>Address:</h6>
                                <p>03 D.S. Senanayake Veediya, Kandy, Sri Lanka</p>
                            </div>
                        </div>

                        <!-- Map Placeholder -->
                        <div class="map-container">
                            <iframe
                                src="https://maps.google.com/maps?width=1000&height=500&hl=en&q=balaji%20dosai%20kany&t=&z=16&ie=UTF8&iwloc=B&output=embed"
                                style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <!-- <div class="map-placeholder"> -->

                            <!-- <i class="fas fa-map-marked-alt location-marker"></i> -->
                            <!-- </div> -->
                            <!-- <div class="map-label">Pottuvil</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Banner Section -->
        <section class="tradition-banner-section">
            <div class="banner-overlay"></div>
            <div class="banner-image-bg" style="background-image: url('/assets/images/banner/banner.jpg');"></div>
            <div class="container banner-content-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="banner-text-content">
                            <p class="banner-since">Since 2008</p>
                            <h1 class="banner-main-title">17 Years of Tradition, <br>Happiness & Trust</h1>
                            <p class="banner-description">
                                Since 2008, Balaji Dosai has been bringing South Indian vegetarian flavours to Sri Lanka
                                — with
                                purity, passion, and a promise of consistency in every meal.
                            </p>
                            <a href="#" class="btn-banner-read-more">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Banner Section -->

    </div>
</main>
<!-- End Main -->
<script>
    (function(){
            // Menu tab filtering + See More functionality
            const TILES_PER_PAGE = 9;
            const tabs = document.querySelectorAll('.menu-tab');
            const items = Array.from(document.querySelectorAll('.menu-grid .menu-item'));
            const seeMoreBtn = document.getElementById('menuSeeMore');
            let activeCategory = 'dosa';
            let expanded = false;

            function applyFilter() {
                // hide all then show matching
                const matching = items.filter(i => i.dataset.category === activeCategory);
                items.forEach(i => i.style.display = 'none');

                matching.forEach((el, idx) => {
                    if (!expanded && idx >= TILES_PER_PAGE) {
                        el.style.display = 'none';
                        el.classList.add('hidden-by-page');
                    } else {
                        el.style.display = '';
                        el.classList.remove('hidden-by-page');
                    }
                });

                // Show/Hide See More button
                if (matching.length > TILES_PER_PAGE) {
                    if (seeMoreBtn) {
                        seeMoreBtn.style.display = 'inline-block';
                        seeMoreBtn.textContent = expanded ? 'See Less' : 'See More';
                    }
                } else {
                    if (seeMoreBtn) seeMoreBtn.style.display = 'none';
                }
            }

            // Tab clicks
            tabs.forEach(t => t.addEventListener('click', function(){
                tabs.forEach(x => x.classList.remove('active'));
                this.classList.add('active');
                activeCategory = this.dataset.category;
                expanded = false;
                applyFilter();
            }));

            // See more click
            if (seeMoreBtn) {
                seeMoreBtn.addEventListener('click', function(){
                    expanded = !expanded;
                    applyFilter();
                });
            }

            // Init
            applyFilter();
        })();
</script>
@endsection