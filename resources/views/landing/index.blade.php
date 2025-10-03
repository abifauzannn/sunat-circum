<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik Sunat Nano - Layanan Kesehatan Terpercaya</title>
    <meta name="description"
        content="Klinik kesehatan terpercaya dengan layanan sunat nano modern, teknologi terdepan, dokter berpengalaman, dan metode tanpa jahit untuk penyembuhan cepat.">

    <meta name="robots" content="index, follow">
    <link rel="icon" href="{{ asset('assets/sunatnano.png') }}" type="image/png">
    <meta name="keywords"
        content="klinik sunat, sunat nano, sunat modern, sunat tanpa jahit, dokter berpengalaman, sunat nano sidoarjo, sunat nano surabaa, sunat nano madura, sunat nano jakarta, sunat nano bandung">

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white">

    <!-- Header Navigation -->
    <!-- PASTIKAN Alpine.js sudah di-include di layout SEBELUM closing </body>:
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
-->

    <div x-data="{ open: false }">
        <header class="fixed top-0 left-0 right-0 z-40 bg-white shadow-sm">
            <nav class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-20">

                    <!-- Logo Klinik -->
                    <div class="flex-shrink-0">
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center justify-center rounded-lg">
                                @if ($klinik && $klinik->image)
                                    <img src="{{ asset('storage/' . $klinik->image) }}" alt="{{ $klinik->title }}"
                                        class="object-contain size-16 rounded-xl">
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="items-center hidden space-x-8 lg:flex">
                        <a href="#beranda"
                            class="font-medium transition-colors text-medical-primary hover:text-blue-700">
                            Beranda
                        </a>
                        <a href="#layanan"
                            class="font-medium transition-colors text-medical-primary hover:text-blue-700">
                            Layanan
                        </a>
                        <a href="#keunggulan"
                            class="font-medium transition-colors text-medical-primary hover:text-blue-700">
                            Keunggulan
                        </a>
                        <a href="#dokter"
                            class="font-medium transition-colors text-medical-primary hover:text-blue-700">
                            Tim Dokter
                        </a>
                    </div>

                    <div class="items-center hidden space-x-8 lg:flex">
                        <a href="https://wa.me/6285236959788?text=Halo%20saya%20ingin%20konsultasi" target="_blank"
                            class="px-6 py-3 font-semibold text-white transition-colors rounded-lg bg-medical-primary hover:bg-blue-700">
                            Konsultasi
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button @click="open = true" type="button"
                        class="p-2 text-gray-700 rounded-md lg:hidden focus:outline-none hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </nav>
        </header>

        <!-- Mobile Menu Overlay & Panel -->
        <template x-teleport="body">
            <div x-show="open" class="fixed inset-0 z-50 lg:hidden" x-cloak>

                <!-- Backdrop -->
                <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition-opacity ease-linear duration-300"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false"
                    class="fixed inset-0 bg-black bg-opacity-50">
                </div>

                <!-- Menu Panel -->
                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                    class="fixed top-0 right-0 bottom-0 w-80 max-w-[85vw] bg-white shadow-xl overflow-y-auto">

                    <!-- Header -->
                    <div class="flex items-center justify-between p-6 border-b border-gray-200">
                        <h2 class="text-xl font-bold text-medical-primary">Menu</h2>
                        <button @click="open = false" type="button"
                            class="p-2 text-gray-500 transition-colors rounded-md hover:text-gray-700 hover:bg-gray-100 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Menu Content -->
                    <div class="p-6">
                        <!-- Navigation Links -->
                        <nav class="mb-6 space-y-1">
                            <a href="#beranda" @click="open = false"
                                class="block px-4 py-3 text-base font-medium text-gray-700 transition-colors rounded-md hover:bg-gray-100 hover:text-medical-primary">
                                Beranda
                            </a>
                            <a href="#layanan" @click="open = false"
                                class="block px-4 py-3 text-base font-medium text-gray-700 transition-colors rounded-md hover:bg-gray-100 hover:text-medical-primary">
                                Layanan
                            </a>
                            <a href="#keunggulan" @click="open = false"
                                class="block px-4 py-3 text-base font-medium text-gray-700 transition-colors rounded-md hover:bg-gray-100 hover:text-medical-primary">
                                Keunggulan
                            </a>
                            <a href="#dokter" @click="open = false"
                                class="block px-4 py-3 text-base font-medium text-gray-700 transition-colors rounded-md hover:bg-gray-100 hover:text-medical-primary">
                                Tim Dokter
                            </a>
                        </nav>

                        <!-- Consultation Button -->
                        <a href="https://wa.me/6285236959788?text=Halo%20saya%20ingin%20konsultasi" target="_blank"
                            class="block w-full px-6 py-4 font-semibold text-center text-white transition-colors rounded-lg bg-medical-primary hover:bg-blue-700">
                            Konsultasi
                        </a>
                    </div>

                </div>
            </div>
        </template>
    </div>



    <!-- Hero Section -->
    <section id="beranda" class="relative pt-20 pb-16 medical-light">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center gap-12 lg:grid-cols-2">

                <!-- Content -->
                <div class="mt-5 space-y-8 text-medical-primay">

                    <div>
                        @if ($klinik && $klinik->title)
                            <h1
                                class="mb-6 text-4xl font-bold leading-tight md:text-5xl lg:text-6xl text-medical-primary">
                                {{ $klinik->title }}
                            </h1>
                        @endif


                        @if ($klinik && $klinik->description)
                            <p class="mb-8 text-xl leading-loose text-medical-neutral">
                                {{ $klinik->description }}
                            </p>
                        @endif

                    </div>

                    <!-- Key Benefits -->
                    <div class="grid gap-4 sm:grid-cols-2">
                        @foreach ($why as $w1)
                            <div class="flex items-center space-x-3">
                                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-medical-primary">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <span class="font-semibold text-medical-primary">{{ $w1->name }}</span>
                            </div>
                        @endforeach
                    </div>


                    <!-- CTA Buttons -->
                    <div class="flex flex-col gap-4 sm:flex-row">
                        <a href="https://wa.me/6285236959788?text=Halo%20saya%20ingin%20konsultasi" target="_blank"
                            class="flex items-center justify-center px-8 py-4 space-x-2 text-lg font-bold text-white rounded-lg bg-medical-primary">
                            <span>Konsultasi Gratis</span>
                        </a>
                        <a href="#layanan"
                            class="px-8 py-4 text-lg font-bold text-center border-2 rounded-lg border-medical-primary text-medical-primary">
                            Lihat Layanan
                        </a>
                    </div>

                    <!-- Stats -->

                </div>

                <!-- Medical Illustration/Image -->
                <div class="relative ">

                    <div class="flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('assets/home.png') }}" alt="Fasilitas Modern"
                            class="object-contain w-full">
                    </div>
                </div>
            </div>



        </div>

        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="pt-8 mt-5 border-t border-medical-warning">
                <div class="grid grid-cols-2 gap-6 text-center md:grid-cols-4">
                    @foreach ($review as $review)
                        <div>
                            <div class="text-3xl font-bold text-medical-primary">{{ $review->review_count }}+</div>
                            <div class="text-sm text-medical-neutral">{{ $review->name }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        </div>
    </section>


    <!-- Full Width Banner Carousel Section -->
    <section id="banner" class="relative w-full overflow-hidden">
        <!-- Section Header -->
        <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Carousel Container -->
            <div class="relative w-full">
                <!-- Carousel Wrapper -->
                <div id="bannerCarousel" class="relative w-full h-96 md:h-[800px] overflow-hidden">
                    <!-- Carousel Items -->
                    <div id="carouselTrack" class="flex h-full transition-transform duration-500 ease-in-out"
                        style="transform: translateX(0%);">
                        @foreach ($banner as $index => $bannerItem)
                            <div class="relative flex-shrink-0 w-full h-full group">
                                <a href="https://wa.me/6285236959788?text=Halo%20saya%20ingin%20konsultasi"
                                    target="_blank" class="block w-full h-full">

                                    @if ($bannerItem->type === 'video')
                                        <!-- Video Content -->
                                        <div class="relative w-full h-full">
                                            <video
                                                class="object-cover w-full h-full transition-transform duration-700 rounded-xl"
                                                autoplay muted loop playsinline preload="metadata">
                                                <source src="{{ asset('storage/' . $bannerItem->media) }}"
                                                    type="video/mp4">
                                                <!-- Fallback -->
                                                <div
                                                    class="flex items-center justify-center h-full bg-gradient-to-br from-gray-300 to-gray-400">
                                                    <div class="text-center text-white">
                                                        <svg class="w-24 h-24 mx-auto mb-4" fill="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path d="M8 5v14l11-7z" />
                                                        </svg>
                                                        <p class="text-lg font-bold">Video tidak dapat dimuat</p>
                                                    </div>
                                                </div>
                                            </video>
                                        </div>
                                    @else
                                        <!-- Image Content -->
                                        <div class="relative w-full h-full">
                                            <img src="{{ asset('storage/' . $bannerItem->media) }}"
                                                alt="Banner Image {{ $bannerItem->title }}"
                                                class="object-cover w-full h-full transition-transform duration-700 rounded-xl"
                                                loading="lazy"
                                                onerror="this.parentElement.innerHTML='<div class=\'flex items-center justify-center h-full bg-gradient-to-br from-gray-300 to-gray-400\'><div class=\'text-center text-white\'><svg class=\'w-24 h-24 mx-auto mb-4\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><rect x=\'3\' y=\'3\' width=\'18\' height=\'18\' rx=\'2\' ry=\'2\'/><circle cx=\'8.5\' cy=\'8.5\' r=\'1.5\'/><polyline points=\'21,15 16,10 5,21\'/></svg><p class=\'text-lg font-bold\'>Gambar tidak dapat dimuat</p></div></div>'">
                                        </div>
                                    @endif
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-4xl font-bold text-medical-primary md:text-5xl">
                    Layanan <span class="text-medical-warning">Sunat Nano</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-white">
                    Teknologi terdepan dengan pendekatan ramah untuk kenyamanan dan keamanan
                </p>
                <div
                    class="w-24 h-1 mx-auto mt-6 rounded-full bg-gradient-to-r from-medical-primary via-yellow-400 to-yellow-500">
                </div>
            </div>

            <!-- Services Grid -->
            <div class="flex flex-wrap justify-center gap-8 mx-auto">
                @foreach ($service as $index => $serviceItem)
                    <div
                        class="relative w-full sm:w-[calc(50%-1rem)] lg:w-[calc(25%-1.5rem)] p-8 overflow-hidden transition-all duration-300 transform rounded-3xl hover:shadow-2xl hover:-translate-y-2 group
                @if ($index % 3 == 0) bg-[#DEC8FE]
                @elseif($index % 3 == 1) bg-[#704FE6]
                @else bg-[#FFD464] @endif">

                        <!-- Decorative Circle Pattern (Top Left) -->
                        <div
                            class="absolute w-40 h-40 rounded-full -top-10 -left-10 opacity-20
                    @if ($index % 3 == 0) bg-[#704FE6]
                    @elseif($index % 3 == 1) bg-[#FFD464]
                    @else bg-white @endif">
                        </div>

                        <!-- Decorative Circles (Concentric Rings) -->
                        <div
                            class="absolute w-32 h-32 rounded-full border-8 -top-8 -left-8 opacity-25
                    @if ($index % 3 == 0) border-[#704FE6]
                    @elseif($index % 3 == 1) border-[#FFD464]
                    @else border-white @endif">
                        </div>

                        <div
                            class="absolute w-24 h-24 rounded-full border-8 -top-6 -left-6 opacity-30
                    @if ($index % 3 == 0) border-[#704FE6]
                    @elseif($index % 3 == 1) border-[#FFD464]
                    @else border-white @endif">
                        </div>

                        <!-- Decorative Star (Top Right) -->
                        <div class="absolute w-32 h-32 opacity-25 -top-4 -right-4">
                            <svg viewBox="0 0 100 100"
                                class="w-full h-full
                        @if ($index % 3 == 0) fill-[#704FE6]
                        @elseif($index % 3 == 1) fill-[#FFD464]
                        @else fill-white @endif">
                                <polygon points="50,5 60,40 95,45 65,65 70,95 50,80 30,95 35,65 5,45 40,40" />
                            </svg>
                        </div>

                        <!-- Decorative Zigzag Lines (Top Right) -->
                        <div class="absolute -top-2 -right-2 opacity-30">
                            <svg width="80" height="80" viewBox="0 0 80 80"
                                class="
                        @if ($index % 3 == 0) stroke-[#704FE6]
                        @elseif($index % 3 == 1) stroke-[#FFD464]
                        @else stroke-white @endif"
                                fill="none" stroke-width="8">
                                <path d="M10,10 L20,25 L10,40 L20,55 L10,70" />
                                <path d="M30,10 L40,25 L30,40 L40,55 L30,70" />
                                <path d="M50,10 L60,25 L50,40 L60,55 L50,70" />
                            </svg>
                        </div>

                        <!-- Icon Container with Background -->
                        <div
                            class="relative z-10 flex items-center justify-center p-4 mx-auto mb-6 transition-transform duration-300 w-36 h-36 rounded-2xl group-hover:scale-110">
                            <img src="{{ $serviceItem->image ? asset('storage/' . $serviceItem->image) : asset('assets/default.jpg') }}"
                                alt="{{ $serviceItem->name }}" class="object-contain w-36 h-36">
                        </div>

                        <!-- Service Name -->
                        <h3
                            class="text-center relative z-10 mb-4 text-xl font-bold transition-colors duration-300
                    @if ($index % 3 == 0) text-[#704FE6]
                    @elseif($index % 3 == 1) text-white
                    @else text-gray-900 @endif">
                            {{ $serviceItem->name }}
                        </h3>


                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why Choose Us - Enhanced Version -->
    <section id="keunggulan" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-medical-primary md:text-4xl">
                    Mengapa <span class="text-medical-warning">Memilih Kami ?</span>
                </h2>
                <div class="w-24 h-1 mx-auto mb-6 rounded-full bg-medical-primary"></div>
            </div>

            <div class="grid items-center gap-16 lg:grid-cols-2">
                <div class="relative">
                    <div class="flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('assets/frame1.png') }}" alt="Fasilitas Modern"
                            class="object-contain w-5/6 drop-shadow-lg">
                    </div>
                </div>

                <!-- Horizontal Badge Style -->
                <div class="flex flex-wrap items-center justify-center gap-6 lg:justify-start">
                    @foreach ($why as $index => $w2)
                        <div
                            class="flex items-center px-6 py-4 transition-all duration-300 border-2 border-gray-200 rounded-full shadow-sm hover:shadow-md hover:border-medical-primary group">
                            <!-- Dynamic Icons with Different Colors -->
                            <div class="flex-shrink-0 mr-4">
                                @if ($index % 4 == 0)
                                    <div
                                        class="flex items-center justify-center w-10 h-10 text-blue-600 transition-transform bg-blue-100 rounded-full group-hover:scale-110">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                @elseif($index % 4 == 1)
                                    <div
                                        class="flex items-center justify-center w-10 h-10 text-green-600 transition-transform bg-green-100 rounded-full group-hover:scale-110">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z" />
                                        </svg>
                                    </div>
                                @elseif($index % 4 == 2)
                                    <div
                                        class="flex items-center justify-center w-10 h-10 text-yellow-600 transition-transform bg-yellow-100 rounded-full group-hover:scale-110">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                        </svg>
                                    </div>
                                @else
                                    <div
                                        class="flex items-center justify-center w-10 h-10 text-purple-600 transition-transform bg-purple-100 rounded-full group-hover:scale-110">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>

                            <div class="flex-1 ml-4">
                                <h3
                                    class="text-base font-bold transition-colors text-medical-primary group-hover:text-medical-warning md:text-lg whitespace-nowrap">
                                    {{ $w2->name }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Pricelist & Facilities Section -->
    <section id="pricelist" class="py-20 -mt-1 bg-gray-50 "
        style="background-image: url('{{ asset('assets/astronout.png') }}'); background-size: cover; background-position:center;">
        <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <!-- Section Header -->
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-extrabold text-medical-primary md:text-4xl">
                    <span class="text-medical-warning">Paket & Promo</span> Kami
                </h2>
                <div class="w-24 h-1 mx-auto mb-6 rounded-full bg-medical-primary"></div>
            </div>

            <!-- Main Grid: Paket 2x2 + Promo -->
            <div class="grid gap-8 lg:grid-cols-2">

                <!-- Left Column: Paket 2x2 -->
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                    @foreach ($paket as $index => $p)
                        <div
                            class="relative flex flex-col h-full p-6 bg-white border border-gray-200 shadow-lg group rounded-2xl hover:shadow-2xl
                        @if ($p->is_bestseller == 1) bg-gradient-to-br from-purple-500 to-purple-600 text-white scale-105 border-0
                        @else hover:border-blue-300 @endif
                        transition-all duration-300 transform hover:-translate-y-2">

                            @if ($p->is_bestseller == 1)
                                <div class="absolute top-0 transform -translate-x-1/2 -translate-y-1/2 left-1/2">
                                    <div class="px-4 py-1 text-sm font-semibold text-purple-600 bg-white rounded-full">
                                        Terbaik
                                    </div>
                                </div>
                            @endif

                            <div class="flex flex-col h-full text-center">
                                <div class="mb-4">
                                    <img src="{{ $p->image ? asset('storage/' . $p->image) : 'https://via.placeholder.com/200x200?text=No+Image' }}"
                                        alt="{{ $p->nama_paket }}" class="object-cover w-24 h-24 mx-auto shadow-md">
                                </div>
                                <h3
                                    class="mb-4 text-xl font-bold @if ($p->is_bestseller == 1) text-white @else text-gray-900 @endif min-h-[3.5rem] flex items-center justify-center">
                                    {{ $p->nama_paket }}
                                </h3>
                                <div class="min-h-[5rem] flex flex-col justify-center">
                                    <div
                                        class="text-3xl font-bold @if ($p->is_bestseller == 1) text-white @else text-gray-900 @endif">
                                        Rp {{ number_format($p->price, 0, ',', '.') }}
                                    </div>
                                    <div
                                        class="@if ($p->is_bestseller == 1) text-purple-200 @else text-gray-500 @endif">
                                        /paket
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Right Column: Promo (gambar saja) -->
                <div class="grid grid-cols-1 gap-6">
                    @foreach ($promo as $pr)
                        <div
                            class="relative flex items-center justify-center transition-all duration-300 rounded-2xl ">
                            <img src="{{ $pr->image ? asset('storage/' . $pr->image) : 'https://via.placeholder.com/200x200?text=No+Image' }}"
                                alt="{{ $pr->name }}" class="object-contain w-full h-full rounded-2xl">
                        </div>
                    @endforeach
                </div>

            </div>

            <!-- Facilities Section Header -->
            <div id="fasilitas" class="mt-16 mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold text-gray-900 md:text-4xl">
                    Fasilitas Klinik
                </h2>
                <div class="w-24 h-1 mx-auto mb-6 rounded-full bg-gradient-to-r from-green-500 to-blue-500"></div>
            </div>

            <!-- Facilities Grid -->
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach ($fasilitas as $item)
                    <div
                        class="relative overflow-hidden transition-all duration-300 transform shadow-lg group rounded-2xl hover:shadow-2xl hover:-translate-y-2">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/400x300?text=No+Image' }}"
                            alt="{{ $item->nama_fasilitas }}"
                            class="object-cover w-full h-64 transition-transform duration-300 group-hover:scale-110"
                            loading="lazy">

                        <div
                            class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 bg-black bg-opacity-0 opacity-0 group-hover:bg-opacity-70 group-hover:opacity-100">
                            <h3 class="px-6 py-3 text-xl font-bold text-center text-white">
                                {{ $item->nama_fasilitas }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


    <!-- Doctor Team Section -->
    <section id="dokter" class="py-20 bg-white">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-4xl font-bold text-medical-primary md:text-5xl">
                    Tim <span class="text-medical-warning">Dokter Spesialis</span>
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    Dokter ramah dan berpengalaman siap merawat dengan penuh kasih sayang
                </p>
                <div
                    class="w-24 h-1 mx-auto mt-6 rounded-full bg-gradient-to-r from-medical-primary via-purple-400 to-pink-400">
                </div>
            </div>

            <!-- Doctors Grid -->
            <div class="flex flex-wrap justify-center gap-8 mx-auto">
                @foreach ($dokter as $index => $dokterItem)
                    <div
                        class="relative w-full sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.5rem)] p-8 overflow-hidden transition-all duration-300 transform rounded-3xl hover:shadow-2xl hover:-translate-y-2 group
                    @if ($index % 3 == 0) bg-[#DEC8FE]
                    @elseif($index % 3 == 1) bg-[#704FE6]
                    @else bg-[#FFD464] @endif">

                        <!-- Decorative Circle Pattern (Top Left) -->
                        <div
                            class="absolute w-40 h-40 rounded-full -top-10 -left-10 opacity-20
                        @if ($index % 3 == 0) bg-[#704FE6]
                        @elseif($index % 3 == 1) bg-[#FFD464]
                        @else bg-white @endif">
                        </div>

                        <!-- Decorative Circles (Concentric Rings) -->
                        <div
                            class="absolute w-32 h-32 rounded-full border-8 -top-8 -left-8 opacity-25
                        @if ($index % 3 == 0) border-[#704FE6]
                        @elseif($index % 3 == 1) border-[#FFD464]
                        @else border-white @endif">
                        </div>

                        <div
                            class="absolute w-24 h-24 rounded-full border-8 -top-6 -left-6 opacity-30
                        @if ($index % 3 == 0) border-[#704FE6]
                        @elseif($index % 3 == 1) border-[#FFD464]
                        @else border-white @endif">
                        </div>

                        <!-- Decorative Star (Top Right) -->
                        <div class="absolute w-32 h-32 opacity-25 -top-4 -right-4">
                            <svg viewBox="0 0 100 100"
                                class="w-full h-full
                            @if ($index % 3 == 0) fill-[#704FE6]
                            @elseif($index % 3 == 1) fill-[#FFD464]
                            @else fill-white @endif">
                                <polygon points="50,5 60,40 95,45 65,65 70,95 50,80 30,95 35,65 5,45 40,40" />
                            </svg>
                        </div>

                        <!-- Decorative Zigzag Lines (Top Right) -->
                        <div class="absolute -top-2 -right-2 opacity-30">
                            <svg width="80" height="80" viewBox="0 0 80 80"
                                class="
                            @if ($index % 3 == 0) stroke-[#704FE6]
                            @elseif($index % 3 == 1) stroke-[#FFD464]
                            @else stroke-white @endif"
                                fill="none" stroke-width="8">
                                <path d="M10,10 L20,25 L10,40 L20,55 L10,70" />
                                <path d="M30,10 L40,25 L30,40 L40,55 L30,70" />
                                <path d="M50,10 L60,25 L50,40 L60,55 L50,70" />
                            </svg>
                        </div>

                        <!-- Doctor Photo Container -->
                        <div
                            class="relative z-10 flex items-center justify-center mx-auto mb-6 transition-transform duration-300 w-36 h-36 group-hover:scale-110">
                            <div class="overflow-hidden border-4 border-white rounded-full shadow-xl w-36 h-36">
                                <img src="{{ $dokterItem->image ? asset('storage/' . $dokterItem->image) : asset('assets/default.jpg') }}"
                                    alt="{{ $dokterItem->nama_dokter }}" class="object-cover w-full h-full">
                            </div>
                        </div>

                        <!-- Doctor Name -->
                        <h3
                            class="relative z-10 mb-3 text-xl font-bold text-center transition-colors duration-300
                        @if ($index % 3 == 0) text-[#704FE6]
                        @elseif($index % 3 == 1) text-white
                        @else text-gray-900 @endif">
                            {{ $dokterItem->nama_dokter }}
                        </h3>

                        <!-- SIP Badge -->
                        <div class="relative z-10 text-center">
                            <span
                                class="inline-block px-4 py-2 text-sm font-semibold rounded-full
                            @if ($index % 3 == 0) bg-white text-[#704FE6]
                            @elseif($index % 3 == 1) bg-[#FFD464] text-gray-900
                            @else bg-white text-gray-900 @endif">
                                {{ $dokterItem->sip }}
                            </span>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="relative py-20 overflow-hidden bg-white">

        <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-16 lg:grid-cols-2">

                <!-- Left Side - Text -->
                <div class="relative z-10">

                    <h2 class="relative mb-4 text-4xl font-bold text-medical-primary md:text-5xl">
                        Testimoni <span class="text-medical-warning">Pasien Kami</span>
                    </h2>

                    <div
                        class="w-24 h-1 mb-6 rounded-full bg-gradient-to-r from-medical-primary via-yellow-400 to-yellow-500">
                    </div>

                    <p class="mb-10 text-lg text-gray-600">
                        Kepuasan dan kebahagiaan pasien adalah prioritas utama kami. Lihat pengalaman nyata dari
                        keluarga yang telah mempercayakan kami.
                    </p>
                </div>

                <!-- Right Side - Video -->
                <div class="relative z-10 flex justify-center lg:justify-end">
                    @foreach ($testimonis as $testimoni)
                        @if ($testimoni->type === 'video')
                            <div class="relative group">

                                <!-- Main Video Card with Purple Dark Background -->
                                <div class="relative w-full overflow-hidden transition-all duration-300 transform bg-[#704FE6] shadow-2xl rounded-3xl hover:shadow-3xl hover:-translate-y-2"
                                    style="width: 300px; height: 530px;">

                                    <!-- Decorative Circle Pattern (Top Left) -->
                                    <div
                                        class="absolute w-40 h-40 bg-[#FFD464] rounded-full -top-10 -left-10 opacity-20">
                                    </div>

                                    <!-- Decorative Circles (Concentric Rings) -->
                                    <div
                                        class="absolute w-32 h-32 rounded-full border-8 border-[#FFD464] -top-8 -left-8 opacity-25">
                                    </div>
                                    <div
                                        class="absolute w-24 h-24 rounded-full border-8 border-[#FFD464] -top-6 -left-6 opacity-30">
                                    </div>

                                    <!-- Decorative Star (Top Right) -->
                                    <div class="absolute w-32 h-32 opacity-25 -top-4 -right-4">
                                        <svg viewBox="0 0 100 100" class="w-full h-full fill-[#DEC8FE]">
                                            <polygon
                                                points="50,5 60,40 95,45 65,65 70,95 50,80 30,95 35,65 5,45 40,40" />
                                        </svg>
                                    </div>

                                    <!-- Decorative Zigzag Lines (Bottom Right) -->
                                    <div class="absolute -bottom-2 -right-2 opacity-30">
                                        <svg width="80" height="80" viewBox="0 0 80 80"
                                            class="stroke-[#FFD464]" fill="none" stroke-width="8">
                                            <path d="M10,10 L20,25 L10,40 L20,55 L10,70" />
                                            <path d="M30,10 L40,25 L30,40 L40,55 L30,70" />
                                            <path d="M50,10 L60,25 L50,40 L60,55 L50,70" />
                                        </svg>
                                    </div>

                                    <!-- Badge "Video Testimoni" -->


                                    <!-- Video Container -->
                                    <div class="relative z-10 w-full h-full p-4">
                                        <div class="w-full h-full overflow-hidden bg-gray-900 rounded-2xl">
                                            <video
                                                class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                                                controls playsinline preload="metadata">
                                                <source src="{{ asset('storage/' . $testimoni->media) }}"
                                                    type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

        <style>
            .shadow-3xl {
                box-shadow: 0 35px 60px -15px rgba(112, 79, 230, 0.3);
            }
        </style>
    </section>



    <!-- Footer -->
    <footer class="py-16 text-white bg-gray-900">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid gap-8 mb-8 md:grid-cols-4">
                <!-- Clinic Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center mb-6 space-x-3">
                        <div class="flex items-center justify-center">
                            @if ($klinik && $klinik->image)
                                <img src="{{ asset('storage/' . $klinik->image) }}" alt="{{ $klinik->title }}"
                                    class="object-contain size-16 rounded-xl">
                            @endif
                        </div>
                        <div>
                            @if ($klinik && $klinik->title)
                                <h3 class="text-xl font-bold">{{ $klinik->title }}</h3>
                            @endif
                        </div>
                    </div>
                    @if ($klinik && $klinik->description)
                        <p class="mb-6 leading-relaxed text-gray-300">
                            {{ $klinik->description }}
                        </p>
                    @endif

                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/sunat_nano_circumcision?igsh=cHN2YWZqazI3cXBq"
                            class="flex items-center justify-center w-10 h-10 transition-colors bg-pink-600 rounded-full hover:bg-pink-700">
                            <span class="text-sm font-bold">IG</span>
                        </a>
                        <a href="https://wa.me/6285236959788?text=Halo%20saya%20ingin%20konsultasi" target="_blank"
                            class="flex items-center justify-center w-10 h-10 transition-colors bg-green-600 rounded-full hover:bg-green-700">
                            <span class="text-sm font-bold">WA</span>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="mb-6 text-lg font-bold">Menu Utama</h4>
                    <div class="space-y-3">
                        <a href="#beranda" class="block text-gray-300 transition-colors hover:text-white">Beranda</a>
                        <a href="#layanan" class="block text-gray-300 transition-colors hover:text-white">Layanan</a>
                        <a href="#keunggulan"
                            class="block text-gray-300 transition-colors hover:text-white">Keunggulan</a>
                        <a href="#dokter" class="block text-gray-300 transition-colors hover:text-white">Tim
                            Dokter</a>
                        <a href="#kontak" class="block text-gray-300 transition-colors hover:text-white">Kontak</a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="mb-6 text-lg font-bold">Kontak Info</h4>
                    <div class="space-y-4">
                        <div class="flex items-start space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 mt-1 text-medical-primary" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <div>
                                <p class="text-gray-300">+62 852-3695-9788</p>
                                <p class="text-xs text-gray-400">24/7 Konsultasi</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 mt-1 text-medical-primary" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="text-gray-300">info@kliniksunatnano.com</p>
                            </div>
                        </div>

                        <!-- Lokasi Cabang - Button untuk Modal -->
                        <div class="space-y-3">
                            <div class="flex items-center space-x-3">
                                <svg class="flex-shrink-0 w-5 h-5 text-medical-primary" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <span class="font-semibold text-gray-200">Lokasi Cabang</span>
                            </div>

                            <button onclick="window.dispatchEvent(new CustomEvent('open-lokasi-modal'))"
                                class="flex items-center justify-between w-full px-4 py-3 text-left transition-all bg-white rounded-lg dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 group">
                                <span class="text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Lihat Semua Lokasi ({{ count($lokasi) }} Cabang)
                                </span>
                                <svg class="w-5 h-5 text-gray-500 transition-transform group-hover:translate-x-1"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="pt-8 border-t border-gray-700">
                <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                    <p class="text-sm text-gray-400">
                        © 2025 Klinik Sunat Nano. Semua hak dilindungi.
                    </p>
                    <div class="flex space-x-6 text-sm text-gray-400">
                        <a href="#" class="transition-colors hover:text-white">Kebijakan Privasi</a>
                        <a href="#" class="transition-colors hover:text-white">Syarat & Ketentuan</a>
                        <a href="#" class="transition-colors hover:text-white">FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Modal Lokasi Cabang -->
    <div x-data="{ open: false, search: '' }" @open-lokasi-modal.window="open = true" @keydown.escape.window="open = false"
        x-show="open" x-cloak class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">

        <!-- Backdrop -->
        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" @click="open = false" class="fixed inset-0 bg-black bg-opacity-50">
        </div>

        <!-- Modal Content -->
        <div class="flex items-center justify-center min-h-screen px-4 py-8">
            <div x-show="open" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95" @click.stop
                class="relative w-full max-w-3xl bg-white shadow-2xl rounded-2xl dark:bg-gray-800">

                <!-- Header -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Lokasi Cabang Kami</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Temukan cabang terdekat dengan Anda
                        </p>
                    </div>
                    <button @click="open = false"
                        class="p-2 text-gray-400 transition-colors rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Search Bar -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="relative">

                        <input x-model="search" type="text" placeholder="Cari cabang atau kota..."
                            class="w-full py-2 pl-10 pr-4 text-gray-900 border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Lokasi List -->
                <div class="px-6 py-4 overflow-y-auto max-h-96">
                    <div class="space-y-3">
                        @foreach ($lokasi as $item)
                            <div x-show="'{{ strtolower($item->nama_cabang) }} {{ strtolower($item->alamat_cabang) }}'.includes(search.toLowerCase())"
                                x-data="{ expanded: false }"
                                class="overflow-hidden transition-all border border-gray-200 rounded-lg dark:border-gray-700 hover:shadow-md">

                                <!-- Header -->
                                <button @click="expanded = !expanded"
                                    class="flex items-center justify-between w-full px-4 py-4 text-left bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-blue-100 rounded-full dark:bg-blue-900">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">
                                                {{ $item->nama_cabang }}</h4>
                                            <p class="text-sm text-gray-500 dark:text-gray-400">Klik untuk melihat
                                                alamat</p>
                                        </div>
                                    </div>
                                    <svg :class="expanded ? 'rotate-180' : ''"
                                        class="w-5 h-5 text-gray-500 transition-transform duration-200" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                <!-- Body -->
                                <div x-show="expanded" x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 transform -translate-y-2"
                                    x-transition:enter-end="opacity-100 transform translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 transform translate-y-0"
                                    x-transition:leave-end="opacity-0 transform -translate-y-2"
                                    class="px-4 py-4 bg-white dark:bg-gray-800" style="display: none;">
                                    <p class="mb-3 text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                                        {{ $item->alamat_cabang }}
                                    </p>
                                    <div class="flex gap-2">
                                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($item->alamat_cabang) }}"
                                            target="_blank"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-600 transition-colors rounded-lg bg-blue-50 hover:bg-blue-100 dark:bg-blue-900 dark:text-blue-300 dark:hover:bg-blue-800">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                                            </svg>
                                            Buka di Maps
                                        </a>
                                        <a href="https://wa.me/6285236959788?text=Halo,%20saya%20ingin%20berkonsultasi%20untuk%20cabang%20{{ urlencode($item->nama_cabang) }}"
                                            target="_blank"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-green-600 transition-colors rounded-lg bg-green-50 hover:bg-green-100 dark:bg-green-900 dark:text-green-300 dark:hover:bg-green-800">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                            Hubungi via WA
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- No Results -->
                    <div x-show="!$el.previousElementSibling?.querySelector('[x-show]:not([style*=\'display: none\'])')"
                        class="py-12 text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <p class="mt-4 text-gray-500 dark:text-gray-400">Tidak ada lokasi yang ditemukan</p>
                    </div>
                </div>

                <!-- Footer -->
                <div
                    class="px-6 py-4 border-t border-gray-200 bg-gray-50 dark:bg-gray-700 dark:border-gray-600 rounded-b-2xl">
                    <p class="text-sm text-center text-gray-600 dark:text-gray-300">
                        Butuh bantuan? Hubungi kami di
                        <a href="https://wa.me/6285236959788"
                            class="font-medium text-blue-600 hover:underline dark:text-blue-400">
                            WhatsApp
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Floating WhatsApp Button -->
    <div class="fixed z-50 bottom-6 right-6">
        <a href="https://wa.me/6281234567890" target="_blank"
            class="flex items-center justify-center transition-all duration-300 bg-green-500 rounded-full shadow-lg w-14 h-14 hover:bg-green-600 hover:shadow-xl pulse-ring">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.890-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.63z" />
            </svg>
        </a>
    </div>

    <!-- Back to Top Button -->
    <div class="fixed z-50 bottom-6 left-6">
        <button onclick="scrollToTop()"
            class="flex items-center justify-center w-12 h-12 transition-all duration-300 rounded-full shadow-lg opacity-0 bg-medical-primary hover:bg-blue-700 hover:shadow-xl"
            id="backToTop">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18">
                </path>
            </svg>
        </button>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const panel = document.getElementById('mobileMenuPanel');

            // Toggle visibility
            menu.classList.toggle('hidden');

            // Animasi slide in/out
            if (menu.classList.contains('hidden')) {
                panel.classList.add('translate-x-full');
            } else {
                panel.classList.remove('translate-x-full');
            }
        }

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Back to Top Button
        window.addEventListener('scroll', function() {
            const backToTop = document.getElementById('backToTop');
            if (window.pageYOffset > 300) {
                backToTop.style.opacity = '1';
            } else {
                backToTop.style.opacity = '0';
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Form Submission
        function handleFormSubmit(event) {
            event.preventDefault();

            // Get form data
            const formData = new FormData(event.target);
            const data = Object.fromEntries(formData);

            // Show success message
            alert('Terima kasih! Konsultasi Anda telah dikirim. Tim medis kami akan segera menghubungi Anda.');

            // Reset form
            event.target.reset();

            // In real implementation, send data to server
            console.log('Form data:', data);
        }

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all medical cards for animation
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.medical-card');
            cards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                card.style.transition = 'all 0.6s ease';
                observer.observe(card);
            });
        });

        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const panel = document.getElementById('mobileMenuPanel');

            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                setTimeout(() => panel.classList.remove('translate-x-full'), 10);
            } else {
                panel.classList.add('translate-x-full');
                setTimeout(() => menu.classList.add('hidden'), 300);
            }
        }
    </script>

</body>

</html>
