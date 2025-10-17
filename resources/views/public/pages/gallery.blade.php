@extends('public.layouts.app')
@section('title', 'Gallery')
@section('content')
    <!-- Start Main -->
    <main>
        <div class="main-part">
            <!-- Start Breadcrumb Part -->
            <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
                style="background-image: url('/assets/images/breadbg1.jpg');">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <h2>Gallery</h2>
                        <a href="/">Home</a>
                        <span>Gallery</span>
                    </div>
                </div>
            </section>
            <!-- End Breadcrumb Part -->

            <!-- Start Gallery Section -->
            <section class="gallery-section" style="padding: 60px 0;">
                <div class="icon-default icon-">
                    <img src="/assets/images/scroll-arrow.png" alt="">
                </div>
                <div class="container">
                    <div class="build-title text-center">
                        <h6>Signature Dishes by Our Gallery</h6>
                        <h2>Favourites</h2>
                    </div>
                    <div class="row">
                        <!-- Gallery Item 1 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img2.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img2.jpg" alt="Gallery Image 1">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Delicious Dosai</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 2 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img3.jpeg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img3.jpeg" alt="Gallery Image 2">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Special Dish</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 3 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img4.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img4.jpg" alt="Gallery Image 3">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Traditional Cuisine</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 4 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img5.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img5.jpg" alt="Gallery Image 4">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Authentic Flavors</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>



                        <!-- Gallery Item 1 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img2.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img2.jpg" alt="Gallery Image 1">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Delicious Dosai</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 2 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img3.jpeg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img3.jpeg" alt="Gallery Image 2">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Special Dish</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 3 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img4.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img4.jpg" alt="Gallery Image 3">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Traditional Cuisine</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>

                        <!-- Gallery Item 4 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="gallery-item">
                                <a href="images/gallery/img5.jpg" class="magnific-popup">
                                    <img src="/assets/images/gallery/img5.jpg" alt="Gallery Image 4">
                                </a>
                                <div class="gallery-caption">
                                    <h4 class="item-name">Authentic Flavors</h4>
                                </div>
                                <!-- Gallery Interactions -->

                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <!-- End Gallery Section -->

            <section class="home-icon">
                <div class="icon-default">
                    <img src="/assets/images/scroll-arrow.png" alt="">
                </div>
            </section>
        </div>
    </main>
    <!-- End Main -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/gallery.css') }}" />
@endpush
