@extends('public.layouts.app')
@section('title', 'Home')
@section('content')
    <!-- Start Main -->
    <main style="position: relative; z-index: auto;">
        <div class="main-part">
            <section class="hero-section" style="margin-top: 80px;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-6 hero-content">
                            <div class="ps-lg-5">
                                <div class="welcome-badge">Welcome To Balaji Dosai</div>
                                <h1 class="hero-title">Fresh<br>Authentic<br>Unmistakably South Indian</h1>
                                <p class="hero-description">
                                    Since 2008, Balaji Dosai has been serving the true taste of South India - from crispy dosas to comforting curries - prepared fresh daily with Sri Lankan warmth and hospitality.
                                </p>
                                <div class="button-group">
                                    <a href="{{ route('specialties') }}" class="btn btn-menu">View Menu</a>
                                    <a href="#" class="btn btn-contact">Order Online</a>{{-- {{ route('shop.index') }} --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="image-container">
                                <!-- Replace these src attributes with your actual image paths -->
                                <img src="/assets/images/hero-bgs/plate.png" alt="Dosa Plate" class="plate-image">
                                <img src="/assets/images/hero-bgs/tall.png" alt="Utensils" class="utensils-image">

                                <!-- Branch decorations - replace with your branch images -->
                                <img src="/assets/images/hero-bgs/leaf-up.webp" alt=""
                                    class="branch-decoration branch-1">
                                <img src="/assets/images/hero-bgs/leaf-down.webp" alt=""
                                    class="branch-decoration branch-2">

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
                                        <img src="/assets/images/index/Samosa.webp" alt="Samosa"
                                            class="food-item food-10">
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
                        <a href="#" class="btn-shop-now">Explore All</a>{{-- {{ route('shop.index')}} --}}
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

                                    {{-- <a href="{{ route('product.quickview', $snack->id) }}"
                                        class="btn-product-action btn-view" title="View Product">
                                        <i class="fa-solid fa-eye"></i>
                                    </a> --}}

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
            <section id="reach-to" class="welcome-part home-icon">

                <div class="container" style="position: relative;">
                    <div class="build-title">
                        <h2>Welcome to Balaji Dosai</h2>
                        <h6>The Home of Authentic South Indian Flavours</h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInDown" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <p class="text-center">
                                Since opening our doors in 2008, Balaji Dosai has become a beloved destination for authentic South Indian vegetarian cuisine in Kandy.
                            </p>
                            <p class="text-center">
                                From crisp dosas and fluffy idlis to flavourful curries and meals, every dish is crafted with care, tradition, and a touch of Sri Lankan warmth.
                            </p>
                            <p class="text-center">
                                Whether you’re a local regular or a traveller discovering us for the first time — you’ll always feel at home here.
                            </p>
                            
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <div class=" mt-3" style="height: 100px; display: flex; justify-content: center; align-items: center">
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

            <!-- About (hidden) -->
            {{-- <section style="border-top: 3px solid #eee; position: relative;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="build-title">
                                <h6 class="text-start">About Us</h6>
                                <h3 class="text-start">The Sri Lanka's Favourite South Indian Vegetarian Restaurant.
                                </h3>
                            </div>
                            <p>
                                Step into a world where every dosa tells a story, every aroma brings back home, and
                                every bite celebrates tradition — welcome to the global kitchen of South India.
                            </p>
                            <div class="btn-outer text-center text-lg-start desktop-only">
                                <a href="about.html" class="btn-main btn-shadow">More Info</a>
                            </div>
                        </div>
                        <div class="d-lg-none" style="height: 30px;"></div>
                        <div class="col-lg-6">
                            <img src="/assets/images/about-images/Dosai.png" alt=""
                                style="border-radius: 3px; width: 100%; height: auto; object-fit: cover;">
                            <div class="mobile-only" style="margin-top:18px; text-align:center;">
                                <a href="about.html" class="btn-main btn-shadow">More Info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}

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
                                    Whether you’re sitting down for dine-in or grabbing a meal on the go, our promise is simple — to make every meal comforting, authentic, and satisfying.
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
                        <p class="menu-subtitle">Explore Our Signature Dosas & More</p>
                        <p class="menu-subtitle">
                            Dive into our full menu of South Indian classics — crisp dosas, fluffy idlis, hearty thalis, and sweet treats.
                        </p>
                    </div>

                    <!-- Category Tabs -->
                    <div class="menu-tabs">
                        <button class="menu-tab active" data-category="dosa">Dosa</button>
                        <button class="menu-tab" data-category="idli">Idli</button>
                        {{-- <button class="menu-tab" data-category="chutney">Chutney</button> --}}
                        <button class="menu-tab" data-category="rice">Rice</button>
                        {{-- <button class="menu-tab" data-category="seval">Seval</button>
                        <button class="menu-tab" data-category="uttapam">Uttapam</button>
                        <button class="menu-tab" data-category="vada">Vada</button> --}}
                        <button class="menu-tab" data-category="starters">Starters</button>
                        <button class="menu-tab" data-category="sweets">Sweets</button>
                        <button class="menu-tab" data-category="beverages">Juices</button>
                        {{-- <button class="menu-tab" data-category="other">Other</button> --}}
                    </div>

                    <!-- Menu Grid -->
                    <div class="menu-grid" id="menuGrid">
                        <!-- Dosa Category -->
                        <div class="menu-item" data-category="dosa">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Ghee-Dos.webp" alt="Beetroot Ghee Roast">
                            </div>
                            <h3 class="menu-item-title">Beetroot Ghee Roast</h3>
                        </div>
                        <div class="menu-item" data-category="dosa">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Ghee-Dos.webp" alt="Dhaniya Dosa">
                            </div>
                            <h3 class="menu-item-title">Dhaniya Dosa</h3>
                        </div>
                        <div class="menu-item" data-category="dosa">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Ghee-Dos.webp" alt="Dhaniya Ghee Roast">
                            </div>
                            <h3 class="menu-item-title">Dhaniya Ghee Roast</h3>
                        </div>
                        <div class="menu-item" data-category="dosa">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Ghee-Dos.webp" alt="Garlic Dosa">
                            </div>
                            <h3 class="menu-item-title">Garlic Dosa</h3>
                        </div>

                        <!-- Idli Category -->
                        <div class="menu-item" data-category="idli">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Podi-Idly.webp" alt="Idly">
                            </div>
                            <h3 class="menu-item-title">Idly</h3>
                        </div>
                        <div class="menu-item" data-category="idli">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Podi-Idly.webp" alt="Podi Idly">
                            </div>
                            <h3 class="menu-item-title">Podi Idly</h3>
                        </div>
                        <div class="menu-item" data-category="idli">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/string-hoppers.jpg" alt="String Hoppers">
                            </div>
                            <h3 class="menu-item-title">String Hoppers</h3>
                        </div>
                        <div class="menu-item" data-category="idli">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/pittu.jpeg" alt="Pittu">
                            </div>
                            <h3 class="menu-item-title">Pittu</h3>
                        </div>

                        <!-- Rice Category -->
                        <div class="menu-item" data-category="rice">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/rice-curry.webp" alt="Rice & Curry">
                            </div>
                            <h3 class="menu-item-title">Rice & Curry</h3>
                        </div>
                        <div class="menu-item" data-category="rice">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/milk-rice.jpg" alt="Milk Rice">
                            </div>
                            <h3 class="menu-item-title">Milk Rice</h3>
                        </div>
                        <div class="menu-item" data-category="rice">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Ghee-Pongal.webp" alt="Ghee Pongal">
                            </div>
                            <h3 class="menu-item-title">Ghee Pongal</h3>
                        </div>
                        <div class="menu-item" data-category="rice">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/kottu.jpg" alt="Kottu">
                            </div>
                            <h3 class="menu-item-title">Kottu</h3>
                        </div>

                        <!-- Chutney Category -->
                        <div class="menu-item" data-category="chutney">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/coco-sambol.jpg" alt="Coconut Sambol">
                            </div>
                            <h3 class="menu-item-title">Coconut Sambol</h3>
                        </div>

                        <!-- Seval Category (String Hoppers variants) -->
                        <div class="menu-item" data-category="seval">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/string-hoppers.jpg" alt="String Hoppers">
                            </div>
                            <h3 class="menu-item-title">String Hoppers</h3>
                        </div>

                        <!-- Uttapam Category -->
                        <div class="menu-item" data-category="uttapam">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/hoppers.jpg" alt="Hoppers">
                            </div>
                            <h3 class="menu-item-title">Hoppers</h3>
                        </div>
                        <div class="menu-item" data-category="uttapam">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/egg-hoppers.jpg" alt="Egg Hoppers">
                            </div>
                            <h3 class="menu-item-title">Egg Hoppers</h3>
                        </div>

                        <!-- Vada Category -->
                        <div class="menu-item" data-category="vada">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Medhu-Vada.webp" alt="Medhu Vada">
                            </div>
                            <h3 class="menu-item-title">Medhu Vada</h3>
                        </div>
                        <div class="menu-item" data-category="vada">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Onion-Medhu-Vada.webp" alt="Onion Vada">
                            </div>
                            <h3 class="menu-item-title">Onion Vada</h3>
                        </div>
                        <div class="menu-item" data-category="vada">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Masala-Vada.webp" alt="Masala Vada">
                            </div>
                            <h3 class="menu-item-title">Masala Vada</h3>
                        </div>

                        <!-- Other Category -->
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Poori.webp" alt="Poori">
                            </div>
                            <h3 class="menu-item-title">Poori</h3>
                        </div>
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Mysore-Bonda.webp" alt="Mysore Bonda">
                            </div>
                            <h3 class="menu-item-title">Mysore Bonda</h3>
                        </div>
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Pani-Poori.webp" alt="Pani Poori">
                            </div>
                            <h3 class="menu-item-title">Pani Poori</h3>
                        </div>
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/index/Samosa.webp" alt="Samosa">
                            </div>
                            <h3 class="menu-item-title">Samosa</h3>
                        </div>
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/coco-roti.jpg" alt="Coconut Roti">
                            </div>
                            <h3 class="menu-item-title">Coconut Roti</h3>
                        </div>
                        <div class="menu-item" data-category="other">
                            <div class="menu-item-image">
                                <img src="/assets/images/food-cards/halapa.jpg" alt="Halapa">
                            </div>
                            <h3 class="menu-item-title">Halapa</h3>
                        </div>
                    </div>

                    <div class="" style="padding-top: 30px; display: flex; justify-content: center; align-items: center">
                        <a href="#" class="btn-shop-now">View Full Menu</a>{{-- {{ route('shop.index')}} --}}
                    </div>
                </div>
            </section>
            <!-- End Menu Section -->

            <!-- A Journey of Flavour. -->
            <section class="client bg-skeen home-icon wow fadeInDown signature-dishes journey-section"
                data-background="images/banner3.jpg" data-wow-duration="1000ms" data-wow-delay="300ms">
                <!-- Decorative SVG at top
                                                    <img src="/assets/images/index/banner-6_vector-3.svg" alt="decorative" class="journey-decorative-svg">

                                                    <div class="icon-default">
                                                        <img src="/assets/images/icon16.png" alt="Icon" class="icon-black-new">
                                                    </div> -->
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
                                    From our humble beginnings in Kandy, Balaji Dosai has grown into one of Sri Lanka’s most loved vegetarian restaurants.
                                </p>

                                <p class="journey-description">
                                    Our journey continues with the same commitment — authentic flavours, pure ingredients, and the joy of serving every guest with a smile.
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

            <!-- Start Testimonials Section -->
            <!-- <section class="testimonials-section">
                <div class="container">
                    <div class="testimonials-header">
                        <h2 class="testimonials-title">TESTIMONIALS</h2>
                        <p class="testimonials-subtitle">Loved by Thousands of Guests</p>
                        <p class="testimonials-subtitle">Here’s what our guests say about their experience with us.</p>
                    </div>

                    <div class="testimonials-grid">

                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "I had the pleasure of dining at Balaji Dosai in Kandy, and it was truly an enjoyable
                                experience. The food was superb — rich in flavor, freshly prepared, and served with generous
                                portions. What made the visit even more memorable was the warm hospitality. Overall, Balaji
                                Dosai in Kandy is highly recommended for anyone looking for delicious food and excellent
                                service."
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client1.png" alt="MuhdZaki Samsudeen">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">MuhdZaki Samsudeen</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "We had to wait a few minutes outside till a table became vacant, as we visited Balaji Dosai
                                during a busy dinner time. I ordered a Kara Dosai. It was spicy, tasty & did not disappoint.
                                The vegetable fried rice was good as well."
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client2.png" alt="Himantha Alahakoon">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">Himantha Alahakoon</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "Balaji Dosai is a fully vegetarian Indian restaurant in Kandy, offering clean and authentic
                                food at a reasonable price. They have a good variety of dishes, and the taste is definitely
                                worth it. The friendly service and pleasant atmosphere make it a great spot to enjoy a
                                meal—especially since it's conveniently located near the Dalada Maligawa."
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client3.png" alt="Chashika Malshan">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">Chashika Malshan</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "Amazing place for dosa.. Their masala dosa is just so good. I wish it was more spicy, but
                                no complaints… It was so worth the price. For the price you pay, it was definitely worth
                                it!"
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client4.png" alt="R O S H A N">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">R O S H A N</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "Super Dosa and Uludu wade... and the lime juice was perfectly balanced. Absolute value for
                                money, but better yet, fantastic food and service. Will visit again when in Kandy. The Ghee
                                masala dosa is "
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client5.png" alt="Jonathan Martenstyn">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">Jonathan Martenstyn</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="testimonial-card">
                            <div class="quote-icon">❝</div>
                            <p class="testimonial-text">
                                "Great but simple masala dosa. Must try and a good banker between local (although Indian and
                                not Sri Lankan) and accessible for tourists. Accompanied with some great mango lassi."
                            </p>
                            <div class="testimonial-author">
                                <div class="author-avatar">
                                    <img src="/assets/images/client1.png" alt="Alex Stanier">
                                </div>
                                <div class="author-info">
                                    <h4 class="author-name">Alex Stanier</h4>
                                    <div class="author-rating">
                                        ⭐⭐⭐⭐⭐
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- End Testimonials Section -->

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
                                We’re located just minutes away from the Temple of the Tooth — easy to find, hard to forget. Come dine with us or place your order online.
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
        </div>
    </main>
    <!-- End Main -->

    <!-- Start FAQ Section -->
    <!-- <section class="faq-section">
        <div class="container">
            <div class="faq-header">
                <h2 class="faq-title">FAQ</h2>
                <div class="faq-title-underline"></div>
                <p class="faq-subtitle">Got Questions? We’ve Got Answers.</p>
            </div>

            <div class="faq-accordion">

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Is Balaji Dosai 100% vegetarian?</span>
                        <span class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>Yes, we serve only vegetarian and vegan-friendly dishes.</p>
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do you take reservations?</span>
                        <span class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>We operate on a first-come basis, but we can accommodate groups.</p>
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do you deliver?</span>
                        <span class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>Yes, via Uber Eats and PickMe Food.</p>
                    </div>
                </div>


                <div class="faq-item">
                    <button class="faq-question">
                        <span>Do you use onion and garlic in all dishes?</span>
                        <span class="faq-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M19 9L12 16L5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>
                    <div class="faq-answer">
                        <p>We offer Jain-friendly options on request.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End FAQ Section -->

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
                            Since 2008, Balaji Dosai has been bringing South Indian vegetarian flavours to Sri Lanka — with purity, passion, and a promise of consistency in every meal.
                        </p>
                        <a href="#" class="btn-banner-read-more">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->
@endsection
