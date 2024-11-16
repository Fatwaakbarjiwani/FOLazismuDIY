<headers>
        <div class="container fixed top-0 z-50 gap-2 h-16 bg-white w-[40%] shadow flex items-center justify-between items-center py-2 px-4">
            <div class="flex items-center w-2/12">
                <a href="dashboard">
                    <img alt="Lazismu Logo" class="h-8" src="{{ asset('image/Logo-Lazismu-Kota-Yogyakarta-2-1024x709.png') }}" width="50"/>
                </a>
            </div>
            <div class="w-10/12">
                <div class="relative">
                    <input  onkeydown="handleSearch(event)"  id="searchInput" class="w-full py-2 px-4 rounded-full shadow border border-gray-100 focus:outline-none" placeholder="Cari Campaign" type="text"/>
                    <i class="fas fa-search absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-400"></i>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <a class="text-gray-600 hover:text-orange-500" href="#">Masuk</a>
                <a class="bg-orange-500 text-white px-4 py-2 rounded" href="#">Daftar</a>
            </div>
        </div>
</headers>
    <script src="{{ asset('js/dashboard.js') }}"></script>
