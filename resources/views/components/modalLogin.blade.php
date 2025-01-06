<!-- Tambahkan CDN SweetAlert2 -->

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Modal -->
    <div id="loginModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex z-50 justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 w-11/12 max-w-md">
            <!-- Modal Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">Masuk</h2>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="mt-4">
                <label for="phoneNumber" class="block text-gray-600 text-sm">Nomor Telepon</label>
                <input id="phoneNumber" type="tel"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Masukkan nomor telepon" />
            </div>
            <!-- Modal Footer -->
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Batal</button>
                <button onclick="submitPhoneNumber()"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">Masuk</button>
            </div>
        </div>
    </div>

    <script>
        const apiUrl = "{{ env('API_URL') }}";

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        // Fungsi untuk membuka modal (optional, jika diperlukan)
        function openModal() {
            document.getElementById('loginModal').classList.remove('hidden');
        }

        // Fungsi untuk login dan menampilkan notifikasi
        async function submitPhoneNumber() {
            const phoneNumber = document.getElementById('phoneNumber').value.trim();

            if (!phoneNumber) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor telepon kosong!',
                    text: 'Harap masukkan nomor telepon Anda.',
                });
                return;
            }
            try {
                const response = await fetch(
                    `${apiUrl}/login`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            phone_number: phoneNumber,
                        }),
                    }
                );

                const data = await response.json();

                if (response.ok) {
                    // Simpan token ke localStorage
                    localStorage.setItem("TK", data.token);

                    // Tampilkan notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Login berhasil!',
                        text: 'Anda berhasil masuk.',
                    }).then(() => {
                        // Tutup modal setelah sukses
                        closeModal();
                        window.location.reload()
                    });
                } else {
                    // Tampilkan notifikasi error dari server
                    Swal.fire({
                        icon: 'error',
                        title: 'Login gagal!',
                        text: data.message || 'Terjadi kesalahan, coba lagi.',
                    });
                }
            } catch (error) {
                // Tampilkan notifikasi error jaringan
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text: 'Gagal menghubungi server. Periksa koneksi Anda.',
                });
            }
        }
    </script>
</body>
