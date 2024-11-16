<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Lazismu - Donation Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center">
    <div class="w-[40%] bg-white shadow-md">
        @include('components.header')
        @include('components.swiper')
        
        <div class="bg-white">
            <div class="items-center p-4 bg-gradient-to-b from-orange-300 via-orange-200 to-orange-50">
                    <div class="grid grid-cols-4 gap-2 w-full">
                        <a href="campaign" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                            <i class="fas fa-hands-helping text-4xl text-orange-500"></i>
                            <p class="mt-2 text-gray-700 font-medium">Campaign</p>
                        </a>
                        <a href="ziswaf" onclick="setType('zakats')" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
    <i class="fas fa-hand-holding-heart text-4xl text-orange-500"></i>
    <p class="mt-2 text-gray-700 font-medium">Zakat</p>
</a>
<a href="ziswaf" onclick="setType('infaks')" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
    <i class="fas fa-hand-holding-usd text-4xl text-orange-500"></i>
    <p class="mt-2 text-gray-700 font-medium">Infak</p>
</a>
<a href="ziswaf" onclick="setType('wakafs')" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
    <i class="fas fa-donate text-4xl text-orange-500"></i>
    <p class="mt-2 text-gray-700 font-medium">Wakaf</p>
</a>
                    </div>
                </div>
                <div class="bg-orange-50 p-4">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Rekomendasi Campaign</h1>
                <!-- Swiper Container for Campaign Cards -->
                <div class="swiper-container overflow-x-hidden p-2">
                    <div class="swiper-wrapper" id="campaignList">
                        <!-- Campaigns will be injected here dynamically -->
                    </div>
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
