@extends('public.layouts.app')
@section('title', 'Wishlist')
@section('content')

<style>
    /* ===== Wishlist Table Section ===== */
    .wishlist-part {
        padding: 80px 0;
        background-color: #fafafa;
    }

    .table-scroll {
        overflow-x: auto;
        background: #fff;
        /* border-radius: 10px; */
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    }

    .table-list {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    .table-list thead {
        background: #f1f3f5;
    }

    .table-list th {
        text-transform: uppercase;
        font-weight: 600;
        font-size: 14px;
        color: #444;
        padding: 15px 12px;
        text-align: center;
    }

    .table-list td {
        padding: 15px 12px;
        vertical-align: middle;
        text-align: center;
        border-top: 1px solid #eee;
    }

    .table-list tr:hover {
        background-color: #f9f9f9;
    }

    /* ===== Table Content Styling ===== */
    .table-image img {
        width: 70px;
        height: 70px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #ddd;
    }

    .table-name h6 {
        font-size: 15px;
        font-weight: 600;
        color: #333;
    }

    .table-status .stock-in {
        color: #22c55e;
        font-weight: 600;
        text-transform: capitalize;
    }

    .discount-percent {
        font-weight: 500;
    }

    /* ===== Responsive Design ===== */
    @media (max-width: 992px) {

        .table-list th,
        .table-list td {
            font-size: 13px;
            padding: 10px;
        }

        .table-image img {
            width: 60px;
            height: 60px;
        }
    }

    @media (max-width: 768px) {
        .wishlist-part {
            padding: 60px 0;
        }

        .table-scroll {
            box-shadow: none;
            border-radius: 0;
        }
    }

    @media (max-width: 576px) {
        .product-add {
            display: block;
            margin: 6px auto;
        }

        .table-list {
            min-width: 600px;
        }
    }
</style>
<!-- Start Main -->
<main>
    <div class="main-part">
        <!-- Start Breadcrumb Part -->
        <section class="breadcrumb-part" data-stellar-offset-parent="true" data-stellar-background-ratio="0.5"
            style="background-image: url('/assets/images/breadbg1.jpg');">
            <div class="container">
                <div class="breadcrumb-inner">
                    <h2>Wishlist</h2>
                    <a href="/">Home</a>
                    <span>Wishlist</span>
                </div>
            </div>
        </section>
        <!-- End Breadcrumb Part -->

        <section class="inner-section wishlist-part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-scroll">
                            <table class="table-list">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        {{-- <th scope="col">description</th> --}}
                                        <th scope="col">status</th>
                                        <th scope="col">shopping</th>
                                        <th scope="col">action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wishlists as $key => $item)
                                    <tr>
                                        <td class="table-serial">
                                            <h6>{{ $key + 1 }}</h6>
                                        </td>
                                        <td class="table-image"><img
                                                src="{{ asset($item->product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                                alt="product">
                                        </td>
                                        <td class="table-name">
                                            <h6>{{ $item->product->name }}</h6>
                                        </td>
                                        <td>
                                            @if ($item->product->product_discount > 0)
                                            @php
                                            $discountedPrice =
                                            $item->product->selling_price -
                                            ($item->product->selling_price *
                                            $item->product->product_discount) /
                                            100;
                                            @endphp
                                            <del>
                                                {{ number_format($item->product->selling_price, 2) }} LKR
                                            </del>&nbsp;|&nbsp;
                                            <span>
                                                {{ number_format($discountedPrice, 2) }} LKR
                                            </span>
                                            <span class="discount-percent text-green-600 text-sm ml-1">
                                                ({{ $item->product->product_discount }}% OFF)
                                            </span>
                                            @else
                                            <span>
                                                {{ number_format($item->product->selling_price, 2) }} LKR
                                            </span>
                                            @endif
                                        </td>
                                        {{-- <td class="table-desc">
                                            <p>{{ $item->product->warranty }}...<a
                                                    href="{{ route('product.quickview', $item->product->id) }}">read
                                                    more</a></p>
                                        </td> --}}
                                        <td class="table-status">
                                            <h6 class="stock-in">stock&nbsp;in</h6>
                                        </td>
                                        <td class="table-shop">
                                            <a href="{{ route('wishlist.cart.add') }}" class="product-add"
                                                onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $item->id }}').submit();">
                                                ADD&nbsp;TO&nbsp;CART
                                            </a>

                                            <form id="add-to-cart-{{ $item->id }}"
                                                action="{{ route('wishlist.cart.add') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item->product->id }}">
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
                                        </td>
                                        <td class="table-action">
                                            <div class="d-flex">
                                                <a class="product-add"
                                                    href="{{ route('product.quickview', $item->product->id) }}"
                                                    title="Single Product View"><i class="fas fa-eye"></i> See Product Details</a>
                                                
                                                <a class="trash" href="{{ route('wishlist.remove', $item->id) }}"
                                                    title="Remove Wishlist"
                                                    onclick="event.preventDefault(); document.getElementById('remove-wishlist-{{ $item->id }}').submit();"><i
                                                        class="icofont-trash"></i></a>
                                                <form id="remove-wishlist-{{ $item->id }}"
                                                    action="{{ route('wishlist.remove', $item->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Your wishlist is empty.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/assets/css/wishlist.css') }}" />
@endpush