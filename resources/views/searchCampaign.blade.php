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
    <title>Search Campaign</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
</head>

<body class="font-roboto bg-gray-100 flex justify-center">
    @include('components.header')
    
    <div class="w-full sm:w-[500px] bg-white min-h-screen py-4 shadow my-14">
        @include('components.wa')
        <header class="text-center py-2">
            <h1 class="text-3xl font-bold text-gray-800">SEARCH <span class="text-orange-500">CAMPAIGNS</span></h1>
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
    {{-- <script>
        const apiUrl = "{{ env('API_URL') }}";
    </script> --}}
    <script src="{{ asset('js/searchCampaign.js') }}"></script>
</body>

</html>
