<headers>
    @include('components.modalRegister')
    @include('components.modalLogin')
    <header>
        <div
            class="container fixed top-0 z-40 gap-2 h-16 bg-white w-full sm:max-w-[500px] shadow flex items-center justify-between py-2 px-4">
            <!-- Logo -->
            <div class="flex items-center w-2/12">
                <a href="/">
                    <img alt="Lazismu Logo" class="h-10 sm:h-12" src="{{ asset('image/logoOrange.png') }}" width="50" />
                </a>
            </div>

            <!-- Search Bar -->
            <div class="w-8/12 sm:w-10/12">
                <div class="relative">
                    <input onkeydown="handleSearch(event)" id="searchInput"
                        class="w-full py-2 px-4 rounded-full shadow border border-gray-100 focus:outline-none text-sm sm:text-base"
                        placeholder="Cari Campaign" type="text" />
                    <i class="fas fa-search absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-400"></i>
                </div>
            </div>

            <!-- User Actions -->
            <div class="flex items-center space-x-2 sm:space-x-4" id="userActions">
                <a class="text-gray-600 hover:text-orange-500 text-sm sm:text-base" id="loginButton" href="#"
                    onclick="showModal()">Masuk</a>
                <a id="registerButton" onclick="showRegisterModal()"
                    class="bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base"
                    href="#">Daftar</a>
            </div>
        </div>
    </header>
</headers>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    // Show the modal
    function showModal() {
        const modal = document.getElementById('loginModal');
        modal.classList.remove('hidden');
    }

    function showRegisterModal() {
        const modal = document.getElementById('registerModal');
        modal.classList.remove('hidden');
        document.getElementById('name1').value = '';
        document.getElementById('phoneNumber1').value = '';
    }

    const token = localStorage.getItem('TK');
    if (token) {
        fetch("http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/get-me", {
                method: "GET", // Pastikan metode yang benar untuk endpoint Anda
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": `Bearer ${token}` // Sertakan token dalam header Authorization
                },
            })
            .then((response) => {
                
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then((data) => {
                localStorage.setItem("nm", data.name);
                localStorage.setItem("pn", data.phone_number);
                const userActions = document.getElementById('userActions');

                // Ganti tombol Masuk dengan nama pengguna
                const userName = document.createElement('span');
                userName.className = 'text-gray-600 text-sm sm:text-base line-clamp-2 ';
                userName.textContent = data.name || "Pengguna"; // Nama pengguna dari respons API

                // Ganti tombol Daftar dengan Logout
                const logoutButton = document.createElement('a');
                logoutButton.href = "#";
                logoutButton.className =
                    'bg-red-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base';
                logoutButton.textContent = 'Logout';
                logoutButton.onclick = function() {
                    localStorage.removeItem('TK'); // Hapus token
                    location.reload(); // Muat ulang halaman
                };

                // Bersihkan elemen lama dan tambahkan elemen baru
                userActions.innerHTML = '';
                userActions.appendChild(userName);
                userActions.appendChild(logoutButton);
            })
            .catch((error) => {
                console.error("Terjadi kesalahan:", error);
            });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
