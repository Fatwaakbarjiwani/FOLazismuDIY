<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Lazismu - Donation Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center">
    <div id="dashboardContent" class="w-full md:w-[500px] bg-white shadow-md">
        @include('components.header')
        @include('components.wa')

        <div class="bg-white min-h-screen mt-16 p-4">
            <!-- Teks Selamat Datang -->
            <div id="greeting" class="text-center mb-6">
                <!-- Nama pengguna dan ikon akan dimuat dengan JavaScript -->
            </div>

            <h1 class="text-gray-600 font-semibold text-2xl mb-4">SUMMARY <span class="text-orange-600">DONATUR</span>
            </h1>

            <!-- Summary Donatur -->
            <div id="summary" class="grid grid-cols-1 gap-4">
                <!-- Data Summary akan dimuat dengan JavaScript -->
            </div>

            <!-- Transaksi Donatur -->
            <h1 class="text-gray-600 font-semibold text-2xl mt-8 mb-4">TRANSAKSI <span
                    class="text-orange-600">DONATUR</span></h1>
            <div id="transaction" class="space-y-4">
                <!-- Data Transaksi akan dimuat dengan JavaScript -->
            </div>
        </div>

        @include('components.footer')
        @include('components.bottomNav')
    </div>

    <script>
        const apiUrl = "{{ env('API_URL') }}"; // URL API dari environment
        const summaryContainer = document.getElementById("summary");
        const transactionContainer = document.getElementById("transaction");
        const greetingContainer = document.getElementById("greeting");

        function loadGreeting() {
            const userName = localStorage.getItem("nm") || "Pengguna"; // Ambil nama dari localStorage
            greetingContainer.innerHTML = `
        <h1 class="text-gray-600 font-semibold text-2xl flex items-end justify-start">
            HI, <span class="text-orange-600 ml-2">${userName.toUpperCase()}</span>
            <i class="fas fa-smile-beam text-orange-500 text-3xl ml-2"></i>
        </h1>
        <p class="text-gray-500 text-sm text-left">
            Selamat datang di halaman profil Anda!
        </p>
    `;
        }

        // Fungsi untuk mendapatkan data summary
        // Fungsi untuk mendapatkan data summary
        async function getSummary() {
            try {
                const token = localStorage.getItem("TK");
                if (!token) {
                    summaryContainer.innerHTML =
                        `<div class="bg-red-100 text-red-700 p-4 rounded-md shadow text-center">
                    <p class="font-medium">Anda belum login.</p>
                    <p>Silakan login untuk melihat riwayat transaksi Anda.</p>
                </div>`;
                    return;
                }

                const response = await fetch(`${apiUrl}/transactions-donatur/summary`, {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();

                // Render data summary sebagai kotak-kotak dengan ikon
                summaryContainer.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-orange-100 p-4 rounded-lg shadow flex items-center">
                    <div class="bg-orange-500 text-white p-2 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-hand-holding-heart text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-semibold">Total Kampanye</p>
                        <p class="text-xl font-bold text-gray-800">Rp ${data.total_campaign.toLocaleString()}</p>
                    </div>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow flex items-center">
                    <div class="bg-green-500 text-white p-2 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-praying-hands text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-semibold">Total Zakat</p>
                        <p class="text-xl font-bold text-gray-800">Rp ${data.total_zakat.toLocaleString()}</p>
                    </div>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg shadow flex items-center">
                    <div class="bg-blue-500 text-white p-2 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-hand-holding-usd text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-semibold">Total Infak</p>
                        <p class="text-xl font-bold text-gray-800">Rp ${data.total_infak.toLocaleString()}</p>
                    </div>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg shadow flex items-center">
                    <div class="bg-gray-500 text-white p-2 rounded-full w-12 h-12 flex items-center justify-center">
                        <i class="fas fa-donate text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm text-gray-600 font-semibold">Total Transaksi</p>
                        <p class="text-xl font-bold text-gray-800">Rp ${data.total_all.toLocaleString()}</p>
                    </div>
                </div>
            </div>
        `;
            } catch (error) {
                // console.error("Error fetching summary data:", error);
                getSummary();
                summaryContainer.innerHTML =
                    `<div class="bg-red-100 text-red-700 p-4 rounded-md shadow text-center">
                <p class="font-medium">Terjadi kesalahan saat memuat data transaksi.</p>
                <p>Silakan coba lagi nanti.</p>
            </div>`;
            }
        }



        // Fungsi untuk mendapatkan data riwayat transaksi
        async function getTransactionHistory() {
            try {
                const token = localStorage.getItem("TK");
                if (!token) {
                    transactionContainer.innerHTML = `
                <div class="bg-red-100 text-red-700 p-4 rounded-md shadow text-center">
                    <p class="font-medium">Anda belum login.</p>
                    <p>Silakan login untuk melihat riwayat transaksi Anda.</p>
                </div>`;
                    return;
                }

                const response = await fetch(`${apiUrl}/transactions-donatur`, {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }

                const data = await response.json();

                // Jika tidak ada transaksi
                if (data.length === 0) {
                    transactionContainer.innerHTML = `
                <div class="bg-gray-100 text-gray-700 p-4 rounded-md shadow text-center">
                    <p class="font-medium">Belum ada transaksi ditemukan.</p>
                    <p>Silakan lakukan transaksi untuk melihat riwayat di sini.</p>
                </div>`;
                    return;
                }

                // Render setiap transaksi
                transactionContainer.innerHTML = data
                    .map(transaction => `
                <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                    <div class="bg-orange-500 text-white px-4 py-2">
                        <h2 class="text-lg font-semibold">${transaction.invoice_id}</h2>
                        <p class="text-sm">Tanggal: ${new Date(transaction.transaction_date).toLocaleDateString()}</p>
                    </div>
                    <div class="p-4">
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Nomor Telepon:</strong> ${transaction.phone_number || '-'}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Nama Donatur:</strong> ${transaction.donatur}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Total Transaksi:</strong> Rp ${transaction.transaction_amount.toLocaleString()}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Pesan:</strong> ${transaction.message || '-'}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Metode Pembayaran:</strong> ${transaction.method || '-'}
                        </p>
                        <p class="text-sm text-gray-700 mb-2">
                            <strong>Kategori:</strong> ${transaction.category_name || '-'}
                        </p>
                        <p class="text-sm text-gray-700">
                            <strong>Status:</strong> 
                            <span class="${transaction.success === 1 ? 'text-green-500 font-bold' : 'text-red-500 font-bold'}">
                                ${transaction.success===1?"SUKSES":"GAGAL"}
                            </span>
                        </p>
                    </div>
                </div>
            `)
                    .join('');
            } catch (error) {
                getTransactionHistory();
                // console.error("Error fetching transaction data:", error);
                transactionContainer.innerHTML = `
            <div class="bg-red-100 text-red-700 p-4 rounded-md shadow text-center">
                <p class="font-medium">Terjadi kesalahan saat memuat data transaksi.</p>
                <p>Silakan coba lagi nanti.</p>
            </div>`;
            }
        }


        // Panggil fungsi saat halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", () => {
            getSummary();
            getTransactionHistory();
            loadGreeting();
        });
    </script>

</body>

</html>
