@extends('public.layouts.app')
@section('content')
    <section class="single-banner inner-section mb-0"
        style="background: url(/assets/images/newsletter.jpg) no-repeat center;">
        <div class="container">
            <h2>product simple</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </div>
    </section>


    <section class="inner-section mt-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="details-gallery">
                        <div class="details-label-group">
                            @if ($product->product_discount > 0)
                                <label class="details-label off">{{ $product->product_discount }}%</label>
                            @endif
                        </div>
                        <ul class="details-preview" style="height: 490px;">

                            @forelse ($product->images as $image)
                                <li>
                                    <img src="{{ asset($image->image_path) }}"
                                        data-zoom-image="{{ asset($image->image_path) }}" alt="Product Image"
                                        height="480" />
                                </li>
                            @empty
                                <img src="{{ asset('assets/images/placeholder.png') }}"
                                    data-zoom-image="{{ asset('assets/images/placeholder.png') }}"
                                    alt="Placeholder Image" />
                            @endforelse

                        </ul>
                        <ul class="details-thumb" style="height: 150px;">
                            @foreach ($product->images as $key => $image)
                                <li><img src="{{ asset($image->image_path) }}" alt="product" height="100px;"></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details-content">
                        <h3 class="details-name"><a href="#">{{ $product->name }}</a></h3>
                        <div class="details-meta">
                            <p>SKU:<span>{{ $product->sku }}</span></p>
                            @if ($product->brand_id)
                                <p>BRAND:<a href="#">{{ $product->brand->name }}</a></p>
                            @endif
                        </div>
                        <div class="details-rating">
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="active icofont-star"></i>
                            <i class="icofont-star"></i>
                            <a href="#">({{ $reviewCount }} reviews)</a>
                        </div>
                        <h3 class="details-price">
                            @if ($product->product_discount > 0)
                                @php
                                    $discountedPrice =
                                        $product->selling_price -
                                        ($product->selling_price * $product->product_discount) / 100;
                                @endphp

                                <del>
                                    {{ number_format($product->selling_price, 2) }} LKR
                                </del>

                                <span>
                                    {{ number_format($discountedPrice, 2) }} LKR
                                </span>
                            @else
                                <span class="new-price">
                                    {{ number_format($product->selling_price, 2) }} LKR
                                </span>
                            @endif
                        </h3>
                        <table class="table table-bordered mb-3">
                            <tbody>
                                <tr>
                                    <th scope="row" class="py-2">Model</th>
                                    <td class="py-2">
                                        @if ($product->brand_id)
                                            {{ $product->brand->name }}&nbsp;
                                        @endif
                                        {{ $product->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2">Warranty (years)</th>
                                    <td class="py-2">{{ $product->warranty }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2">Voltage (V)</th>
                                    <td class="py-2">{{ $product->volts }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2">Capacity (Ah)</th>
                                    <td class="py-2">{{ $product->ah }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2" rowspan="3">Dimensions (mm)</th>
                                    <td class="py-2">Length: {{ $product->length }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Height: {{ $product->height }}</td>
                                </tr>
                                <tr>
                                    <td class="py-2">Width: {{ $product->width }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="py-2">Weight (Kg ±3%)</th>
                                    <td class="py-2">{{ $product->weight ?? '-' }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="details-desc">
                            {{ $product->warranty }}
                        </p>
                        <div class="details-action-group d-flex">
                            <form method="POST" action="{{ route('cart.quantity.add') }}" class="w-100 d-flex">
                                @csrf
                                <div class="product-action">
                                    <button type="button" class="action-minus" title="Quantity Minus">
                                        <i class="icofont-minus"></i>
                                    </button>

                                    <input class="action-input" title="Quantity Number" type="text" name="quantity"
                                        value="1" min="1">

                                    <button type="button" class="action-plus" title="Quantity Plus">
                                        <i class="icofont-plus"></i>
                                    </button>
                                </div>

                                <input type="hidden" name="product_id" value="{{ $product->id }}">

                                <button type="submit" class="product-add ms-3" title="Add to Cart">
                                    <i class="fas fa-shopping-basket"></i>
                                    <span>Add to Cart</span>
                                </button>
                            </form>
                        </div>
                        <div class="details-action-group mt-3">
                            <form method="POST" action="{{ route('wishlist.add') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="details-wish wish w-100" title="Add Your Wishlist">
                                    <i class="icofont-heart"></i>
                                    <span>add to wish</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="inner-section mt-5 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li><a href="#tab-spec" class="tab-link active" data-bs-toggle="tab">Specifications</a></li>
                        <li><a href="#tab-desc" class="tab-link" data-bs-toggle="tab">Description</a></li>
                        <li><a href="#tab-reve" class="tab-link" data-bs-toggle="tab">Reviews ({{ $reviewCount }})</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Description -->
            <div class="tab-pane fade" id="tab-desc">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <div class="tab-descrip">
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Specifications -->
            <div class="tab-pane fade show active" id="tab-spec">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <table class="table table-bordered mb-3">
                                <tbody>
                                    <tr>
                                        <th scope="row" class="py-2">Model</th>
                                        <td class="py-2">
                                            @if ($product->brand_id)
                                                {{ $product->brand->name }}&nbsp;
                                            @endif
                                            {{ $product->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="py-2">Warranty</th>
                                        <td class="py-2">{{ $product->warranty }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="py-2">Voltage (V)</th>
                                        <td class="py-2">{{ $product->volts }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="py-2">Capacity (Ah)</th>
                                        <td class="py-2">{{ $product->ah }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="py-2" rowspan="3">Dimensions (mm)</th>
                                        <td class="py-2">Length: {{ $product->length }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Height: {{ $product->height }}</td>
                                    </tr>
                                    <tr>
                                        <td class="py-2">Width: {{ $product->width }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row" class="py-2">Weight (Kg ±3%)</th>
                                        <td class="py-2">{{ $product->weight ?? '-' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reviews -->
            <div class="tab-pane fade" id="tab-reve">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-details-frame">
                            <ul class="review-list">
                                @foreach ($reviews as $review)
                                    <li class="review-item">
                                        <div class="review-media">
                                            <a class="review-avatar" href="#">
                                                <img src="/assets/images/avatar/empty_user1.jpg" alt="review">
                                            </a>
                                            <h5 class="review-meta">
                                                <a href="#">{{ $review->name }}</a>
                                                <span>{{ $review->created_at->format('F j, Y') }}</span>
                                            </h5>
                                        </div>
                                        <ul class="review-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $review->rating)
                                                    <li class="icofont-ui-rating"></li>
                                                @else
                                                    <li class="icofont-ui-rate-blank"></li>
                                                @endif
                                            @endfor
                                        </ul>
                                        <p class="review-desc">
                                            {{ $review->review }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Add review form -->
                        <div class="product-details-frame">
                            <h3 class="frame-title">Add your review</h3>
                            <form class="review-form" action="{{ route('product.review.store', $product->id) }}"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="star-rating">
                                            <input type="radio" name="rating" value="5" id="star-1"><label
                                                for="star-1"></label>
                                            <input type="radio" name="rating" value="4" id="star-2"><label
                                                for="star-2"></label>
                                            <input type="radio" name="rating" value="3" id="star-3"><label
                                                for="star-3"></label>
                                            <input type="radio" name="rating" value="2" id="star-4"><label
                                                for="star-4"></label>
                                            <input type="radio" name="rating" value="1" id="star-5"><label
                                                for="star-5"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="review" placeholder="Describe your experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-inline">
                                            <i class="icofont-water-drop"></i>
                                            <span>Drop your review</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                </div>
            </div>
        </div>
    </section>


    <section class="inner-section mt-5 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="section-heading mb-3 text-start">
                        <h2>related this items</h2>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block text-end justify-content-end">
                    <a class="btn btn-inline py-2 px-3" href="#">
                        <i class="bi bi-eye-fill"></i>
                        <span>find more</span>
                    </a>
                </div>
            </div>
            <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                <!--card-->
                <div class="col">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-label">
                            </div>
                            <button class="product-wish wish">
                                <i class="fas fa-heart">
                                </i>
                            </button>
                            <a class="product-image" href="product-simple.html">
                                <img src="/images/product/PMF38B20RL.png" alt="product" />
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="product-simple.html" class="bi bi-eye-fill">
                                </a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star">
                                </i>
                                <i class="active icofont-star">
                                </i>
                                <i class="active icofont-star">
                                </i>
                                <i class="active icofont-star">
                                </i>
                                <i class="icofont-star">
                                </i>
                                <a href="product-simple.html">
                                    (3)
                                </a>
                            </div>
                            <h6 class="product-name">
                                <a href="product-simple.html">
                                    PMF38B20R/L
                                </a>
                            </h6>
                            <h6 class="product-price mb-0">
                                <del>
                                    LKR.21,000.00
                                </del>
                            </h6>
                            <h6 class="product-price">
                                <span>
                                    LKR.17,796.61/Piece
                                    <small>
                                    </small>
                                </span>
                            </h6>
                            <button class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket">
                                </i>
                                <span>
                                    add
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="col">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-label"></div>
                            <button class="product-wish wish">
                                <i class="fas fa-heart"></i>
                            </button>
                            <a class='product-image' href='product-simple.html'>
                                <img src="/images/product/PMF55B24RL.png" alt="product">
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="product-simple.html" class="bi bi-eye-fill"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href='product-simple.html'>(3)</a>
                            </div>
                            <h6 class="product-name">
                                <a href='product-simple.html'>PMF55B24R/L</a>
                            </h6>
                            <h6 class="product-price mb-0">
                                <del>LKR. 25,600.00</del>
                                <br />
                            </h6>
                            <h6 class="product-price">
                                <span>
                                    LKR. 21,694.92
                                    <small>/piece</small>
                                </span>
                            </h6>
                            <button class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="col">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-label"></div>
                            <button class="product-wish wish">
                                <i class="fas fa-heart"></i>
                            </button>
                            <a class='product-image' href='product-simple.html'>
                                <img src="/images/product/PMFS65RL.png" alt="product">
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="product-simple.html" class="bi bi-eye-fill"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href='product-simple.html'>(3)</a>
                            </div>
                            <h6 class="product-name">
                                <a href='product-simple.html'>PMFS65R/L</a>
                            </h6>
                            <h6 class="product-price mb-0">
                                <del>LKR. 36,900.00</del>
                                <br />
                            </h6>
                            <h6 class="product-price">
                                <span>
                                    LKR. 31,271.19
                                    <small>/piece</small>
                                </span>
                            </h6>
                            <button class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="col">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-label"></div>
                            <button class="product-wish wish">
                                <i class="fas fa-heart"></i>
                            </button>
                            <a class='product-image' href='product-simple.html'>
                                <img src="/images/product/PMF100.webp" alt="product">
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="product-simple.html" class="bi bi-eye-fill"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href='product-simple.html'>(3)</a>
                            </div>
                            <h6 class="product-name">
                                <a href='product-simple.html'>PMF 100</a>
                            </h6>
                            <h6 class="product-price mb-0">
                                <del>LKR. 63,200.00</del>
                                <br />
                            </h6>
                            <h6 class="product-price">
                                <span>
                                    LKR. 53,559.32
                                    <small>/piece</small>
                                </span>
                            </h6>
                            <button class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- card -->
                <div class="col">
                    <div class="product-card">
                        <div class="product-media">
                            <div class="product-label"></div>
                            <button class="product-wish wish">
                                <i class="fas fa-heart"></i>
                            </button>
                            <a class="product-image" href="product-simple.html">
                                <img src="/images/product/Lucas-MF38B20RL.png" alt="product">
                            </a>
                            <div class="product-widget">
                                <a title="Product View" href="product-simple.html" class="bi bi-eye-fill"></a>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="active icofont-star"></i>
                                <i class="icofont-star"></i>
                                <a href="product-simple.html">(3)</a>
                            </div>
                            <h6 class="product-name">
                                <a href="product-simple.html">MF38B20R/L</a>
                            </h6>
                            <h6 class="product-price mb-0">
                                <del>LKR. 21,100.00</del>
                                <br />
                            </h6>
                            <h6 class="product-price">
                                <span>
                                    LKR. 17,881.36
                                    <small>/piece</small>
                                </span>
                            </h6>
                            <button class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row d-block d-md-none">
                <div class="col-lg-12 mt-3 mb-3">
                    <div class="section-btn-25 pt-0 mt-0">
                        <a class="btn btn-inline py-2 px-3" href="#">
                            <i class="bi bi-eye-fill"></i>
                            <span>find more</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/product-details.css') }}" />
@endpush

<script>
    $(function() {
        const mainCarousel = $('#main-carousel');
        const thumbnails = $('#thumbnail-carousel');

        mainCarousel.owlCarousel({
            items: 1,
            nav: true,
            dots: false,
            loop: false,
            autoplay: false,
            smartSpeed: 400
        });

        thumbnails.on('click', '.owl-dot', function() {
            const index = $(this).data('slide');
            mainCarousel.trigger('to.owl.carousel', [index, 300]);

            thumbnails.find('.owl-dot').removeClass('active');
            $(this).addClass('active');
        });

        mainCarousel.on('changed.owl.carousel', function(event) {
            const current = event.item.index;
            thumbnails.find('.owl-dot').removeClass('active');
            thumbnails.find(`.owl-dot[data-slide="${current}"]`).addClass('active');
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.product-action').forEach(function(actionGroup) {
            const minusBtn = actionGroup.querySelector('.action-minus');
            const plusBtn = actionGroup.querySelector('.action-plus');
            const input = actionGroup.querySelector('.action-input');

            if (!minusBtn || !plusBtn || !input) return;

            minusBtn.addEventListener('click', (e) => {
                e.preventDefault();
                let value = parseInt(input.value.trim()) || 1; // force integer
                if (value > 1) input.value = value - 1;
            });

            plusBtn.addEventListener('click', (e) => {
                e.preventDefault();
                let value = parseInt(input.value.trim()) || 0; // ensure integer
                input.value = value + 1;
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('#ratingStars a');
        const ratingInput = document.getElementById('rating');

        function setRating(rating) {
            // Set select value
            ratingInput.value = rating;

            // Add 'selected' class to stars
            stars.forEach(star => {
                if (parseInt(star.dataset.value) <= rating) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }

        stars.forEach(star => {
            // Handle click
            star.addEventListener('click', function(e) {
                e.preventDefault();
                const rating = parseInt(this.dataset.value);
                setRating(rating);
            });

            // Optional: hover effect
            star.addEventListener('mouseenter', function() {
                const rating = parseInt(this.dataset.value);
                stars.forEach(s => {
                    if (parseInt(s.dataset.value) <= rating) {
                        s.classList.add('hover');
                    } else {
                        s.classList.remove('hover');
                    }
                });
            });

            star.addEventListener('mouseleave', function() {
                stars.forEach(s => s.classList.remove('hover'));
            });
        });
    });
</script>
