@extends('public.layouts.app')

@section('content')
    <main class="main bg-gray" style="padding-bottom: 50px;">
        <div class="container">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">
                        <span>Products</span>
                    </li>
                </ol>
            </nav>

            <!-- Filter Form (Hidden Inputs) -->
            {{-- <form id="filterForm" method="GET" action="{{ route('shop.index') }}">
                <input type="hidden" name="search" id="search_hidden" value="{{ request('search') }}">
                <input type="hidden" name="category" value="{{ request('category') }}">
                <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 1000000) }}">
                <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                <input type="hidden" name="per_page" id="per_page" value="{{ request('per_page', 9) }}">
            </form> --}}

            <div class="row">
                <!-- Left Sidebar -->
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <!-- Categories -->
                        <div class="widget bg-white">
                            <form id="filterForm" method="GET" action="{{ route('shop.index') }}">
                                <div class="search-wrapper mb-2">
                                    <input id="searchInput" name="search" class="search-input" placeholder="Search by name"
                                        type="text" value="{{ request('search') }}">

                                    <button type="button" id="clearBtn" class="clear-btn mr-2" title="Clear search">
                                        <i class="fas fa-times-circle"></i>
                                    </button>

                                    <button type="button" id="searchBtn" class="search-btn" title="Search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                                <input type="hidden" name="category" value="{{ request('category') }}">
                                <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                                <input type="hidden" name="max_price" id="max_price"
                                    value="{{ request('max_price', 1000000) }}">
                                <input type="hidden" name="sort" id="sort" value="{{ request('sort') }}">
                                <input type="hidden" name="per_page" id="per_page" value="{{ request('per_page', 9) }}">
                            </form>
                            <h3 class="widget-title">Categories</h3>
                            <div class="widget-body">
                                <ul class="cat-list">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a
                                                href="{{ route('shop.index', array_merge(request()->except('page'), ['category' => $category->slug ?? $category->id])) }}">
                                                {{ $category->name }}
                                                <span class="text-muted">({{ $category->products_count }})</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="widget bg-white">
                            <h3 class="widget-title">Price</h3>
                            <div class="widget-body pb-0">
                                <input type="text" id="price_range" name="price_range" />
                                <div class="mt-2">
                                    Price: Rs <span id="min_price_display">0</span> - Rs <span
                                        id="max_price_display">1000000</span>
                                </div>
                                <input type="hidden" name="min_price" id="min_price"
                                    value="{{ request('min_price', 0) }}">
                                <input type="hidden" name="max_price" id="max_price"
                                    value="{{ request('max_price', 1000000) }}">
                            </div>
                        </div>

                    </div>
                </aside>

                <!-- Product Listing -->
                <div class="col-lg-9 order-lg-1">
                    <nav class="toolbox sticky-header">
                        <div class="toolbox-left">
                            <div class="toolbox-item toolbox-sort">
                                <label>Sort By:</label>
                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="">Default sorting</option>
                                        <option value="date" {{ request('sort') === 'date' ? 'selected' : '' }}>Sort by
                                            newness</option>
                                        <option value="price" {{ request('sort') === 'price' ? 'selected' : '' }}>Sort by
                                            price: low to high</option>
                                        <option value="price-desc"
                                            {{ request('sort') === 'price-desc' ? 'selected' : '' }}>Sort by price: high to
                                            low</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>
                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="9" {{ request('per_page') == 9 ? 'selected' : '' }}>9</option>
                                        <option value="15" {{ request('per_page') == 15 ? 'selected' : '' }}>15
                                        </option>
                                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- Products Grid -->
                    <div class="row pb-4">
                        @forelse ($products as $product)
                            <div class="col-sm-6 col-md-4 mb-4">
                                <div class="product-default inner-quickview inner-icon appear-animate bg-white h-100">
                                    <figure class="img-effect">
                                        <a href="{{ route('product.quickview', $product->id) }}"
                                            class="product-image-container">
                                            <img src="{{ asset($product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                                alt="{{ $product->name }}" class="product-image">
                                        </a>
                                        <div class="btn-icon-group mt-1 mr-2">
                                            <form action="{{ route('cart.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn-icon btn-add-cart product-type-simple">
                                                    <i class="icon-shopping-cart"></i>
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('wishlist.add') }}">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <button type="submit" class="btn-icon btn-icon-wish cursor-pointer"
                                                    title="Add to Wishlist">
                                                    <i class="icon-heart"></i>
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
                                        <a href="{{ route('product.quickview', $product->id) }}" class="btn-quickview"
                                            title="Quick View">Quick View</a>
                                    </figure>
                                    <div class="product-details p-4">
                                        <h3 class="product-title"><a
                                                href="{{ route('product.quickview', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="price-box">
                                            @if ($product->product_discount > 0)
                                                @php
                                                    $discountedPrice =
                                                        $product->selling_price -
                                                        ($product->selling_price * $product->product_discount) / 100;
                                                @endphp
                                                <span class="old-price text-gray-500 line-through mr-2">
                                                    {{ number_format($product->selling_price, 2) }} LKR
                                                </span>
                                                <span class="product-price text-red-600 font-bold">
                                                    {{ number_format($discountedPrice, 2) }} LKR
                                                </span>
                                                <span class="discount-percent text-green-600 text-sm ml-1">
                                                    ({{ $product->product_discount }}% OFF)
                                                </span>
                                            @else
                                                <span class="product-price">
                                                    {{ number_format($product->selling_price, 2) }} LKR
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-center">No products found.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="col-12 mt-4">
                        {{ $products->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <style>
        .search-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            width: 100%;
            padding: 0 2.5rem 0 0.75rem;
            height: 40px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            font-size: 14px;
        }

        .clear-btn {
            position: absolute;
            right: 3rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #888;
            font-size: 16px;
            border: none;
            background: none;
        }

        .search-btn {
            height: 40px;
            width: 42px;
            border: 1px solid #ccc;
            border-left: none;
            border-radius: 0 5px 5px 0;
            background-color: #333;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .search-btn:hover {
            background-color: #555;
        }

        /* Alternative: If you want to contain the image instead of cropping */
        .product-default {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-default:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        /* Fixed height for figure section */
        .img-effect {
            height: 280px;
            /* Fixed height for entire figure section */
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
        }

        .product-image-container {
            display: flex;
            align-items: center;
            /* Center vertically */
            justify-content: center;
            /* Center horizontally */
            width: 100%;
            height: 100%;
            /* Takes full height of figure */
            overflow: hidden;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Maintains aspect ratio while filling container */
            object-position: center center;
            /* Center both horizontally and vertically */
            transition: transform 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
        }

        /* Alternative: If you want to contain the image instead of cropping */
        .product-image-contain {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* Shows full image, may have white space */
            object-position: center;
            padding: 10px;
        }

        /* Ensure cards have equal height */
        .product-default.h-100 {
            height: 100%;
        }

        .product-details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-title {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .product-title a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .product-title a:hover {
            color: #007bff;
        }

        .price-box {
            margin-top: auto;
            font-size: 1.1rem;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .img-effect {
                height: 220px;
            }
        }

        @media (max-width: 576px) {
            .img-effect {
                height: 200px;
            }
        }
    </style>
@endpush

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterForm = document.getElementById('filterForm');
        const searchInput = document.getElementById('searchInput');
        const clearBtn = document.getElementById('clearBtn');
        const searchBtn = document.getElementById('searchBtn');

        // Perform Search
        function performSearch() {
            filterForm.submit(); // input with name="search" is now in the form
        }

        // Clear Search
        function clearSearch() {
            searchInput.value = '';
            filterForm.submit();
        }

        // Event Listeners
        clearBtn?.addEventListener('click', clearSearch);
        searchBtn?.addEventListener('click', performSearch);

        // Enter key triggers search
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') performSearch();
        });

        // Price Range & Sort/PerPage (you can keep as is)
        const minInput = document.getElementById('min_price');
        const maxInput = document.getElementById('max_price');
        const minDisplay = document.getElementById('min_price_display');
        const maxDisplay = document.getElementById('max_price_display');

        if (typeof $ !== 'undefined' && $("#price_range").length) {
            $("#price_range").ionRangeSlider({
                type: "double",
                min: 0,
                max: 1000000,
                step: 100,
                from: parseInt(minInput.value) || 0,
                to: parseInt(maxInput.value) || 1000000,
                prefix: "Rs ",
                onChange: function(data) {
                    minInput.value = data.from;
                    maxInput.value = data.to;
                    if (minDisplay) minDisplay.textContent = data.from;
                    if (maxDisplay) maxDisplay.textContent = data.to;
                },
                onFinish: function() {
                    filterForm.submit();
                }
            });
        }

        const sortSelect = document.querySelector('[name="orderby"]');
        sortSelect?.addEventListener('change', () => {
            const sortInput = document.getElementById('sort');
            if (sortInput) {
                sortInput.value = sortSelect.value;
                filterForm.submit();
            }
        });

        const perPageSelect = document.querySelector('[name="count"]');
        perPageSelect?.addEventListener('change', () => {
            const perPageInput = document.getElementById('per_page');
            if (perPageInput) {
                perPageInput.value = perPageSelect.value;
                filterForm.submit();
            }
        });
    });
</script>
