@extends('public.layouts.app')
@section('title', 'Menu')
@section('content')
    <main>
        <div class="main-part">
            <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
                style="background-image: url('/assets/images/breadbg1.jpg');">
                <div class="container">
                    <div class="breadcrumb-inner">
                        <h2>Menu</h2>
                        <a href="index.html">Home</a>
                        <span>Menu</span>
                    </div>
                </div>
            </section>
            <section class="home-icon">
                <div class="icon-default">
                    <img src="/assets/images/scroll-arrow.png" alt="">
                </div>
                <div class="container">
                    <div class="gallery-royal">
                        <div class="galleryportfolio" style="margin-bottom: 30px;">
                            <div class="portfolioFilter-inner bg-skeen">
                                <a href="javascript:;" data-filter="*" class="current">ALL</a>

                                @foreach ($categories as $category)
                                    <a href="javascript:;"
                                        data-filter=".{{ \Illuminate\Support\Str::slug($category->name) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </div>

                        <div class="row gallery-filter">
                            @if (isset($products))
                                @foreach ($products as $product)
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 isotope-item vegetarian {{ \Illuminate\Support\Str::slug($product->category->name) }} {{ \Illuminate\Support\Str::slug($product->name) }}"
                                        data-price="{{ $product->price }}" data-discount="{{ $product->discount ?? '' }}"
                                        data-details="{{ $product->details }}" data-currency="LKR">
                                        <div class="gallery-megic-blog">
                                            <a href="{{ $product->image_path }}" class="magnific-popup">
                                                <img src="{{ asset($product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}" alt="{{ $product->name }}">
                                                <div class="gallery-megic-inner hidden">
                                                    <div class="gallery-megic-out">
                                                        <div class="gallery-megic-detail">
                                                            <h2>{{ $product->name }}</h2>
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                {{-- Hardcoded HTML section remains for now, but its classes must match the category slugs. --}}

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 isotope-item vegetarian ghee-dos"
                                    data-price="420" data-discount="10"
                                    data-details="Crispy ghee dosai served with chutneys" data-currency="LKR">
                                    {{-- ... content ... --}}
                                </div>

                                {{-- ... (rest of the hardcoded content) ... --}}
                            @endif
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
@endsection
