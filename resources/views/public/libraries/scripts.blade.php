<script src="https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js"></script>

<script>
    var wa_btnSetting = {
        "btnColor": "#16BE45",
        "ctaText": "",
        "cornerRadius": 40,
        "marginBottom": 20,
        "marginLeft": 20,
        "marginRight": 20,
        "btnPosition": "right",
        "whatsAppNumber": "#",
        "welcomeMessage": "Hello! How can we help you today?",
        "zIndex": 999999,
        "btnColorScheme": "light"
    };
    window.onload = () => {
        _waEmbed(wa_btnSetting);
    };
</script>

<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/bootstrap/bootstrap-datepicker.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf6My1Jfdi1Fmj-DUmX_CcNOZ6FLkQ4Os"></script>
<script src="{{ asset('/assets/plugin/form-field/jquery.formstyler.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/revolution-plugin/jquery.themepunch.plugins.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/revolution-plugin/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/slick-slider/slick.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/isotop/isotop.js') }}"></script>
<script src="{{ asset('/assets/plugin/isotop/packery-mode.pkgd.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/magnific/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/animation/wow.min.js') }}"></script>
<script src="{{ asset('/assets/plugin/parallax/jquery.stellar.js') }}"></script>
<script src="{{ asset('/assets/js/app.js') }}"></script>
<script src="{{ asset('/assets/js/script.js') }}"></script>
<script src="{{ asset('/assets/js/custom.js') }}"></script>

<script>
    // initialize slick slider for signature grid when DOM is ready
    (function() {
        try {
            if (typeof jQuery !== 'undefined' && typeof jQuery.fn.slick !== 'undefined') {
                jQuery(document).ready(function($) {
                    $('.signature-grid').each(function() {
                        var $grid = $(this);
                        // avoid double-init
                        if ($grid.hasClass('slick-initialized')) return;
                        var itemCount = $grid.find('.sig-item').length || 1;
                        $grid.slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            arrows: true,
                            dots: false,
                            infinite: true,
                            autoplay: true,
                            autoplaySpeed: 3000,
                            pauseOnHover: true,
                            speed: 600,
                            responsive: [{
                                    breakpoint: 1200,
                                    settings: {
                                        slidesToShow: 4
                                    }
                                },
                                {
                                    breakpoint: 992,
                                    settings: {
                                        slidesToShow: 3
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 2
                                    }
                                },
                                {
                                    breakpoint: 480,
                                    settings: {
                                        slidesToShow: 1
                                    }
                                }
                            ]
                        });
                    });
                });
            }
        } catch (e) {
            console.warn('Slick init failed', e);
        }
    })();
</script>
<script>
    // manual tap zones for signature grid navigation
    (function() {
        try {
            if (typeof jQuery !== 'undefined') {
                jQuery(function($) {
                    // Handle visible arrow buttons
                    $('.sig-arrow-left').on('click', function(e) {
                        e.preventDefault();
                        $(this).closest('.signature-dishes').find('.signature-grid').slick(
                            'slickPrev');
                    });
                    $('.sig-arrow-right').on('click', function(e) {
                        e.preventDefault();
                        $(this).closest('.signature-dishes').find('.signature-grid').slick(
                            'slickNext');
                    });

                    // Handle invisible tap zones (if they exist)
                    var $left = $('.sig-nav-left');
                    var $right = $('.sig-nav-right');
                    $left.on('click touchstart', function(e) {
                        e.preventDefault();
                        $('.signature-grid').slick && $('.signature-grid').slick('slickPrev');
                    });
                    $right.on('click touchstart', function(e) {
                        e.preventDefault();
                        $('.signature-grid').slick && $('.signature-grid').slick('slickNext');
                    });
                });
            }
        } catch (err) {
            console.warn('sig-nav init failed', err);
        }
    })();
</script>

<!-- Mixture Products Auto-Scroll Script -->
<script>
    // Auto-scroll functionality for mixture products with drag support
    document.addEventListener('DOMContentLoaded', function() {
        const slider = document.querySelector('.mixture-products-slider');

        if (slider) {
            let scrollAmount = 0;
            let scrollDirection = 1; // 1 for right, -1 for left
            let scrollSpeed = 1; // pixels per frame
            let isAutoScrolling = true;
            let isDragging = false;
            let startX;
            let scrollLeft;

            function autoScroll() {
                if (!slider || !isAutoScrolling) return;

                // Get max scroll position
                const maxScroll = slider.scrollWidth - slider.clientWidth;

                // Auto scroll
                scrollAmount += scrollSpeed * scrollDirection;
                slider.scrollLeft = scrollAmount;

                // Change direction when reaching end
                if (scrollAmount >= maxScroll) {
                    scrollDirection = -1;
                } else if (scrollAmount <= 0) {
                    scrollDirection = 1;
                }

                requestAnimationFrame(autoScroll);
            }

            // Start auto-scroll
            autoScroll();

            // Pause on hover
            slider.addEventListener('mouseenter', function() {
                isAutoScrolling = false;
            });

            slider.addEventListener('mouseleave', function() {
                if (!isDragging) {
                    scrollAmount = slider.scrollLeft;
                    isAutoScrolling = true;
                    autoScroll();
                }
            });

            // Mouse drag functionality
            slider.addEventListener('mousedown', function(e) {
                isDragging = true;
                isAutoScrolling = false;
                slider.style.cursor = 'grabbing';
                startX = e.pageX - slider.offsetLeft;
                scrollLeft = slider.scrollLeft;
            });

            slider.addEventListener('mousemove', function(e) {
                if (!isDragging) return;
                e.preventDefault();
                const x = e.pageX - slider.offsetLeft;
                const walk = (x - startX) * 2; // Scroll speed multiplier
                slider.scrollLeft = scrollLeft - walk;
                scrollAmount = slider.scrollLeft;
            });

            slider.addEventListener('mouseup', function() {
                isDragging = false;
                slider.style.cursor = 'grab';
            });

            slider.addEventListener('mouseleave', function() {
                if (isDragging) {
                    isDragging = false;
                    slider.style.cursor = 'grab';
                }
            });

            // Touch/swipe functionality for mobile
            let touchStartX = 0;
            let touchScrollLeft = 0;

            slider.addEventListener('touchstart', function(e) {
                isAutoScrolling = false;
                touchStartX = e.touches[0].pageX;
                touchScrollLeft = slider.scrollLeft;
            }, {
                passive: true
            });

            slider.addEventListener('touchmove', function(e) {
                const touchX = e.touches[0].pageX;
                const walk = (touchStartX - touchX) * 1.5; // Swipe speed
                slider.scrollLeft = touchScrollLeft + walk;
                scrollAmount = slider.scrollLeft;
            }, {
                passive: true
            });

            slider.addEventListener('touchend', function() {
                setTimeout(function() {
                    scrollAmount = slider.scrollLeft;
                    isAutoScrolling = true;
                    autoScroll();
                }, 2000); // Resume auto-scroll after 2 seconds
            });

            // Set initial cursor
            slider.style.cursor = 'grab';
        }
    });
</script>
