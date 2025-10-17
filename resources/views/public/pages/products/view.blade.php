@extends('public.layouts.app')
@section('content')
<section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
    style="background-image: url('/assets/images/breadbg1.jpg');">
    <div class="container">
        <div class="breadcrumb-inner">
            <h2>{{ $product->name }}</h2>
            <a href="/">Home</a>
            <span>{{ $product->name }} Product Details</span>
        </div>
    </div>
</section>

<!--prod details section-->
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
                            <img src="{{ asset($image->image_path) }}" data-zoom-image="{{ asset($image->image_path) }}"
                                alt="Product Image" height="490" />
                        </li>
                        @empty
                        <img src="{{ asset('assets/images/placeholder.png') }}"
                            data-zoom-image="{{ asset('assets/images/placeholder.png') }}" alt="Placeholder Image" />
                        @endforelse

                    </ul>
                    <ul class="details-thumb" style="height: 100px;">
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
                        {{$product->description}}
                    </div>
                    <div class="details-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
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
                    <div class="details-action-group d-flex">
                        <form method="POST" action="{{ route('cart.quantity.add') }}" class="w-100 qtyForm">
                            @csrf
                            <div class="product-action">
                                <button type="button" class="action-minus" title="Quantity Minus">
                                    <i class="bi bi-dash-circle-fill"></i>
                                </button>

                                <input class="action-input" title="Quantity Number" type="text" name="quantity"
                                    value="1" min="1">

                                <button type="button" class="action-plus" title="Quantity Plus">
                                    <i class="bi bi-plus-circle-fill"></i>
                                </button>
                            </div>

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <button type="submit" class="product-add" title="Add to Cart">
                                <i class="bi bi-cart-fill"></i>
                                <span>Add to Cart</span>
                            </button>
                        </form>
                    </div>
                    <div class="details-action-group mt-3">
                        <form method="POST" action="{{ route('wishlist.add') }}" class="w-100">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="details-wish wish w-100" title="Add Your Wishlist">
                                <i class="bi bi-heart-fill"></i>
                                <span>add to wish</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section class="inner-section mt-5 mb-0">
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
                            <p style="z-index: 9999999999999; color:black;">{{$product->description}}</p>
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
                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
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
                                        <textarea class="form-control" name="review"
                                            placeholder="Describe your experience"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
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
</section> --}}

<!--related prods-->
<section class="inner-section mt-5 mb-4" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="section-heading mb-3 text-start">
                    <h2>related this items</h2>
                </div>
            </div>
            {{-- <div class="col-12 col-md-6 d-none d-md-block text-end justify-content-end">
                <a class="btn btn-inline py-2 px-3" href="#">
                    <i class="bi bi-eye-fill"></i>
                    <span>find more</span>
                </a>
            </div> --}}
        </div>
        <div class="row" style="padding-bottom: 60px;">
            @forelse ($featured_products as $product)
            <!--card-->
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="product-card">
                    <div class="product-media">
                        <div class="product-label">
                            <label class="label-text off">{{ number_format($product->product_discount, 0) }}%</label>
                        </div>
                        <button class="product-wish wish">
                            <i class="fas fa-heart"></i>
                        </button>
                        <form method="POST" action="{{ route('wishlist.add') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="product-wish wish">
                                <i class="fas fa-heart"></i>
                            </button>
                        </form>
                        <a class="product-image" href="#">{{-- {{ route('product.quickview', $product->id) }} --}}
                            <img class="product-img-constant"
                                src="{{ asset($product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                alt="{{ $product->name }}" />
                        </a>
                    </div>
                    <div class="product-content">
                        <h6 class="product-name" style="height: 38px; line-height: 18px;">
                            {{ $product->name }}
                        </h6>
                        <span class="brand-name">
                            {{ $product->brand->name ?? 'Not Defined' }}
                        </span>
                        <h6 class="product-price mt-3" style="height: 45px;">
                            @if ($product->product_discount > 0)
                            @php
                            $discountedPrice =
                            $product->selling_price -
                            ($product->selling_price * $product->product_discount) / 100;
                            @endphp
                            <span>
                                {{ number_format($discountedPrice, 2) }} LKR
                            </span><br />
                            <del style="margin-right: 0px;">
                                {{ number_format($product->selling_price, 2) }} LKR
                            </del>
                            @else
                            <span>
                                {{ number_format($product->selling_price, 2) }} LKR
                            </span>
                            @endif
                        </h6>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="product-add" title="Add to Cart">
                                <i class="fas fa-shopping-basket"></i>
                                <span>add</span>
                            </button>
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
            @empty
            <p class="text-center">No products found matching your filters.</p>
            @endforelse
        </div>
        {{-- <div class="row d-block d-md-none">
            <div class="col-lg-12 mt-3 mb-3">
                <div class="section-btn-25 pt-0 mt-0">
                    <a class="btn btn-inline py-2 px-3" href="#">
                        <i class="bi bi-eye-fill"></i>
                        <span>find more</span>
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
</section>

@push('page-ajax')
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
@endpush
@endsection