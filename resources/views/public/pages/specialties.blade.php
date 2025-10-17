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
                    <a href="/">Home</a>
                    <span>Menu</span>
                </div>
            </div>
        </section>
        <!--menu old-->
        {{-- <section class="home-icon">
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
                                data-filter=".{{ \Illuminate\Support\Str::slug($category->name) }}">{{ $category->name
                                }}</a>
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
                                    <img src="{{ asset($product->primaryImage->image_path ?? '/assets/images/placeholder.png') }}"
                                        alt="{{ $product->name }}">
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
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 isotope-item vegetarian ghee-dos"
                            data-price="420" data-discount="10" data-details="Crispy ghee dosai served with chutneys"
                            data-currency="LKR">
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </section> --}}
        <section class="menu-section" style="padding-top: 30px; padding-bottom: 80px;">
            <div class="container">
                <div class="menu-header">
                    <h2 class="menu-main-title">MENU</h2>
                    <p class="menu-subtitle">Menu that always makes you fall in love</p>
                </div>

                <!-- Category Tabs -->
                <div class="menu-tabs">
                    <button class="menu-tab active" data-category="dosa">Dosa</button>
                    <button class="menu-tab" data-category="other-mains">Other Mains</button>
                    <button class="menu-tab" data-category="extras">Extras</button>
                    <button class="menu-tab" data-category="drinks">Drinks</button>
                    <button class="menu-tab" data-category="coffee">Coffee</button>
                </div>

                <!-- Menu Grid (uses `assets/images/menuAIfood/` images) -->
                <div class="menu-grid" id="menuGrid">
                    <!-- Dosa Category -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Plain Dosa.jpeg')) }}"
                                alt="Plain Dosa">
                        </div>
                        <h3 class="menu-item-title">Plain Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Paper Dosa.jpeg')) }}"
                                alt="Paper Dosa">
                        </div>
                        <h3 class="menu-item-title">Paper Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Onion Dosa.jpeg')) }}"
                                alt="Onion Dosa">
                        </div>
                        <h3 class="menu-item-title">Onion Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Tomato Onion Uttapam.jpeg')) }}"
                                alt="Tomato Onion Uttapam">
                        </div>
                        <h3 class="menu-item-title">Tomato Onion Uttapam</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Masala Dosa.jpeg')) }}"
                                alt="Masala Dosa">
                        </div>
                        <h3 class="menu-item-title">Masala Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Masala Dosa.jpeg')) }}"
                                alt="Ghee Masala Dosa">
                        </div>
                        <h3 class="menu-item-title">Ghee Masala Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Ghee Dosa">
                        </div>
                        <h3 class="menu-item-title">Ghee Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Kara Dosa.jpeg')) }}"
                                alt="Kara Dosa">
                        </div>
                        <h3 class="menu-item-title">Kara Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mushroom Dosa.jpeg')) }}"
                                alt="Mushroom Dosa">
                        </div>
                        <h3 class="menu-item-title">Mushroom Dosa</h3>
                    </div>

                    <!-- Fallback images for cheese/creative dosas (reuse Ghee Dosa if specific not available) -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Cheese Dosa">
                        </div>
                        <h3 class="menu-item-title">Cheese Dosa</h3>
                    </div>

                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Cheese Onion Dosa">
                        </div>
                        <h3 class="menu-item-title">Cheese Onion Dosa</h3>
                    </div>

                    <!-- Dessert / fusion dosas (use fallback) -->
                    <div class="menu-item menu-item-dosa" data-category="dosa">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ghee Dosa.jpeg')) }}"
                                alt="Choco Banana Dosa">
                        </div>
                        <h3 class="menu-item-title">Choco Banana Dosa</h3>
                    </div>

                    <!-- Other Mains -->
                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Idly Set (3pcs).webp')) }}"
                                alt="Idly Set">
                        </div>
                        <h3 class="menu-item-title">Idly Set (3pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mini Sambar Idly (9pcs).jpg')) }}"
                                alt="Mini Sambar Idly">
                        </div>
                        <h3 class="menu-item-title">Mini Sambar Idly (9pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('String Hoppers (10pcs).png')) }}"
                                alt="String Hoppers">
                        </div>
                        <h3 class="menu-item-title">String Hoppers (10pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Chapathi Set and channa (2pcs)')) }}"
                                alt="Chapathi Set">
                        </div>
                        <h3 class="menu-item-title">Chapathi Set w/ channa (2pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Poori Set  potato kima (2pcs).jpg')) }}"
                                alt="Poori Set">
                        </div>
                        <h3 class="menu-item-title">Poori Set w/ potato kima (2pcs)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Vegetable Fried Rice.jpg')) }}"
                                alt="Vegetable Fried Rice">
                        </div>
                        <h3 class="menu-item-title">Vegetable Fried Rice</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Rice & Curry (11am to 3pm).jpeg')) }}"
                                alt="Rice & Curry">
                        </div>
                        <h3 class="menu-item-title">Rice & Curry (11am to 3pm)</h3>
                    </div>

                    <div class="menu-item" data-category="other-mains">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('South Indian Thali (11am to 3pm).jpg')) }}"
                                alt="South Indian Thali">
                        </div>
                        <h3 class="menu-item-title">South Indian Thali (11am to 3pm)</h3>
                    </div>

                    <!-- Extras -->
                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Ulundu Vada.png')) }}"
                                alt="Ulundu Vada">
                        </div>
                        <h3 class="menu-item-title">Ulundu Vada</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Dhal Vada.jpg')) }}"
                                alt="Dhal Vada">
                        </div>
                        <h3 class="menu-item-title">Dhal Vada</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Bonda.jpg')) }}" alt="Bonda">
                        </div>
                        <h3 class="menu-item-title">Bonda</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Laddu.jpg')) }}" alt="Laddu">
                        </div>
                        <h3 class="menu-item-title">Laddu</h3>
                    </div>

                    <div class="menu-item" data-category="extras">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mysorepak.avif')) }}"
                                alt="Mysorepak">
                        </div>
                        <h3 class="menu-item-title">Mysorepak</h3>
                    </div>

                    <!-- Drinks (Lassis & Juices) -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Salt Lassi.jpg')) }}"
                                alt="Salt Lassi">
                        </div>
                        <h3 class="menu-item-title">Salt Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Sweet Lassi.jpg')) }}"
                                alt="Sweet Lassi">
                        </div>
                        <h3 class="menu-item-title">Sweet Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Banana Lassi.jpg')) }}"
                                alt="Banana Lassi">
                        </div>
                        <h3 class="menu-item-title">Banana Lassi</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mango Lassi.jpeg')) }}"
                                alt="Mango Lassi">
                        </div>
                        <h3 class="menu-item-title">Mango Lassi</h3>
                    </div>

                    <!-- Fresh juices -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Lime Juice.jpeg')) }}"
                                alt="Lime Juice">
                        </div>
                        <h3 class="menu-item-title">Lime Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Papaya Juice.jpg')) }}"
                                alt="Papaya Juice">
                        </div>
                        <h3 class="menu-item-title">Papaya Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mango Juice.jpg')) }}"
                                alt="Mango Juice">
                        </div>
                        <h3 class="menu-item-title">Mango Juice</h3>
                    </div>

                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Mix Fruit Juice.jpg')) }}"
                                alt="Mix Fruit Juice">
                        </div>
                        <h3 class="menu-item-title">Mix Fruit Juice</h3>
                    </div>

                    <!-- Shakes -->
                    <div class="menu-item" data-category="drinks">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Vanilla Shake.jpg')) }}"
                                alt="Vanilla Shake">
                        </div>
                        <h3 class="menu-item-title">Vanilla Shake</h3>
                    </div>

                    <!-- Coffee -->
                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Americano.jpeg')) }}"
                                alt="Americano">
                        </div>
                        <h3 class="menu-item-title">Americano</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Cappuccino.jpg')) }}"
                                alt="Cappuccino">
                        </div>
                        <h3 class="menu-item-title">Cappuccino</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Caffe Mocha.jpg')) }}"
                                alt="Caffe Mocha">
                        </div>
                        <h3 class="menu-item-title">Caffe Mocha</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Caffe Latte.jpg')) }}"
                                alt="Caffe Latte">
                        </div>
                        <h3 class="menu-item-title">Caffe Latte</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Hot Chocolate.jpg')) }}"
                                alt="Hot Chocolate">
                        </div>
                        <h3 class="menu-item-title">Hot Chocolate</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Espresso.webp')) }}"
                                alt="Espresso">
                        </div>
                        <h3 class="menu-item-title">Espresso</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Espresso Doppio.jpeg')) }}"
                                alt="Espresso Doppio">
                        </div>
                        <h3 class="menu-item-title">Espresso Doppio</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Affogato.jpg')) }}"
                                alt="Affogato">
                        </div>
                        <h3 class="menu-item-title">Affogato</h3>
                    </div>

                    <div class="menu-item" data-category="coffee">
                        <div class="menu-item-image">
                            <img src="{{ asset('assets/images/menuAIfood/' . rawurlencode('Flat White.jpeg')) }}"
                                alt="Flat White">
                        </div>
                        <h3 class="menu-item-title">Flat White</h3>
                    </div>

                </div>
                <!-- See more button (appears when a category has more than 9 items) -->
                <div class="menu-see-more-wrap text-center" style="margin-top:18px;">
                    <button id="menuSeeMore" class="btn btn-outline-primary">See More</button>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    (function(){
        // Menu tab filtering + See More functionality
        const TILES_PER_PAGE = 9;
        const tabs = document.querySelectorAll('.menu-tab');
        const items = Array.from(document.querySelectorAll('.menu-grid .menu-item'));
        const seeMoreBtn = document.getElementById('menuSeeMore');
        let activeCategory = 'dosa';
        let expanded = false;

        function applyFilter() {
            // hide all then show matching
            const matching = items.filter(i => i.dataset.category === activeCategory);
            items.forEach(i => i.style.display = 'none');

            matching.forEach((el, idx) => {
                if (!expanded && idx >= TILES_PER_PAGE) {
                    el.style.display = 'none';
                    el.classList.add('hidden-by-page');
                } else {
                    el.style.display = '';
                    el.classList.remove('hidden-by-page');
                }
            });

            // Show/Hide See More button
            if (matching.length > TILES_PER_PAGE) {
                if (seeMoreBtn) {
                    seeMoreBtn.style.display = 'inline-block';
                    seeMoreBtn.textContent = expanded ? 'See Less' : 'See More';
                }
            } else {
                if (seeMoreBtn) seeMoreBtn.style.display = 'none';
            }
        }

        // Tab clicks
        tabs.forEach(t => t.addEventListener('click', function(){
            tabs.forEach(x => x.classList.remove('active'));
            this.classList.add('active');
            activeCategory = this.dataset.category;
            expanded = false;
            applyFilter();
        }));

        // See more click
        if (seeMoreBtn) {
            seeMoreBtn.addEventListener('click', function(){
                expanded = !expanded;
                applyFilter();
            });
        }

        // Init
        applyFilter();
    })();
</script>
@endsection