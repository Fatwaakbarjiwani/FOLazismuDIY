<!-- Tambahkan CDN SweetAlert2 -->

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Modal -->
    <div id="registerModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex z-50 justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 w-11/12 max-w-md">
            <!-- Modal Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">Daftar</h2>
                <button onclick="closeRegisterModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
            </div>
            <!-- Modal Body -->
            <div class="mt-4">
                <label for="name1" class="block text-gray-600 text-sm">Nama</label>
                <input id="name1" type="tel"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Masukkan nama anda" />
            </div>
            <div class="mt-4">
                <label for="phoneNumber1" class="block text-gray-600 text-sm">Nomor Telepon</label>
                <input id="phoneNumber1" type="tel"
                    class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    placeholder="Masukkan nomor telepon" />
            </div>
            <!-- Modal Footer -->
            <div class="mt-4 flex justify-end space-x-2">
                <button onclick="closeRegisterModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-4 py-2 rounded">Batal</button>
                <button onclick="submitRegister()"
                    class="bg-orange-500 hover:bg-orange-600 text-white px-4 py-2 rounded">Daftar</button>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk menutup modal
        function closeRegisterModal() {
            document.getElementById('registerModal').classList.add('hidden');
        }

        // Fungsi untuk login dan menampilkan notifikasi
        async function submitRegister() {
            const phoneNumber = document.getElementById('phoneNumber1').value.trim();
            const name = document.getElementById('name1').value.trim();

            if (!phoneNumber) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor telepon kosong!',
                    text: 'Harap masukkan nomor telepon Anda.',
                });
                return;
            }
            if (!name) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Nama kosong!',
                    text: 'Harap masukkan nama Anda.',
                });
                return;
            }

            try {
                const response = await fetch(
                    `${apiUrl}/register`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            name: name,
                            phone_number: phoneNumber,
                        }),
                    }
                );

                const data = await response.json();


                if (response.ok) {

                    // Tampilkan notifikasi sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Register berhasil!',
                        text: 'Anda berhasil mendaftar.',
                    }).then(() => {
                        // Tutup modal setelah sukses
                        closeRegisterModal();
                        const modal = document.getElementById('loginModal');
                        modal.classList.remove('hidden');
                    });
                } else {
                    // Tampilkan notifikasi error dari server
                    Swal.fire({
                        icon: 'error',
                        title: 'Register gagal!',
                        text: data.message || 'Terjadi kesalahan, coba lagi.',
                    });
                }
            } catch (error) {
                // Tampilkan notifikasi error jaringan
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi kesalahan!',
                    text: error.message,
                });
            }
        }
    </script>
</body>
