<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donation Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 flex justify-center ">
  @include('components.header')
  <div class="w-1/2 bg-white mt-16 p-4 shadow">
    <div class="flex items-center justify-between">
      <a href="campaign">
        <i class="fas fa-chevron-left text-orange-500"></i>
      </a>
        <h1 class="text-lg font-semibold">Jelajahi Campaign</h1>
      <i class="fas fa-bars text-gray-500"></i>
    </div>

    <div class="mt-4">
      <img id="campaignImage" alt="Campaign banner" class="w-full h-64 object-cover rounded-lg" />
      <div class="mt-4 p-4 bg-gray-100 rounded-lg">
        <h2 class="text-lg font-semibold">Anda akan berdonasi untuk campaign</h2>
        <p id="campaignName" class="text-gray-500"></p>
      </div>
    </div>

    <div class="mt-4">
      <h3 class="text-lg font-semibold">Nominal</h3>
      <p class="text-gray-500">Pilih Nominal Donasi Anda Sebesar</p>
      <div class="grid grid-cols-2 gap-4 mt-2">
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(5000)">Rp 5.000</button>
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(10000)">Rp 10.000</button>
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(50000)">Rp 50.000</button>
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(100000)">Rp 100.000</button>
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(500000)">Rp 500.000</button>
        <button class="bg-gray-100 py-2 rounded-lg" onclick="setNominal(1000000)">Rp 1.000.000</button>
      </div>
    </div>

    <div class="mt-4">
      <h3 class="text-lg font-semibold">Jumlah</h3>
      <p class="text-gray-500">Atau Masukkan Sendiri Jumlah Yang Anda Inginkan</p>
      <div class="flex items-center mt-2">
        <span class="bg-gray-100 py-2 px-4 rounded-l-lg">Rp</span>
        <input id="nominalInput" class="w-full py-2 px-4 border border-gray-300 rounded-r-lg" placeholder="0" type="text" />
      </div>
      <p class="text-green-500 mt-2">Harap Periksa Kembali Jumlah Donasi Yang Anda Inginkan</p>
    </div>

    <a href="formPembayaran">
      <button class="w-full bg-orange-500 text-white py-2 rounded-lg mt-4">Lanjut Pembayaran</button>
    </a>

  </div>

  <script>
    async function fetchCampaignData() {
      const urlParams = new URLSearchParams(window.location.search);
      const campaignId = urlParams.get('id');
      const apiEndpoint = `http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaigns/${campaignId}`;

      try {
        const response = await fetch(apiEndpoint);
        if (!response.ok) throw new Error('Campaign data not found');
        
        const data = await response.json();
        document.getElementById('campaignName').innerText = data.campaign_name || "Nama Campaign";
        document.getElementById('campaignImage').src = data.campaign_thumbnail || "default-image.jpg";
      } catch (error) {
        console.error("Error fetching campaign data:", error);
      }
    }

    function formatRupiah(number) {
      return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function setNominal(amount) {
      document.getElementById('nominalInput').value = formatRupiah(amount);
    }

    // Load campaign data on page load
    window.onload = fetchCampaignData;
  </script>
</body>
</html>
