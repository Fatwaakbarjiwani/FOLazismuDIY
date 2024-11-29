<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Payment Page</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <div class="w-full min-h-screen md:max-w-md bg-white shadow-lg rounded-lg">
        <div class="bg-white p-6">
            <div class="flex items-center justify-between mb-4">
                <a href="campaign">
                    <i class="fas fa-chevron-left text-orange-500"></i>
                </a>
                <h1 class="text-lg md:text-2xl font-bold text-gray-800">Form Pembayaran</h1>
                <i class="fas fa-bars text-gray-500"></i>
            </div>

            <!-- Payment Method Selection -->
            <h2 class="text-base md:text-lg font-semibold">Pilih Metode Pembayaran</h2>
            <div class="flex items-center mt-4 p-4 border rounded-lg">
                <img alt="QRIS logo" class="w-10 h-10 md:w-12 md:h-12 mr-4" src="https://storage.googleapis.com/a1aa/image/21SOJpytvRZcHlPNeQ27pyX38HOIKhBkzAXRYpOiyhuGmF3JA.jpg"/>
                <div>
                    <h3 class="text-sm md:font-semibold">Pembayaran QR</h3>
                    <p class="text-xs md:text-sm text-gray-600">Bayar dengan aplikasi pembayaran pilihan Anda</p>
                </div>
            </div>
            
            <div class="mt-4 text-sm md:text-lg font-semibold">
                Nominal Donasi: <span id="nominalDonasi">Rp 0</span>
            </div>
            
            <!-- Payment Form -->
            <h2 class="text-base md:text-lg font-semibold mt-6">Lengkapi Form Dibawah</h2>
            <form id="paymentForm" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm md:text-gray-700">Nama</label>
                    <input id="namaDonatur" name="namaDonatur" class="w-full px-3 py-2 border rounded-lg text-sm md:text-base" placeholder="Nama" type="text"/>
                </div>
                <div>
                    <label class="block text-sm md:text-gray-700">Nomor Handphone</label>
                    <input id="noHp" name="noHp" class="w-full px-3 py-2 border rounded-lg text-sm md:text-base" placeholder="Nomor Handphone" type="text"/>
                </div>
                <div class="flex items-center">
                    <input class="mr-2" id="anonymous" name="anonymous" type="checkbox" onclick="toggleAnonymous()"/>
                    <label class="text-sm md:text-gray-700" for="anonymous">Sembunyikan nama saya (donasi sebagai hamba Allah)</label>
                </div>
                <div>
                    <label class="block text-sm md:text-gray-700">Pesan Anda</label>
                    <textarea id="pesan" name="pesan" class="w-full px-3 py-2 border rounded-lg text-sm md:text-base" placeholder="Pesan Anda..."></textarea>
                </div>
                <button class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors text-sm md:text-base" type="submit">
                    Lanjutkan Pembayaran
                </button>
            </form>
        </div>
    </div>

<script>
    // Load nominal from localStorage
    document.addEventListener('DOMContentLoaded', () => {
        const nominal = localStorage.getItem('nominal') || 0; // Default to 0 if not found
        document.getElementById('nominalDonasi').innerText = `Rp ${parseInt(nominal).toLocaleString('id-ID')}`;
    });

    // Toggle anonymous checkbox function
    function toggleAnonymous() {
        const checkbox = document.getElementById('anonymous');
        const namaDonatur = document.getElementById('namaDonatur');

        if (checkbox.checked) {
            namaDonatur.value = 'Hamba Allah';
            namaDonatur.readOnly = true;
        } else {
            namaDonatur.value = '';
            namaDonatur.readOnly = false;
        }
    }

    // Function to send POST request with form data
    function sendRequest(event) {
        event.preventDefault(); // Prevent default form submission

        const namaDonatur = document.getElementById('namaDonatur').value; // Get donor name
        const noHp = document.getElementById('noHp').value; // Get phone number
        const pesan = document.getElementById('pesan').value; // Get message
        const campaignId = localStorage.getItem('campaignId'); // Get campaign ID from localStorage
        const nominal = localStorage.getItem('nominal'); // Get nominal from localStorage

        if (!campaignId) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Campaign ID not found in localStorage!',
            });
            return;
        }

        // Validate input fields
        if (!namaDonatur || !noHp || !pesan) {
            Swal.fire({
                icon: 'warning',
                title: 'Kolom Belum Lengkap',
                text: 'Harap lengkapi semua kolom sebelum melanjutkan.',
            });
            return;
        }

        // Simpan data ke localStorage
        localStorage.setItem('namaDonatur', namaDonatur);
        localStorage.setItem('noHp', noHp);
        localStorage.setItem('pesan', pesan);

        const data = {
            amount: nominal,
            username: namaDonatur,
            phone_number: noHp,
            message: pesan
        };

        // Fetch request
        fetch(`http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/billing/create/campaign/${campaignId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Add CSRF token to headers
            },
            body: JSON.stringify(data) // Convert form data to JSON
        })
        .then(response => response.json()) // Parse the response as JSON
        .then(data => {
            console.log('Success:', data);
            localStorage.setItem('Ct', data.created_time); // Simpan waktu transaksi ke localStorage

            // Tampilkan pesan sukses dengan SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Lanjutkan Pembayaran!',
                text: 'Silakan lanjutkan ke halaman QRIS.',
                showConfirmButton: false,
                timer: 2000,
            }).then(() => {
                window.location.href = 'qris'; // Redirect setelah sukses
            });
        })
        .catch((error) => {
            console.error('Error:', error);

            // Tampilkan pesan error dengan SweetAlert
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Mohon coba lagi atau hubungi dukungan.',
            });
        });
    }

    // Attach form submission event listener
    document.getElementById('paymentForm').addEventListener('submit', sendRequest);
</script>

</body>
</html>
