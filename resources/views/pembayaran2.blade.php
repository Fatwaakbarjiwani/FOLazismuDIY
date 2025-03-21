<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KWQ5Z1NW94"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KWQ5Z1NW94');
    </script>
    <meta charset="UTF-8">
    <title>Donation Page</title>
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '6779218792190886');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=6779218792190886&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/svg+xml" href="image/logoOrange.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center">
    @include('components.header')
    @include('components.wa')
    <div class="w-full sm:w-[500px] bg-white pb-4 mt-16 p-2 shadow">
        <div class="flex items-center justify-between">
            <a href="campaign">
                <i class="fas fa-chevron-left text-orange-500"></i>
            </a>
            <h1 class="text-lg font-semibold">Jelajahi Campaign</h1>
            <i class="fas fa-bars text-gray-500"></i>
        </div>

        <div class="mt-4">
            <img id="image_ziska" alt="Campaign banner" class="w-full h-auto object-content rounded-lg" />
            <div class="mt-4 p-4 bg-gray-100 rounded-lg">
                <h2 class="text-lg font-semibold">Anda akan berdonasi untuk campaign</h2>
                <p id="name" class="text-gray-500"></p>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Nominal</h3>
            <p class="text-gray-500">Pilih Nominal Donasi Anda Sebesar</p>
            <div class="grid grid-cols-2 gap-4 mt-2">
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(5000)">Rp 5.000</button>
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(10000)">Rp 10.000</button>
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(50000)">Rp 50.000</button>
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(100000)">Rp 100.000</button>
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(500000)">Rp 500.000</button>
                <button class="bg-gray-100 py-2 rounded-lg focus:bg-orange-400 focus:text-white"
                    onclick="setNominal(1000000)">Rp 1.000.000</button>
            </div>
        </div>

        <div class="mt-4">
            <h3 class="text-lg font-semibold">Jumlah</h3>
            <p class="text-gray-500">Atau Masukkan Sendiri Jumlah Yang Anda Inginkan</p>
            <div class="flex items-center mt-2">
                <span class="bg-gray-100 py-2 px-4 rounded-l-lg">Rp</span>
                <input id="nominalInput" class="w-full py-2 px-4 border border-gray-300 rounded-r-lg" placeholder="0"
                    type="text" />
            </div>
            <p class="text-green-500 mt-2">Harap Periksa Kembali Jumlah Donasi Yang Anda Inginkan</p>
        </div>

        <button onclick="saveNominalToState()" class="w-full bg-orange-500 text-white py-2 rounded-lg mt-4">
            Lanjut Pembayaran
        </button>
    </div>

    <script>
        const apiUrl = "{{ env('API_URL') }}";
    </script>
    <script>
        async function fetchCampaignData() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            const type = localStorage.getItem('type');
            const apiEndpoint = `${apiUrl}/${type}/${id}`;

            try {
                const response = await fetch(apiEndpoint);
                if (!response.ok) throw new Error('Data not found');

                const data = await response.json();
                document.getElementById('name').innerText = data.category_name || "Nama ";
                document.getElementById('image_ziska').src = data.thumbnail || "default-image.jpg";
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

        async function saveNominalToState() {
            const urlParams = new URLSearchParams(window.location.search);
            const id = urlParams.get('id');
            const nominalInput = document.getElementById('nominalInput').value.replace(/\./g, '');
            const nominal = parseInt(nominalInput, 10);

            if (isNaN(nominal) || nominal < 1000) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nominal tidak valid',
                    text: 'Nominal harus lebih dari Rp 1.000.',
                });
                return;
            }

            try {
                // Simpan data ke localStorage
                localStorage.setItem('id', id);
                localStorage.setItem('nominal', nominal);
                window.location.href = 'formPembayaran_ziska';
            } catch (error) {
                console.error('Error saving nominal:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Terjadi kesalahan saat menyimpan nominal.',
                });
            }
        }

        // Load campaign data on page load
        window.onload = fetchCampaignData;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
