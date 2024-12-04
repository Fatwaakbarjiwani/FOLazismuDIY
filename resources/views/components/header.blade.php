<headers>
@include('components.modalLogin')
<header>
    <div class="container fixed top-0 z-40 gap-2 h-16 bg-white w-full sm:max-w-[500px] shadow flex items-center justify-between py-2 px-4">
        <!-- Logo -->
        <div class="flex items-center w-2/12">
            <a href="dashboard">
                <img
                    alt="Lazismu Logo"
                    class="h-10 sm:h-12"
                    src="{{ asset('image/logoOrange.png') }}"
                    width="50"
                />
            </a>
        </div>

        <!-- Search Bar -->
        <div class="w-8/12 sm:w-10/12">
            <div class="relative">
                <input
                    onkeydown="handleSearch(event)"
                    id="searchInput"
                    class="w-full py-2 px-4 rounded-full shadow border border-gray-100 focus:outline-none text-sm sm:text-base"
                    placeholder="Cari Campaign"
                    type="text"
                />
                <i class="fas fa-search absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-400"></i>
            </div>
        </div>

        <!-- User Actions -->
        <div class="flex items-center space-x-2 sm:space-x-4">
            <a class="text-gray-600 hover:text-orange-500 text-sm sm:text-base" href="#" onclick="showModal()">Masuk</a>
            <a class="bg-orange-500 text-white px-3 py-1 sm:px-4 sm:py-2 rounded text-sm sm:text-base" href="#">Daftar</a>
        </div>
    </div>
</header>

</headers>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script>// Show the modal
function showModal() {
    const modal = document.getElementById('loginModal');
    modal.classList.remove('hidden');
}

// Hide the modal
function closeModal() {
    const modal = document.getElementById('loginModal');
    modal.classList.add('hidden');
}

// Submit phone number
function submitPhoneNumber() {
    const phoneNumber = document.getElementById('phoneNumber').value;
    if (!phoneNumber) {
        alert('Nomor telepon harus diisi!');
        return;
    }
    console.log('Nomor Telepon:', phoneNumber);
    // Lakukan sesuatu dengan nomor telepon, misalnya mengirim ke server
    closeModal();
}
</script>
