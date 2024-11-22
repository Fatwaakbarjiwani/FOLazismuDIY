<?php
use Illuminate\Support\Facades\Session;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 shadow-2xl rounded-lg w-[400px]">
        <h1 class="text-2xl font-extrabold text-orange-600 mb-6 text-center">
            Pembayaran QRIS
        </h1>
        <div class="space-y-6">
            <?php 
                $nominal = Session::get('nominalDonatur');
                $idDonasi = Session::get('idDonasi');
                $nama = Session::get('namaDonatur');

                function displayDetail($label, $value, $isNominal = false, $emptyMessage = 'Data belum diatur') {
                    if ($value) {
                        if ($isNominal) {
                            echo "<div class='flex justify-between items-center'>
                                    <div class='text-lg font-semibold text-gray-700'>{$label}</div>
                                    <div class='text-xl text-green-600 font-bold'>{$value}</div>
                                  </div>";
                        } else {
                            echo "<div class='flex justify-between items-center'>
                                    <div class='text-lg font-semibold text-gray-700'>{$label}</div>
                                    <div class='text-lg text-gray-800'>{$value}</div>
                                  </div>";
                        }
                    } else {
                        echo "<div class='flex justify-between items-center'>
                                <div class='text-lg font-semibold text-gray-700'>{$label}</div>
                                <div class='text-sm text-red-500'>{$emptyMessage}</div>
                              </div>";
                    }
                }

                displayDetail('Nama Donatur', $nama);
                displayDetail('Nominal Donasi', $nominal ? 'Rp ' . number_format($nominal, 0, ',', '.') : null, true);
            ?>
        </div>

        <!-- Section QR Code -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 text-center mb-4">Scan QR Code</h2>
            <div id="qrcode" class="flex justify-center">
                <canvas id="qrisCanvas" class="w-48 h-48 rounded-lg shadow-lg bg-gray-100"></canvas>
            </div>
            <p id="errorMessage" class="mt-4 text-sm text-center text-red-500 hidden">QR Code gagal dihasilkan.</p>
        </div>

        <!-- Informasi tambahan -->
        <div class="mt-6 text-center space-y-4">
            <p class="text-sm text-gray-500">
                Silakan gunakan aplikasi pembayaran seperti <span class="text-blue-500 font-semibold">OVO</span>, 
                <span class="text-blue-500 font-semibold">Gopay</span>, atau <span class="text-blue-500 font-semibold">Dana</span> untuk memindai kode QRIS.
            </p>
            <p class="text-sm text-gray-500">
                Pastikan jumlah yang Anda masukkan sesuai dengan <span class="text-orange-500 font-semibold">Nominal Donasi</span>.
            </p>
        </div>

        <!-- Tombol aksi -->
        <div class="mt-6 flex justify-center gap-4">
            <a href="/formPembayaran" class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                Kembali
            </a>
            <a href="/confirm-payment" class="px-6 py-2 bg-green-500 text-white rounded-lg shadow-md hover:bg-green-600 transition duration-300">
                Konfirmasi Pembayaran
            </a>
        </div>
        <p class="mt-4 text-sm text-gray-500 text-center">
            Jika pembayaran telah selesai, klik tombol <span class="text-green-500 font-semibold">Konfirmasi Pembayaran</span> untuk melanjutkan.
        </p>
    </div>
</body>
<script>
    const createdTime = localStorage.getItem('Ct');
    const apiUrl = `http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/generate-qris?createdTime=${createdTime}`;

    async function fetchQrData() {
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

    // Panggil fungsi fetch
    fetchQrData();
</script>
</html>
