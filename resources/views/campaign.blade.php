<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Campaign List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
</head>
<body class="font-roboto bg-gray-100 flex justify-center">
    <div class="w-[40%] bg-white min-h-screen shadow">
        @include('components.header')
        <main class="container mx-auto mt-20 px-4">
            <h1 class="text-3xl font-bold text-gray-800 text-center">DAFTAR <span class="text-orange-500">CAMPAIGN</span></h1>
            <p class="text-gray-600 text-center mb-4">Pilih dan salurkan donasi untuk program yang berarti bagi Anda dan mereka</p>
            
            <!-- Container for Campaign Cards -->
            <div id="campaignList" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
            <!-- Pagination Navigation -->
            <div class="flex justify-center items-center mt-6 space-x-4">
                <button id="prevPage" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed" disabled>Prev</button>
                <button id="nextPage" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed">Next</button>
            </div>
        </main>
        @include('components.footer')
    </div>
        @include('components.bottomNav')


    <!-- Include the JavaScript file -->
    <script src="{{ asset('js/campaigns.js') }}"></script>
</body>
</html>
