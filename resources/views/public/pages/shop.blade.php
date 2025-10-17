@extends('public.layouts.app')

@section('content')
    <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
        style="background-image: url('/assets/images/breadbg1.jpg');">
        <div class="container">
            <div class="breadcrumb-inner">
                <h2>Shop</h2>
                <a href="/">Home</a>
                <span>Shop</span>
            </div>
        </div>
    </section>

    <section class="inner-section shop-part my-5">
        <div class="container">
            <div class="row">
                {{-- ======================= FILTER SIDEBAR ======================= --}}
                <div class="col-lg-3">
                    {{-- <div class="shop-widget-promo">
                        <a href="#"><img src="/assets/images/promo/shop/01.png" alt="promo"></a>
                    </div> --}}

                    {{-- Search --}}
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">Search Product</h6>
                        <form method="GET" action="{{ route('shop.index') }}">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search by name...">
                        </form>
                    </div>

                    {{-- Filter by Price --}}
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">Filter by Price</h6>
                        <form method="GET" action="{{ route('shop.index') }}">
                            <div class="shop-widget-group">
                                <input type="number" name="min_price" value="{{ request('min_price') }}"
                                    placeholder="Min - 00" class="form-control">
                                <input type="number" name="max_price" value="{{ request('max_price') }}"
                                    placeholder="Max - 50000" class="form-control">
                            </div>
                            <button class="shop-widget-btn">
                                <i class="fas fa-search"></i>
                                <span>Search</span>
                            </button>
                        </form>
                    </div>

                    {{-- Filter by Category --}}
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">Filter by Category</h6>
                        <form method="GET" action="{{ route('shop.index') }}">
                            <ul class="shop-widget-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="radio" name="category" id="cate{{ $category->id }}"
                                                value="{{ $category->id }}"
                                                {{ request('category') == $category->id ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <label for="cate{{ $category->id }}">{{ $category->name }}</label>
                                        </div>
                                        <span class="shop-widget-number">({{ $category->products_count }})</span>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="submit" class="shop-widget-btn">
                                <i class="far fa-trash-alt"></i>
                                <span>Clear Filter</span>
                            </button>
                        </form>
                    </div>

                    {{-- Filter by Brand --}}
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">Filter by Brand</h6>
                        <form method="GET" action="{{ route('shop.index') }}">
                            <ul class="shop-widget-list">
                                @foreach ($brands as $brand)
                                    <li>
                                        <div class="shop-widget-content">
                                            <input type="radio" name="brand" id="brand{{ $brand->id }}"
                                                value="{{ $brand->id }}"
                                                {{ request('brand') == $brand->id ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <label for="brand{{ $brand->id }}">{{ $brand->name }}</label>
                                        </div>
                                        <span class="shop-widget-number">({{ $brand->products_count }})</span>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="submit" class="shop-widget-btn">
                                <i class="far fa-trash-alt"></i>
                                <span>Clear Filter</span>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- ======================= PRODUCT SECTION ======================= --}}
                <div class="col-lg-9">
                    <div class="top-filter d-flex justify-content-between align-items-center mb-3">
                        <div class="filter-show w-100">
                            <form class="w-100  d-flex justify-content-between align-items-center" method="GET"
                                action="{{ route('shop.index') }}" id="filterForm">
                                {{-- <div class="row">
                                    <div class="col-12 col-md-6"></div>
                                    <div class="col-12 col-md-6"></div>
                                </div> --}}
                                {{-- Keep existing filters in query --}}
                                <div>
                                    @foreach (request()->except('per_page', 'sort', 'page') as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach
                                    <label class="filter-label">Show :</label>
                                    <select name="per_page" class="form-select filter-select d-inline w-auto"
                                        style="width:75px !important;"
                                        onchange="document.getElementById('filterForm').submit();">
                                        <option value="12" {{ request('per_page') == 12 ? 'selected' : '' }}>12
                                        </option>
                                        <option value="16" {{ request('per_page') == 16 ? 'selected' : '' }}>16
                                        </option>
                                        <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20
                                        </option>
                                    </select>
                                </div>

                                <div style="padding-left: 20px;">
                                    <label class="filter-label ms-3">Sort by :</label>
                                    <select name="sort" class="form-select filter-select d-inline w-auto"
                                        onchange="document.getElementById('filterForm').submit();">
                                        <option value="">Default</option>
                                        <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price:
                                            Low to
                                            High</option>
                                        <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>
                                            Price: High to Low</option>
                                        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Newest
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 30px">
                        @forelse ($products as $product)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-label">
                                            <label
                                                class="label-text off">{{ number_format($product->product_discount, 0) }}%</label>
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

                    {{-- ======================= PAGINATION ======================= --}}
                    <div class="bottom-paginate">
                        <p class="page-info">
                            Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                            {{ $products->total() }} Results
                        </p>
                        <div>
                            {{ $products->withQueryString()->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

    <style>
        .product-img-constant {
            height: 150px;
            width: 100%;
            object-fit: cover;
        }
    </style>
@endpush
