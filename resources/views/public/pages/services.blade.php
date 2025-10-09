@extends('public.layouts.app')
@section('title', 'Services')
@section('content')
    <!-- Start Main -->
    <main>
        <div class="main-part">
            <!-- Start Breadcrumb Part -->
            <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
                style="background-image: url('/assets/images/breadbg1.jpg');">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <h2>Our ServICE</h2>
                        <a href="index.html">Home</a>
                        <span>Our Service</span>
                    </div>
                </div>
            </section>
            <!-- End Breadcrumb Part -->
            <section class="bg-skeen home-icon wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="icon-default icon-skeen">
                    <img src="/assets/images/scroll-arrow.png" alt="">
                </div>
                <div class="container">
                    <div class="build-title">
                        <h2>Balaji Dosai Service</h2>
                        <h6>This is what we do and we do it perfectly</h6>
                    </div>
                    <div class="service-track">
                        <div class="row">
                            <!-- Dine-In Experience -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-track-inner btn-shadow">
                                    <div class="service-track-info">
                                        <h3>Dine-In <span>Experience</span></h3>
                                    </div>
                                    <div class="service-track-overlay banner-bg" data-background="images/hover-img1.png">
                                        <img src="/assets/images/img36.png" alt="Comfortable dining">
                                        <h4 style="margin: 10px 0px;">Dine-In <span>Experience</span></h4>
                                        <p>Enjoy freshly prepared dosai, curries and house specialties served in a
                                            warm, family-friendly dining room.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Takeaway & Delivery -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-track-inner btn-shadow">
                                    <div class="service-track-info">
                                        <h3>Takeaway &amp; <span>Delivery</span></h3>
                                    </div>
                                    <div class="service-track-overlay banner-bg" data-background="images/hover-img1.png">
                                        <img src="/assets/images/img36.png" alt="Takeaway">
                                        <h4 style="margin: 10px 0px;">Takeaway &amp; <span>Delivery</span></h4>
                                        <p>Quick, reliable takeaway and delivery options so you can enjoy our food at
                                            home or on the go.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Catering Services -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-track-inner btn-shadow">
                                    <div class="service-track-info">
                                        <h3>Event <span>Catering</span></h3>
                                    </div>
                                    <div class="service-track-overlay banner-bg" data-background="images/hover-img1.png">
                                        <img src="/assets/images/img36.png" alt="Catering services">
                                        <h4 style="margin: 10px 0px;">Event <span>Catering</span></h4>
                                        <p>Full-service catering for parties, corporate events and weddings with
                                            customizable menus and professional staff.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Private Dining & Bookings -->
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="service-track-inner btn-shadow">
                                    <div class="service-track-info">
                                        <h3>Private <span>Dining</span></h3>
                                    </div>
                                    <div class="service-track-overlay banner-bg" data-background="images/hover-img1.png">
                                        <img src="/assets/images/img36.png" alt="Private dining">
                                        <h4 style="margin: 10px 0px;">Private <span>Dining</span></h4>
                                        <p>Book private tables or exclusive dining experiences for special occasions
                                            with bespoke menus and attentive service.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Start Client Say -->
            <section class="client banner-bg invert invert-black home-icon wow fadeInDown"
                data-background="images/banner3.jpg" data-wow-duration="1000ms" data-wow-delay="300ms">
                <div class="icon-default">
                    <img src="/assets/images/icon21.png" alt="Testimonials Icon" class="icon-black-new">
                </div>
                <div class="container">
                    <div class="build-title">
                        <h2>What Our Customers Say</h2>
                        <h6>Trusted by hundreds of happy guests</h6>
                    </div>
                    <div class="client-say">
                        <div class="owl-carousel owl-theme" data-items="1" data-laptop="1" data-tablet="1" data-mobile="1"
                            data-nav="false" data-dots="true" data-autoplay="true" data-speed="1800" data-autotime="5000">
                            <!-- Customer 1 (Sri Lanka) -->
                            <div class="item">
                                <p><img src="/assets/images/client1.png" alt="Mr Lahiru Kumara"></p>
                                <h5>Mr Lahiru Kumara &#x1F1F1;&#x1F1F0;</h5>
                                <p>Local Customer, Kandy</p>
                                <p>"Fantastic flavours and warm hospitality. The dosai and rice & curry brought back
                                    memories of home. Highly recommend the cooking demo — very authentic."</p>
                            </div>
                            <!-- Customer 2 (India) -->
                            <div class="item">
                                <p><img src="/assets/images/client2.png" alt="Ms Priya Sharma"></p>
                                <h5>Ms Priya Sharma &#x1F1EE;&#x1F1F3;</h5>
                                <p>Visitor from India</p>
                                <p>"Amazing class! I learned new spice combinations and how to make perfect hoppers.
                                    Friendly staff and a great market tour included."</p>
                            </div>
                            <!-- Customer 3 (UK / USA mix) -->
                            <div class="item">
                                <p><img src="/assets/images/client3.png" alt="Mr John Smith"></p>
                                <h5>Mr John Smith &#x1F1EC;&#x1F1E7;/&#x1F1FA;&#x1F1F8;</h5>
                                <p>International Visitor</p>
                                <p>"A memorable meal and a fun hands-on experience. Left with new recipes and
                                    stories to share — would come back again."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Client Say -->
            <!-- Start Feature list -->
            <section class="bg-skeen feature-list text-center home-icon wow fadeInDown" data-wow-duration="1000ms"
                data-wow-delay="300ms">
                <div class="icon-default icon-skeen">
                    <img src="/assets/images/icon22.png" alt="Benefits Icon">
                </div>
                <div class="container">
                    <div class="build-title">
                        <h2>Why Choose Us?</h2>
                        <h6>Discover what makes our restaurant special</h6>
                    </div>
                    <div class="row">
                        <!-- Feature 1 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature-list-icon">
                                <div class="feature-icon-table">
                                    <img src="/assets/images/img9.png" alt="Authentic Taste Icon">
                                </div>
                            </div>
                            <h5>Authentic South Indian Flavors</h5>
                            <p>Experience the true taste of South India with recipes passed down through generations.</p>
                        </div>
                        <!-- Feature 2 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature-list-icon">
                                <div class="feature-icon-table">
                                    <img src="/assets/images/img10.png" alt="Fresh Ingredients Icon">
                                </div>
                            </div>
                            <h5>Fresh Quality Ingredients</h5>
                            <p>We use only the freshest ingredients to ensure every dish is perfect.</p>
                        </div>
                        <!-- Feature 3 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature-list-icon">
                                <div class="feature-icon-table">
                                    <img src="/assets/images/img11.png" alt="Expert Chefs Icon">
                                </div>
                            </div>
                            <h5>Expert Chefs</h5>
                            <p>Our skilled chefs bring years of experience in traditional South Indian cuisine.</p>
                        </div>
                        <!-- Feature 4 -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="feature-list-icon">
                                <div class="feature-icon-table">
                                    <img src="/assets/images/img12.png" alt="Warm Hospitality Icon">
                                </div>
                            </div>
                            <h5>Warm Hospitality</h5>
                            <p>Enjoy a welcoming atmosphere and friendly service that makes you feel at home.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Feature list -->
        </div>
    </main>
    <!-- End Main -->
@endsection
