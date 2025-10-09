<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title', 'Balaji Dosai')</title>

    <meta name="description"
        content="Balaji Dosai is a fully vegetarian South Indian restaurant in Kandy, Sri Lanka. Enjoy crispy dosas, flavorful chutneys, and authentic Indian flavors." />

    <!-- Keywords (optional, less-used these days) -->
    <meta name="keywords"
        content="Balaji Dosai, Kandy, South Indian cuisine, vegetarian restaurant, dosas, Indian food Sri Lanka" />

    <!-- Open Graph / Facebook -->
    <meta property="og:site_name" content="Balaji Dosai" />
    <meta property="og:title" content="Balaji Dosai — Authentic South Indian Vegetarian Restaurant in Kandy" />
    <meta property="og:description"
        content="Balaji Dosai is a fully vegetarian South Indian restaurant in Kandy, Sri Lanka. Enjoy crispy dosas, flavorful chutneys, and authentic Indian flavors." />
    <meta property="og:url" content="https://balajidosai.com/" />
    <meta property="og:type" content="restaurant.restaurant" />
    <meta property="og:locale" content="en_US" />
    <!-- If you have an image for sharing -->
    <meta property="og:image" content="https://balajidosai.com/assets/images/logo.png" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Balaji Dosai — Authentic South Indian Vegetarian Restaurant in Kandy" />
    <meta name="twitter:description"
        content="Balaji Dosai is a fully vegetarian South Indian restaurant in Kandy, Sri Lanka. Enjoy crispy dosas, flavorful chutneys, and authentic Indian flavors." />
    <meta name="twitter:image" content="https://balajidosai.com/assets/images/logo.png" />

    <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
    @include('public.libraries.styles')
</head>

<body>
    <div class="wrapper">

        @include('public.components.header')

        @yield('content')

        @include('public.components.footer')
    </div>
    <!-- Back To Top Arrow -->
    <a href="#" class="top-arrow"></a>
    <!--Messenger and WhatsApp Floating btns-->
    <a href="#" class="float" style="z-index: 999999;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-messenger my-float" viewBox="0 0 16 16">
            <path
                d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.64.64 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.64.64 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76m5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z" />
        </svg>
    </a>

    @include('public.libraries.scripts')

</body>

</html>
