<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Search Campaign</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body class="font-roboto bg-gray-100 flex justify-center">
    @include('components.header')
    @include('components.wa')

    <div class="w-full sm:w-[500px] bg-white min-h-screen py-4 shadow my-14">
        <button onclick="window.location.href='dashboard'"
            class="flex items-center font-semibold text-gray-800 py-2 px-4 rounded p-4">
            <i class="fas fa-arrow-left mr-2"></i> Back to Dashboard
        </button>
        <header class="text-center py-2">
            <h1 class="text-3xl font-bold text-gray-800">Search <span class="text-orange-500">Campaigns</span></h1>
            <p class="text-gray-600 mb-4">Find campaigns that matter to you</p>
        </header>

        <main class="container mx-auto px-4">
            <!-- Container for Campaign Cards -->
            <div id="campaignList" class="grid grid-cols-1 sm:grid-cols-2 gap-4"></div>

            <!-- Pagination Navigation -->
            <div class="flex justify-center items-center mt-6 space-x-4">
                <button id="prevPage"
                    class="bg-orange-500 text-orange-600 px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                    disabled>Prev</button>
                <button id="nextPage"
                    class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed">Next</button>
            </div>
        </main>
    </div>
    @include('components.bottomNav')
    <!-- JavaScript for Fetching Campaigns -->
    <script>
        const apiUrl = "{{ env('API_URL') }}";
    </script>
    <script src="{{ asset('js/searchCampaign.js') }}"></script>
</body>

</html>
