<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Balaji Dosai') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Primary Meta Tags -->
    <meta name="description"
        content="Balaji Dosai House (Pvt) Ltd — Sri Lanka’s trusted battery specialist since 1980. We offer car, motorcycle, solar & heavy-vehicle batteries plus door-to-door mobile replacement across Sri Lanka." />
    <meta name="keywords"
        content="battery shop Sri Lanka, car battery Sri Lanka, mobile battery replacement, solar battery, vehicle battery, Balaji Dosai House, battery service Sri Lanka" />
    <meta name="author" content="Balaji Dosai House (Pvt) Ltd" />

    <!-- Viewport / Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Balaji Dosai House | Sri Lanka Battery Specialists" />
    <meta property="og:description"
        content="Quality batteries & on-site mobile service across Sri Lanka. Car, motorcycle, solar & heavy vehicle solutions since 1980." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://tharakabattery.lk/" />
    <meta property="og:image" content="https://tharakabattery.lk/assets/images/logo.png" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Balaji Dosai House | Trusted Battery Solutions" />
    <meta name="twitter:description"
        content="Serving Sri Lanka since 1980 — car, motorcycle, solar & heavy vehicle battery solutions plus mobile replacement service." />
    <meta name="twitter:image" content="https://tharakabattery.lk/assets/images/logo.png" />
    <meta name="twitter:site" content="@TharakaBattery" />

    <link rel="shortcut icon" type="image/png" href="images/favicon.png">

    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased">
    @inertia

    <script src="{{ asset('vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('vendor/chart-js/chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

    {{-- <script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script> --}}
    <script src="{{ asset('vendor/draggable/draggable.js') }}"></script>
    <script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>

    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>

    <script src="{{ asset('js/custom.min.js') }}"></script>
    <script src="{{ asset('js/deznav-init.js') }}"></script>
    <script src="{{ asset('js/demo.js') }}"></script>
    <script src="{{ asset('js/styleSwitcher.js') }}"></script>
    <script>
        jQuery(document).ready(function() {
            setTimeout(function() {
                dzSettingsOptions.version = 'light';
                new dzSettings(dzSettingsOptions);

                setCookie('version', 'light');
            }, 1500)
        });
    </script>
</body>

</html>
