<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Payment Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .progress-bar {
            transition: width 0.5s ease;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-1/2 bg-white shadow-lg rounded-lg">
        <div class="bg-white p-6">
            <div class="flex items-center justify-between mb-4">
                <a href="campaign">
                    <i class="fas fa-chevron-left text-orange-500"></i>
                </a>
                <h1 class="text-2xl font-bold text-gray-800">Form Pembayaran</h1>
                <i class="fas fa-bars text-gray-500"></i>
            </div>

            <!-- Payment Method Selection -->
            <h2 class="text-lg font-semibold">Pilih Metode Pembayaran</h2>
            <div class="flex items-center mt-4 p-4 border rounded-lg">
                <img alt="QRIS logo" class="w-12 h-12 mr-4" src="https://storage.googleapis.com/a1aa/image/21SOJpytvRZcHlPNeQ27pyX38HOIKhBkzAXRYpOiyhuGmF3JA.jpg"/>
                <div>
                    <h3 class="font-semibold">Pembayaran QR</h3>
                    <p class="text-sm text-gray-600">Bayar dengan aplikasi pembayaran pilihan Anda</p>
                </div>
            </div>

            <!-- Payment Form -->
            <h2 class="text-lg font-semibold mt-6">Lengkapi Form Dibawah</h2>
            <form class="mt-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Nama</label>
                    <input class="w-full px-3 py-2 border rounded-lg" placeholder="Nama" type="text"/>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nomor Handphone</label>
                    <input class="w-full px-3 py-2 border rounded-lg" placeholder="Nomor Handphone" type="text"/>
                </div>
                <div class="mb-4 flex items-center">
                    <input class="mr-2" id="anonymous" type="checkbox"/>
                    <label class="text-gray-700" for="anonymous">Sembunyikan nama saya (donasi sebagai hamba Allah)</label>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Pesan Anda</label>
                    <textarea class="w-full px-3 py-2 border rounded-lg" placeholder="Pesan Anda..."></textarea>
                </div>
                <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors" type="submit">Lanjutkan Pembayaran</button>
            </form>
        </div>
    </div>
</body>
</html>
  