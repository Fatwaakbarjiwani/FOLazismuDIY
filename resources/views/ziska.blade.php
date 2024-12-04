<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ziska</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .active {
            background-color: rgb(255, 187, 0);
            color: white;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center">
    <div class="w-full sm:w-[500px] bg-white shadow-lg min-h-screen">
        @include('components.header')
        <img src="image/logooo.jpg" class="bg-gray-200 w-full h-[30vh] object-contain mt-16" alt="">
        <div class="bg-white w-5/6 sm:w-3/4 m-auto p-4">
            <div class="bg-white shadow rounded-lg p-4">
                <!-- Button Pilihan Tipe -->
                <div id="typeButtons" class="flex justify-between text-white font-semibold bg-orange-500 rounded">
                    <button class="capitalize w-2/4 border-x p-2 rounded-l" data-type="zakats">zakat</button>
                    <button class="capitalize w-2/4 border-x p-2" data-type="infaks">infak</button>
                </div>

                <!-- Dropdown Pilihan Kategori -->
                <div class="flex flex-row items-center justify-between mt-4">
                    <p class="font-semibold">Yuk Menunaikan <span id="typeTitle">Zakat</span>!</p>
                    <select id="categoryDropdown" class="border rounded p-2 text-sm">
                        <option>Pilih Kategori</option>
                    </select>
                </div>

                <!-- Input Jumlah -->
                <div class="mt-4">
                    <label class="font-semibold">Masukkan jumlah <span id="typeTitle">Zakat</span> kamu di sini</label>
                    <input type="text" id="amountInput"
                        class="w-full border border-gray-500 rounded p-2 outline-none mt-1" placeholder="Rp.0" />
                </div>
            </div>


        </div>
        @include('components.bottomNav')
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Default API Endpoint
        const baseUrl = 'http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/';
        const typeButtons = document.querySelectorAll('#typeButtons button');
        const dataContainer = document.getElementById('dataContainer');
        const typeTitle = document.getElementById('typeTitle');
        const categoryDropdown = document.getElementById('categoryDropdown');

        // Fungsi untuk mengambil data dari API
        const fetchData = async (type) => {
            try {
                const response = await fetch(`${baseUrl}${type}`);
                const data = await response.json();
                populateCategories(data);
                renderData(data);
            } catch (error) {
                console.error('Error fetching data:', error);
                dataContainer.innerHTML = '<p class="text-center text-red-500">Failed to load data.</p>';
            }
        };

        // Populate dropdown dengan kategori
        const populateCategories = (data) => {
            categoryDropdown.innerHTML = '<option>Pilih Kategori</option>';
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.category_name;
                option.textContent = item.category_name;
                categoryDropdown.appendChild(option);
            });
        };

        // Fungsi untuk mengatur tombol aktif
        const setActiveButton = (type) => {
            typeButtons.forEach(button => {
                button.classList.toggle('active', button.getAttribute('data-type') === type);
            });
        };

        // Fungsi untuk inisialisasi halaman
        const initialize = () => {
            const savedType = localStorage.getItem('type') || 'zakats';
            setActiveButton(savedType);
            typeTitle.textContent = savedType.charAt(0).toUpperCase() + savedType.slice(1, -1);
            fetchData(savedType);
        };

        // Event listener untuk tombol
        typeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const type = button.getAttribute('data-type');
                localStorage.setItem('type', type);
                typeTitle.textContent = type.charAt(0).toUpperCase() + type.slice(1, -1);
                setActiveButton(type);
                fetchData(type);
            });
        });

        // Jalankan inisialisasi saat halaman dimuat
        initialize();

        const amountInput = document.getElementById('amountInput');

        // Fungsi untuk memformat angka dengan titik ribuan
        const formatRupiah = (angka) => {
            const numberString = angka.replace(/[^,\d]/g, '').toString();
            const split = numberString.split(',');
            const sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            const ribuan = split[0].substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                const separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            return split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        };

        // Event listener untuk memformat input
        amountInput.addEventListener('input', (event) => {
            const rawValue = event.target.value;
            event.target.value = formatRupiah(rawValue);
        });
    </script>
</body>

</html>
