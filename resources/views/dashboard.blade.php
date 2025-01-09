<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Platfrom Crowdfunding Lazismu DIY untuk menyalurkan berbagai kebaikan secara online dengan berbagai progam pemberdayaan dan pendayagunaan.">
    <meta name="keywords" content="Donasi, Daftar Zakat, Zakat Fitrah, Zakat Maal, Zakat Penghasilan, Zakat Perdagangan, Zakat Tabungan, Zakat Emas, Zakat Pertanian, Zakat Peternakan, Infak, Infak Sedekah, Infak Pendidikan, Infak Sosial, Infak Kesehatan, Sedekah, Campaign, Wakaf, Wakaf Produktif, Wakaf Tunai, Wakaf Kesehatan, Wakaf Pendidikan, Donasi Online, Program Sosial, Program Keagamaan, Jalan Kebaikan, Lazismu">
    <meta name="author" content="Akbar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lazismu Jogja - Jalan Kebaikan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center">
    <div class="bg-white flex justify-center items-center min-h-screen">
        <!-- Wrapper dengan maksimal lebar 500px -->
        <div id="loadingScreen"
            class="relative w-full md:w-[500px] h-screen flex flex-col justify-center items-center bg-white">
            <!-- Logo dengan animasi pulse -->
            <img alt="Lazismu Logo" src="{{ asset('image/logoOrange.png') }}" class="h-32 animate-pulse" />

            <!-- Teks dengan efek mengetik dan gradasi -->
            <div class="mt-1 text-center">
                <span
                    class="block bg-clip-text text-transparent bg-gradient-to-r from-[#FFA500] via-[#FF4500] to-[#FF6347] text-lg sm:text-xl font-semibold">
                    SIAPA TAHU,
                </span>
                <span
                    class="block bg-clip-text text-transparent bg-gradient-to-r from-[#FFA500] via-[#FF4500] to-[#FF6347] text-lg sm:text-xl font-semibold">
                    INI KEBAIKANMU UNTUK YANG TERAKHIR KALINYA
                </span>
            </div>
        </div>
    </div>


    <div id="dashboardContent" class="hidden w-full md:w-[500px] bg-white shadow-md">
        @include('components.header')
        @include('components.wa')
        @include('components.swiper')
        <div class="bg-white">
            <div class="items-center p-2 sm:p-4">
                <!-- Grid untuk Ziswaf Categories -->
                <div class="grid grid-cols-3 gap-4 w-full">
                    <a href="campaign" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-hands-helping text-3xl sm:text-4xl text-orange-500"></i>
                        <p class="mt-2 text-gray-700 text-sm sm:text-base font-medium">Campaign</p>
                    </a>
                    <a href="ziswaf" onclick="setType('zakats')"
                        class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-hand-holding-heart text-3xl sm:text-4xl text-orange-500"></i>
                        <p class="mt-2 text-gray-700 text-sm sm:text-base font-medium">Zakat</p>
                    </a>
                    <a href="ziswaf" onclick="setType('infaks')"
                        class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-hand-holding-usd text-3xl sm:text-4xl text-orange-500"></i>
                        <p class="mt-2 text-gray-700 text-sm sm:text-base font-medium">Infak</p>
                    </a>
                </div>
            </div>
            <div class="p-2 sm:p-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2 sm:mb-4">Rekomendasi <span
                        class="text-orange-500">Campaign</span></h1>
                <!-- Swiper Container for Campaign Cards -->
                <div class="swiper-container overflow-x-hidden p-2">
                    <div class="swiper-wrapper" id="campaignList">
                        <!-- Campaigns will be injected here dynamically -->
                    </div>
                </div>
            </div>
            <div class="p-2 sm:p-4">
                <div class="flex gap-2 items-start w-full">
                    <div class="flex text-end mb-2">
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2 relative">Mari Bantu
                            <span class="text-orange-500">Mereka</span>
                        </h1>
                    </div>
                </div>
                <div id="campaignPopular" class="flex flex-col">
                </div>
            </div>
        </div>
        @include('components.footer')
        @include('components.bottomNav')
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</body>

</html>
