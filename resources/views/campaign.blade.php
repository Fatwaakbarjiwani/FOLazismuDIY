<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KWQ5Z1NW94"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-KWQ5Z1NW94');
    </script>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Campaign List</title>
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '6779218792190886');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=6779218792190886&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet" />
</head>

<body class="font-roboto flex justify-center">
    <div class="w-full sm:w-[500px] bg-white min-h-screen sm:shadow">
        @include('components.wa')
        @include('components.header')
        <div class="container mx-auto mt-20 px-4">
            <h1 class="text-3xl font-bold text-gray-800 text-center">DAFTAR <span
                    class="text-orange-500">CAMPAIGN</span></h1>
            <p class="text-gray-600 text-center mb-4">Pilih dan salurkan donasi untuk program yang berarti bagi Anda dan
                mereka</p>
            <div class="flex mb-2 justify-between items-end">
                <h1 class="text-lg font-semibold">Pilih Kategori <span class="text-orange-600">Campaign</span></h1>
                <select id="campaignCategory" class="p-2 text-gray-600 rounded-lg" onchange="logCategoryId()">
                    <option value="">Pilih Kategori</option>
                </select>
            </div>
            <!-- Container for Campaign Cards -->
            <div id="campaignCard" class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-2"></div>
            <!-- Pagination Navigation -->
            <div class="flex justify-center items-center mt-6 space-x-4">
                <button id="prevPage"
                    class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed"
                    disabled>Prev</button>
                <button id="nextPage"
                    class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 disabled:bg-gray-300 disabled:cursor-not-allowed">Next</button>
            </div>
        </div>
        @include('components.footer')
    </div>
    @include('components.bottomNav')


    <!-- Include the JavaScript file -->
    {{-- <script>
        const apiUrl = "{{ env('API_URL') }}";
    </script> --}}
    <script src="{{ asset('js/campaigns.js') }}"></script>
</body>

</html>
