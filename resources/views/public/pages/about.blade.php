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
                        <a href="index.html">Home</a>
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
                    <div class="build-title">
                        <h2 style="color: white">Balaji Dosai</h2>
                        <h6 style="color: white !important;">About Us</h6>
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
                            <img src="/assets/images/food-cards/rice-curry.webp" alt="Rice & Curry"
                                style="border-radius: 16px; max-width: 100%; height: auto;" class="my-img-pt">
                            <p style="color: #fff; font-size: 14px; margin-top: 8px;">Experience genuine village-style
                                cooking</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Welcome Part -->

            <!-- Start Our Story Section -->
            <section class="welcome-part home-icon wow fadeInDown" style="padding: 80px 0; background-color: #f9f9f9;"
                data-wow-duration="1000ms" data-wow-delay="300ms">
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

        </div>
    </main>
    <!-- End Main -->
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
                    <img src="/assets/images/chef1.png" alt="Chef 1">
                    <div class="chef-name">Chef Balaji</div>
                    <div class="chef-role">Head Chef</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef2.png" alt="Chef 2">
                    <div class="chef-name">Chef Anjali</div>
                    <div class="chef-role">Dosai Specialist</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef3.png" alt="Chef 3">
                    <div class="chef-name">Chef Ramesh</div>
                    <div class="chef-role">Curries & Hoppers</div>
                </div>
                <div class="chef-card">
                    <img src="/assets/images/chef4.png" alt="Chef 4">
                    <div class="chef-name">Chef Nirmala</div>
                    <div class="chef-role">Sweets & Sides</div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Chefs Section -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/about.css') }}" />
@endpush
