     <main class="relative top-12">
            <img alt="Children smiling and sitting together" class="w-full h-[70vh] object-cover object-center" src="{{ asset('image/dashboard.png') }}"/>
                <div class="absolute p-4 inset-0 bg-orange-500 bg-opacity-50 flex flex-col items-center justify-center text-center">
                    <h1 class="text-white text-4xl font-bold">BANTU MEREKA YANG MEMBUTUHKAN</h1>
                    <p class="text-white text-lg mt-2">BANTU MEREKA YANG MEMBUTUHKAN</p>
                    <div class="mt-6 w-full">
                        <div class="relative">
                            <input  onkeydown="handleSearch(event)"  id="searchInput" class="w-full py-3 px-4 rounded-full shadow-md focus:outline-none" placeholder="Cari Campaign" type="text"/>
                            <i class="fas fa-search absolute top-1/2 transform -translate-y-1/2 right-4 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="mt-8 grid grid-cols-4 gap-2 w-full">
                        <a href="campaign" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                            <i class="fas fa-hands-helping text-4xl text-orange-500"></i>
                            <p class="mt-2 text-gray-700 font-medium">Campaign</p>
                        </a>
                        <a href="ziswaf" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                            <i class="fas fa-hand-holding-heart text-4xl text-orange-500"></i>
                            <p class="mt-2 text-gray-700 font-medium">Zakat</p>
                        </a>
                        <a href="ziswaf" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                            <i class="fas fa-donate text-4xl text-orange-500"></i>
                            <p class="mt-2 text-gray-700 font-medium">Wakaf</p>
                        </a>
                        <a href="ziswaf" class="bg-white p-4 rounded-lg shadow-md flex flex-col items-center">
                            <i class="fas fa-hand-holding-usd text-4xl text-orange-500"></i>
                            <p class="mt-2 text-gray-700 font-medium">Infak</p>
                        </a>
                </div>
                </div> 
            
        </main>