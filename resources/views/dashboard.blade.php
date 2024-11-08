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
    <div class="w-1/2 bg-white shadow">
        @include('components.header')
        @include('components.slider')
        
        <div class="bg-white">
            <div class="mt-12 flex items-center p-4">
                <div class="w-full space-y-4">
                    <h1 class="text-3xl font-bold text-gray-800">Salurkan donasi kamu dengan mudah</h1>
                    <p class="text-gray-600">Jadikan program dan design kamu lebih menarik dan tertata rapi dengan menggunakan jasa dari Coristict.Studio</p>
                    <button class="bg-orange-500 text-white font-bold py-2 px-4 rounded-lg">Donasi Sekarang</button>
                </div>
                <div class="w-1/2 flex justify-end">
                    <img alt="Group of people holding donation items" class="h-[40vh] rounded-lg shadow-lg" src="https://storage.googleapis.com/a1aa/image/iBYB51XroyYeeEgotfjqmBQurBmNhW55cgppLICGebi7zfSdC.jpg" />
                </div>
            </div>
            <div class="mt-8 bg-gray-100 p-4">
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Daftar Campaign</h1>
                <!-- Swiper Container for Campaign Cards -->
                <div class="swiper-container overflow-x-hidden p-2">
                    <div class="swiper-wrapper" id="campaignList">
                        <!-- Campaigns will be injected here dynamically -->
                    </div>
                </div>
            </div>
        </div>
        @include('components.footer')
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
