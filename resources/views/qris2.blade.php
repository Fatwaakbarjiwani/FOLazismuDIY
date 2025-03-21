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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
    <link rel="icon" type="image/svg+xml" href="image/logoOrange.png" />

</head>

<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex justify-center items-center min-h-screen" id="halamanQris">
    <div class="bg-white p-8 shadow-2xl rounded-lg w-full sm:max-w-md h-screen sm:h-auto">
        <h1 class="text-xl md:text-2xl font-extrabold text-orange-600 mb-6 text-center">
            Pembayaran QRIS
        </h1>
        <!-- <div id="donationDetails" class="space-y-6"></div> -->

        <!-- Section QR Code -->
        <div class="mt-6">
            <h2 class="text-lg md:text-xl font-semibold text-gray-700 text-center mb-4">Scan QR Code</h2>
            <div id="qrcode" class="flex justify-center">
                <canvas id="qrisCanvas" class="w-40 h-40 md:w-48 md:h-48 rounded-lg shadow-lg bg-gray-100"></canvas>
            </div>
            <p id="errorMessage" class="mt-4 text-sm text-center text-red-500 hidden">QR Code gagal dihasilkan.</p>
        </div>

        <!-- Informasi tambahan -->
        <div class="mt-6 text-center space-y-4">
            <p class="text-sm md:text-base text-gray-500">
                Silakan gunakan aplikasi pembayaran seperti <span class="text-blue-500 font-semibold">OVO</span>,
                <span class="text-blue-500 font-semibold">Gopay</span>, atau <span
                    class="text-blue-500 font-semibold">Dana</span> untuk memindai kode QRIS.
            </p>
            <p class="text-sm md:text-base text-gray-500">
                Pastikan jumlah yang Anda masukkan sesuai dengan <span class="text-orange-500 font-semibold">Nominal
                    Donasi</span>.
            </p>
        </div>

        <!-- Tombol aksi -->
        <div class="mt-6 flex flex-wrap justify-center gap-4">
            {{-- <a href="formPembayaran_ziska" class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 transition duration-300 text-sm md:text-base">
                Kembali
            </a> --}}
            <!-- Tombol Download dengan background gradasi orange -->
            <button id="downloadQrCodeWithDetails"
                class="px-6 py-2 w-full bg-blue-500 text-white rounded-lg shadow-xl hover:from-orange-300 hover:to-orange-500 transition duration-300 text-sm md:text-base transform hover:scale-105">
                Download QR Code
            </button>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-6 mt-4 max-w-lg w-full">
            <h2 class="text-lg font-semibold mb-4">📌 Tutorial Pembayaran :</h2>
            <ul class="space-y-4">
                <li class="flex items-center space-x-3 p-3 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    <span class="text-blue-500 text-xl"><i class="fas fa-download"></i></span>
                    <p class="text-gray-700">Unduh QRIS di halaman Pembayaran</p>
                </li>
                <li class="flex items-center space-x-3 p-3 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    <span class="text-blue-500 text-xl"><i class="fas fa-wallet"></i></span>
                    <p class="text-gray-700">Buka aplikasi dompet digital atau mobile banking favorit sobat.</p>
                </li>
                <li class="flex items-center space-x-3 p-3 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    <span class="text-blue-500 text-xl"><i class="fas fa-qrcode"></i></span>
                    <p class="text-gray-700">Pindai / Unggah QRIS di Aplikasi MBanking atau Dompet Digital</p>
                </li>
                <li class="flex items-center space-x-3 p-3 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                    <span class="text-blue-500 text-xl"><i class="fas fa-check-circle"></i></span>
                    <p class="text-gray-700">Selesai! Sobat akan menerima notifikasi pembayaran melalui WhatsApp</p>
                </li>
            </ul>
        </div>
        {{-- <p class="mt-4 text-sm md:text-base text-gray-500 text-center">
            Jika pembayaran telah selesai, klik tombol <span class="text-green-500 font-semibold">Konfirmasi Pembayaran</span> untuk melanjutkan.
        </p> --}}
    </div>
</body>
<script>
    const url = "{{ env('API_URL') }}";
</script>
<script>
    // Fungsi untuk memuat data dari localStorage
    const nama = localStorage.getItem('namaDonatur') || 'Nama belum diatur';
    const nominal = localStorage.getItem('nominal') || null;
    const idDonasi = localStorage.getItem('campaignId') || 'ID Donasi belum diatur';

    function loadDonationDetails() {

        // Format nominal
        const formattedNominal = nominal ?
            `Rp ${parseInt(nominal, 10).toLocaleString('id-ID')}` :
            'Nominal belum diatur';

        // Render detail ke dalam elemen HTML
        // document.getElementById('donationDetails').innerHTML = `
        //     <div class="flex justify-between items-center">
        //         <div class="text-sm md:text-lg font-semibold text-gray-700">Nama Donatur</div>
        //         <div class="text-sm md:text-lg text-gray-800">${nama}</div>
        //     </div>
        //     <div class="flex justify-between items-center">
        //         <div class="text-sm md:text-lg font-semibold text-gray-700">Nominal Donasi</div>
        //         <div class="text-sm md:text-xl text-green-600 font-bold">${formattedNominal}</div>
        //     </div>
        //     <div class="flex justify-between items-center">
        //         <div class="text-sm md:text-lg font-semibold text-gray-700">ID Donasi</div>
        //         <div class="text-sm md:text-lg text-gray-800">${idDonasi}</div>
        //     </div>
        // `;
    }

    // Fungsi untuk mengambil data QRIS
    async function fetchQrData() {
        const createdTime = localStorage.getItem('Ct'); // Ganti dengan kunci yang sesuai jika berbeda
        const apiUrl = `${url}/generate-qris?createdTime=${createdTime}`;

        try {
            const response = await fetch(apiUrl);
            if (!response.ok) throw new Error('Gagal mengambil data QRIS');
            const data = await response.json();

            // Ambil data QRIS
            const rawQrData = data?.transactionDetail?.rawQrData;
            if (!rawQrData) throw new Error('Data QRIS tidak ditemukan');

            // Generate QR code
            const qr = new QRious({
                element: document.getElementById('qrisCanvas'),
                value: rawQrData,
                size: 200,
            });
        } catch (error) {
            console.error(error.message);
            document.getElementById('errorMessage').classList.remove('hidden');
        }
    }

    // Panggil fungsi
    loadDonationDetails();
    fetchQrData();
</script>
<script>
    // Fungsi untuk membuat QRIS dan menggabungkannya dengan detail pembayaran
    function generateQrWithDetails() {
        const canvas = document.createElement('canvas');
        const context = canvas.getContext('2d');

        // Set ukuran canvas
        canvas.width = 400; // Lebar
        canvas.height = 550; // Tinggi

        // Background gradasi
        const gradient = context.createLinearGradient(0, 0, 0, canvas.height);
        gradient.addColorStop(0, '#ff7e5f');
        gradient.addColorStop(1, '#feb47b');
        context.fillStyle = gradient;
        context.fillRect(0, 0, canvas.width, canvas.height);

        // Menambahkan Judul
        context.fillStyle = '#ffffff';
        context.font = 'bold 24px Arial';
        context.textAlign = 'center';
        context.fillText('Pembayaran QRIS', canvas.width / 2, 50);

        // Menambahkan Detail Pembayaran
        context.font = '16px Arial';
        context.fillText('Silakan scan QR Code untuk membayar', canvas.width / 2, 100);
        context.font = 'bold 16px Arial';
        context.fillText('QRCODE', canvas.width / 2, 130);

        // Menambahkan QR Code
        const qrCanvas = document.getElementById('qrisCanvas');
        if (qrCanvas) {
            context.drawImage(qrCanvas, canvas.width / 2 - 100, 150, 200, 200);
        }

        // Menambahkan Pesan Tambahan
        context.font = '14px Arial';
        context.fillText(
            'Gunakan aplikasi OVO, Gopay, atau Dana',
            canvas.width / 2,
            380
        );
        context.fillText(
            'Pastikan jumlah sesuai dengan nominal.',
            canvas.width / 2,
            410
        );

        return canvas;
    }

    // Fungsi untuk mengunduh gambar QR Code dengan detail
    document.getElementById('downloadQrCodeWithDetails').addEventListener('click', function() {
        const canvas = generateQrWithDetails();
        const link = document.createElement('a');
        link.download = 'qris-detail.png'; // Nama file unduhan
        link.href = canvas.toDataURL(); // Mengambil data URL gambar dari canvas
        link.click(); // Memicu unduhan
    });

    // Generate QRIS saat halaman dimuat
    window.onload = function() {
        const qr = new QRious({
            element: document.getElementById('qrisCanvas'),
            value: 'https://example.com/payment/qr?amount=100000&receiver=XYZ',
            size: 200,
        });
    };
</script>

</html>
