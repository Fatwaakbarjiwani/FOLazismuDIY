<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Lazismu - Campaign Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
     <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .progress-bar {
            transition: width 0.5s ease;
        }
        .campaign-card {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }
        .active {
            display: block;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-[40%] bg-white shadow-lg">
        @include('components.header')
        <div class="bg-white p-4 mt-20">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">DETAIL <span class="text-orange-600">CAMPAIGN</span></h1>
            <div class="flex flex-col gap-4">
                <!-- Campaign Image -->
                <img id="campaignImage" class="h-[40vh] w-full object-cover rounded-lg" alt="Campaign Image">
                <div class="flex flex-col w-full">
                    <!-- Campaign Title -->
                    <h2 id="campaignTitle" class="text-2xl font-bold text-gray-900">Campaign Title</h2>
                    <!-- Category and Location -->
                    <div class="flex justify-between items-center">
                        <p id="campaignCategory" class="text-orange-500 font-semibold mt-1">Kategori: Category</p>
                        <p id="campaignLocation" class="text-gray-600 mt-1 text-sm flex items-center">
                            <i class="fas fa-map-marker-alt mr-1"></i> Location
                        </p>
                    </div>
                    
                    <!-- Amount and Progress -->
                    <div class="mt-2">
                        <div class="flex justify-between">
                            <div class="flex justify-between gap-2 text-gray-700 text-sm">
                                <span class="font-medium">Terkumpul</span>
                                <span id="currentAmount" class="text-orange-600 font-semibold">Rp 0</span>
                            </div>
                            <div class="flex justify-between gap-2 text-gray-700 mt-2 text-sm">
                                <span class="font-medium">Target</span>
                                <span id="targetAmount" class="text-orange-600 font-semibold">Rp 0</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 mt-1">
                            <div id="progressBar" class="bg-orange-500 h-3 rounded-full progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                    <p id="endDate" class="text-gray-500 text-sm text-right mt-1">End Date</p>
                    
                    <!-- Share and Toggle Buttons -->
                    <div class="flex flex-wrap items-center gap-2 lg:gap-3 mt-2">
                        <p class="text-gray-600">Bagikan Campaign</p>
                        <button onclick="handleShareLink()" class="text-sm lg:text-lg items-center hover:scale-110 flex gap-2 border-2 border-primary px-1 rounded-lg font-semibold text-primary">
                            Share <i class="fas fa-share-alt"></i>
                        </button>
                    </div>
                    
                    <!-- Donation Button -->
                  <!-- Donation Button -->
<a href="#" id="donateButtonLink" class="w-full">
    <button id="donateButton" class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors mt-4">Mulai Donasi</button>
</a>

                </div>
                <div class="w-full">
                    <div class="flex justify-start w-full gap-2">
                        <button onclick="showDetail('campaign')" class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Detail Campaign
                        </button>
                        <button onclick="showDetail('donatur')" class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Donatur
                        </button>
                        <button onclick="showDetail('laporan')" class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Laporan Donasi
                        </button>
                    </div>
                
                <!-- Campaign Details and Donors List -->
                <div id="campaignDetail" class="text-justify mt-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi Campaign</h3>
                    <p id="campaignDescription" class="text-gray-700">This is the campaign description.</p>
                </div>
                </div>
                
                <div id="donorList" class="hidden w-full text-left mt-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Daftar Donatur</h3>
                    <ul id="donors" class="list-disc pl-5 text-gray-700">
                        <li>Donatur 1: Rp 100,000</li>
                        <li>Donatur 2: Rp 200,000</li>
                        <!-- Additional donors can be added here dynamically -->
                    </ul>
                </div>
                <div id="laporanDonasi" class="hidden w-full text-left mt-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Laporan Donasi</h3>
                   <div class="bg-white rounded-xl p-2 flex shadow-md border border-gray-50 gap-4">
                    <img src="image/dashboard.png" class="w-1/2 rounded-xl" alt="">
                    <div class=""><p>Dana ini sudah disalurkan kepada korban bencana banjir</p>
                    <p class="font-semibold text-orange-600">Rp 20.000</p></div>
                   </div>
                </div>
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
        @include('components.footer')
    </div>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>
        function handleShareLink() {
            const url = "{{ url()->current() }}";
            const tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = url;
            tempInput.select();
            document.execCommand('copy');
            document.body.removeChild(tempInput);
            alert('Campaign link copied to clipboard!');
        }

        function showDetail(section) {
            const campaignDetail = document.getElementById('campaignDetail');
            const donorList = document.getElementById('donorList');
            const laporanList = document.getElementById('laporanDonasi');

            if (section === 'campaign') {
                campaignDetail.classList.remove('hidden');
                donorList.classList.add('hidden');
                laporanList.classList.add('hidden');
            } else if (section === 'donatur') {
                campaignDetail.classList.add('hidden');
                donorList.classList.remove('hidden');
                laporanList.classList.add('hidden');
            } else if (section === 'laporan') {
                laporanList.classList.remove('hidden');
                donorList.classList.add('hidden')
                campaignDetail.classList.add('hidden')
                
            }
        }

        // Fetch and display campaign details as before
       const urlParams = new URLSearchParams(window.location.search);
const campaignId = urlParams.get('id');

if (campaignId) {
    fetch(`http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaigns/${campaignId}`)
        .then(response => response.json())
        .then(campaign => {
            document.getElementById("campaignImage").src = campaign.campaign_thumbnail;
            document.getElementById("campaignTitle").textContent = campaign.campaign_name;
            document.getElementById("campaignCategory").textContent = `Kategori: ${campaign.category.campaign_category}`;
            document.getElementById("campaignLocation").innerHTML = `<i class="fas fa-map-marker-alt mr-1"></i> ${campaign.location}`;
            document.getElementById("currentAmount").textContent = `Rp ${campaign.current_amount.toLocaleString()}`;
            document.getElementById("targetAmount").textContent = `Rp ${campaign.target_amount.toLocaleString()}`;
            document.getElementById("endDate").textContent = `End Date: ${new Date(campaign.end_date).toLocaleDateString()}`;
            document.getElementById("campaignDescription").textContent = campaign.description;

            const progress = (campaign.current_amount / campaign.target_amount) * 100;
            document.getElementById("progressBar").style.width = `${progress}%`;

            // Set the donation link with the campaign ID
            document.getElementById("donateButtonLink").href = `pembayaran?id=${campaignId}`;
        })
        .catch(error => console.error("Error fetching campaign data:", error));
}
    </script>
</body>
</html>
