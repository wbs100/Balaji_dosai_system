@extends('public.layouts.app')
@section('title', 'About')
@section('content')
<!-- Start Main -->
<main>
    <div class="main-part">
        <!-- Start Breadcrumb Part -->
        <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
            style="background-image: url('/assets/images/breadbg1.jpg');">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h2>About Us</h2>
                    <a href="/">Home</a>
                    <span>About Us</span>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Part -->
        <!-- Start Welcome Part -->
        <section class="welcome-part home-icon wow fadeInDown"
            style="background: url(/assets/images/sl-cuisine.jpg) no-repeat; background-size: cover;"
            data-wow-duration="1000ms" data-wow-delay="300ms">
            <div
                style="position: absolute; top: 0px; left: 0%; width: 100%; height: 100%; background-color: #000; opacity: .5; z-index: 1;">
            </div>
            <div class="icon-default">
                <a href="#"><img src="/assets/images/scroll-arrow.png" alt=""></a>
            </div>
            <div class="container" style="position: relative; z-index: 10;">
                <div class="build-title" role="banner" aria-label="Balaji Dosai — A Legacy of Taste and Tradition">
                    <h2 style="color: white">Balaji Dosai — A Legacy of Taste and Tradition</h2>
                    <h6 style="color: white !important;">Authentic South Indian vegetarian flavours — made fresh in
                        Kandy since 2008.</h6>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3 style="color: #fff; margin-bottom: 15px;">Authentic South Indian & Sri Lankan Flavours</h3>
                        <p style="margin-bottom: 10px; color: #fff;">
                            Located in the heart of Kandy, Balaji Dosai has been serving traditional South
                            Indian and Sri Lankan home-style cuisine for years. We focus on fresh,
                            high-quality ingredients and time-honoured recipes — from crispy dosai and
                            flavourful curries to fragrant rice dishes and homemade chutneys.
                        </p>
                        <p style="margin-bottom: 10px; color: #fff;">
                            More than a restaurant, Balaji Dosai offers hands-on village-style cooking
                            experiences and small group classes where guests can learn authentic techniques,
                            local ingredients, and regional recipes guided by experienced home cooks.
                        </p>
                        <ul style="color:#fff; margin-top:10px;">
                            <li>Daily dine-in and takeaway — classic dosai, kottu, hoppers, and rice & curry</li>
                            <li>Private cooking classes & culinary demonstrations by appointment</li>
                            <li>Authentic family recipes, sustainable local produce, warm village hospitality</li>
                        </ul>
                        <p style="margin-top:12px; color: #fff;">
                            Visit us at: 03 D.S. Senanayaka Street, Kandy<br>
                            Phone: 0812 224 593
                        </p>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="/assets/images/food-cards/rice-curry.webp"
                            alt="Rice & Curry — Traditional Kandy-style rice & curry from Balaji Dosai" loading="lazy"
                            decoding="async" style="border-radius: 16px; max-width: 100%; height: auto;"
                            class="my-img-pt">
                        <p style="color: #fff; font-size: 14px; margin-top: 8px;">Experience genuine village-style
                            cooking and authentic flavours</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Welcome Part -->

        <!-- Our Story / Mission / Vision -->
        <section class="about-story-section" style="padding: 40px 0; background: transparent;">
            <div class="container">
                <div class="story-card" style="max-width: 980px; margin: 0 auto 30px;">
                    <div class="card-inner"
                        style="background: #fff; border-radius: 12px; padding: 28px; box-shadow: 0 6px 18px rgba(0,0,0,0.06);">
                        <h3 style="color:#1f7a3a; font-size: 24px; margin-bottom: 10px;">Our Story</h3>
                        <div style="width:48px; height:4px; background:#9ccf73; border-radius:2px; margin-bottom:16px;">
                        </div>
                        <p style="color:#444; line-height:1.8; margin-bottom:12px;"><strong>Our story begins in the
                                1980s</strong>, when <strong>our grandfather</strong> ran a small vegetarian restaurant
                            in <strong>Matale, Sri Lanka</strong>. The aroma of freshly ground spices, sizzling dosas,
                            and simmering sambars filled the air — and that is where <strong>our father</strong> grew
                            up, surrounded by the rhythm of authentic South Indian cooking and the joy of serving
                            wholesome food.</p>
                        <p style="color:#444; line-height:1.8;">In <strong>2008</strong>, carrying forward that legacy,
                            <strong>our father opened Balaji Dosai in Kandy</strong> — a humble restaurant built on the
                            same principles of <strong>purity, consistency, and care</strong>. What began as a family
                            eatery has grown into a beloved destination for dosas, idlis, vadas, thalis and more — where
                            every plate tells a story of heritage and heart.
                        </p>
                    </div>
                </div>

                <div class="story-columns" style="gap:24px; display:flex; flex-wrap:wrap; margin-top:18px;">
                    <div class="story-column"
                        style="flex:1 1 320px; background:#fff; border-radius:12px; padding:24px; box-shadow:0 6px 18px rgba(0,0,0,0.05);">
                        <h4 style="color:#1f7a3a; font-size:20px; margin-bottom:10px;">Our Mission</h4>
                        <div style="width:40px; height:4px; background:#9ccf73; border-radius:2px; margin-bottom:12px;">
                        </div>
                        <p style="color:#444; line-height:1.7;">To preserve the true essence of <strong>South Indian
                                vegetarian cuisine</strong> by serving wholesome, authentic meals prepared with care,
                            consistency, and respect for tradition. We create memorable dining experiences that nourish
                            both body and soul — where every guest is welcomed with warmth.</p>
                    </div>

                    <div class="story-column"
                        style="flex:1 1 320px; background:#fff; border-radius:12px; padding:24px; box-shadow:0 6px 18px rgba(0,0,0,0.05);">
                        <h4 style="color:#1f7a3a; font-size:20px; margin-bottom:10px;">Our Vision</h4>
                        <div style="width:40px; height:4px; background:#9ccf73; border-radius:2px; margin-bottom:12px;">
                        </div>
                        <p style="color:#444; line-height:1.7;">To make <strong>Balaji Dosai</strong> a trusted name for
                            authentic vegetarian cuisine across Sri Lanka and beyond — recognized for unwavering
                            commitment to <strong>quality, hospitality,</strong> and <strong>tradition</strong>.</p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Start Our Story Section -->
        <section class="welcome-part home-icon wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <div style="background: #f0f8f0; padding: 40px; border-radius: 12px; position: relative;">

                            <h1 style="color: #6b8e23; font-size: 32px; margin-bottom: 20px;">Kandy's Favourite South
                                Indian & Sri Lankan Restaurant</h1>
                            <div style="display: flex; gap: 20px; margin-top: 30px; flex-wrap: wrap;">
                                <img src="/assets/images/logo.png" alt="Balaji Dosai Logo"
                                    style="width: 220px; margin-bottom: 20px;">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h2 style="font-size: 32px; margin-bottom: 30px; color: #333;">Authentic Flavours in the Heart
                            of Kandy</h2>
                        <p style="color: #666; line-height: 1.8; margin-bottom: 20px;">
                            In a world where food brings people together with cultures and memories, we believe that
                            authentic
                            home-style cooking should be accessible to everyone. At <strong>Balaji Dosai</strong>, we
                            bring you the
                            <strong>taste of traditional South Indian and Sri Lankan cuisine</strong>, prepared with
                            love and dedication
                            to perfection. We're now a part of daily life for the people of Kandy and visitors from
                            around the world.
                        </p>
                        <p style="color: #666; line-height: 1.8;">
                            Located on <strong>D.S. Senanayaka Street, Kandy</strong>, our restaurant offers an
                            extensive menu featuring
                            crispy dosai, flavourful kottu, authentic hoppers, traditional rice & curry, and much more —
                            all made
                            fresh from scratch with the same warmth, attention to detail, and highest standards every
                            single day.
                        </p>
                    </div>
                </div>
            </div>
        </section>

    
    <!-- Start Chefs Section -->
    <section class="chefs-section">
        <div class="container">
            <div class="build-title text-center" style="margin-bottom: 30px;">
                <h2>Meet Our Chefs</h2>
                <p style="color:#666; max-width:700px; margin:8px auto 0;">Our passionate cooks bring family recipes and
                    local flavours to every plate. Get to know the team behind Balaji Dosai.</p>
            </div>
            <div class="chefs-grid">
                <div class="chef-card">
                    <img src="/assets/images/chef1.png" alt="Chef Balaji — Head Chef at Balaji Dosai" loading="lazy"
                        decoding="async">
                    <div class="chef-name">Chef Balaji</div>
                    <div class="chef-role">Head Chef</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef2.png" alt="Chef Anjali — Dosai Specialist" loading="lazy"
                        decoding="async">
                    <div class="chef-name">Chef Anjali</div>
                    <div class="chef-role">Dosai Specialist</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef3.png" alt="Chef Ramesh — Curries & Hoppers" loading="lazy"
                        decoding="async">
                    <div class="chef-name">Chef Ramesh</div>
                    <div class="chef-role">Curries & Hoppers</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef4.png" alt="Chef Nirmala — Sweets & Sides" loading="lazy"
                        decoding="async">
                    <div class="chef-name">Chef Nirmala</div>
                    <div class="chef-role">Sweets & Sides</div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chefs Section -->

    <!-- Start Our the awards & recognitio Section -->
    <section class="welcome-part home-icon wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="container">
            <div class="build-title" style="text-align:center; margin-bottom:18px;">
                <h2 style="color:#1f7a3a; margin-bottom:6px;">Awards & Recognition</h2>
                <p style="color:#666; margin:0;">Honours, press and community recognition for Balaji Dosai</p>
            </div>
            <div style="padding:0; margin:0;">
                <img src="/assets/images/about/owner.jpg"
                    alt="Owner of Balaji Dosai — standing in front of the restaurant"
                    style="width:100%; height:700px; display:block; border-radius:12px; object-fit:cover;"
                    loading="lazy" decoding="async">
            </div>
            <div style="max-width:360px; margin:18px auto 0; text-align:center;">
                <img style="width:100%; height:auto; display:block; border-radius:8px; box-shadow:0 6px 18px rgba(0,0,0,0.06);"
                    loading="lazy" decoding="async">
                <p style="color:#444; font-size:14px; margin-top:10px;">Annapurna Certificate - 2023. Awarded by the
                    Indian Council for Cultural Relations (ICCR) to Balaji Dosai, Kandy, Sri Lanka.</p>
            </div>
        </div>
    </section>
    <!-- End Our the awards & recognitio Section -->
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/assets/css/about.css') }}" />
@endpush