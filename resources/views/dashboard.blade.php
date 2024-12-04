<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lazismu - Donation Page</title>
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
    <div class="w-full md:w-[500px] bg-white shadow-md">
        @include('components.header')
        @include('components.swiper')
        <div class="bg-white">
            <div class="items-center p-2 sm:p-4">
                <!-- Grid untuk Ziswaf Categories -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 w-full">
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
                    <a href="ziswaf" onclick="setType('wakafs')"
                        class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                        <i class="fas fa-donate text-3xl sm:text-4xl text-orange-500"></i>
                        <p class="mt-2 text-gray-700 text-sm sm:text-base font-medium">Wakaf</p>
                    </a>
                </div>
            </div>
            <div class="p-2 sm:p-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2 sm:mb-4">Rekomendasi Campaign</h1>
                <!-- Swiper Container for Campaign Cards -->
                <div class="swiper-container overflow-x-hidden p-2">
                    <div class="swiper-wrapper" id="campaignList">
                        <!-- Campaigns will be injected here dynamically -->
                    </div>
                </div>
            </div>
            <div class="p-2 sm:p-4 hidden">
                <div class="flex gap-2 items-start w-full">
                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2 sm:mb-4 relative">Mari Bantu
                        <span class="text-orange-600">Mereka</span>
                    </h1>
                    <div class="flex gap-1 h-10">
                        <div class="w-6 h-12 bg-orange-300 rounded-tl-2xl rotate-12 rounded-br-2xl"></div>
                        <div class="w-6 h-12 bg-orange-300 rounded-tl-2xl rotate-12 rounded-br-2xl"></div>
                        <div class="w-6 h-12 bg-orange-300 rounded-tl-2xl rotate-12 rounded-br-2xl"></div>
                    </div>
                </div>
                <div class="flex w-full gap-2 rounded-lg border border-gray-200 shadow">
                    <img src="" class="bg-gray-100 h-auto w-1/3" alt="">
                    <div>
                    <h1>Judul</h1>
                    <p>Terkumpul</p>
                    <p>Target</p>
                    </div>
                </div>
                <div id="campaignPopular">
                </div>
            </div>
        </div>
        @include('components.footer')
        @include('components.bottomNav')
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
