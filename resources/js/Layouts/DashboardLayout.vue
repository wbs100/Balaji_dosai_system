<template>
    <!DOCTYPE html>
    <html lang="en">

    <Head :title="title ? title : 'Balaji Dosai'">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="DexignZone">
        <meta name="robots" content="index, follow">

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

        <!-- FAVICONS ICON -->
        <link rel="shortcut icon" type="image/png" href="/assets/images/logo.png">
    </Head>

    <body>

        <!-- <div id="preloader">
            <div>
                <img src="images/pre.gif" alt="">
            </div>
        </div> -->

        <div class="show" ref="layoutRef">
            <Header @toggle-menu="toggleMenu" />

            <SideBar />

            <slot name="content" />
            <slot name="loader" />

            <Footer />

        </div>

    </body>

    </html>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import Header from '@/Components/Main/Header.vue';
import SideBar from '@/Components/Main/SideBar.vue';
import Footer from '@/Components/Main/Footer.vue';

const props = defineProps({
    title: String,
});

const layoutRef = ref(null);

const toggleMenu = () => {
    layoutRef.value.classList.toggle('menu-toggle');
};
</script>
