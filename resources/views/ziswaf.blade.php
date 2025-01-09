<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta property="og:description"
        content="Platfrom Crowdfunding Lazismu DIY untuk menyalurkan berbagai kebaikan secara online dengan berbagai progam pemberdayaan dan pendayagunaan.">
    <meta property="og:keywords"
        content="Daftar Zakat, Zakat Fitrah, Zakat Maal, Zakat Penghasilan, Zakat Perdagangan, Zakat Tabungan, Zakat Emas, Zakat Pertanian, Zakat Peternakan, Infak, Infak Umum, Infak Pembangunan Masjid, Infak Pembangunan">
    <meta property="og:author" content="Akbar">
    <meta property="og:title" content="Jalan Kebaikan">
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
            background-color: orange;
            color: white;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center">
    <div class="w-full sm:w-[500px] bg-white shadow-md">
        @include('components.wa')
        @include('components.header')
        <div class="bg-white my-16 px-4 min-h-screen">
            <div id="typeButtons" class="py-4 flex gap-4 justify-center">
                <button class="capitalize border-orange-500 border p-2 rounded" data-type="zakats">zakat</button>
                <button class="capitalize border-orange-500 border p-2 rounded" data-type="infaks">infak</button>
            </div>
            <h1 class="text-left text-xl font-bold mt-2">Daftar <span id="typeTitle">Zakat</span></h1>
            <div id="dataContainer" class="grid grid-cols-2 gap-4 mt-2">
                <!-- Cards akan diisi dengan JavaScript -->
            </div>
        </div>
        @include('components.bottomNav')
    </div>

    <script>
        const apiUrl = "{{ env('API_URL') }}";
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        // Default API Endpoint
        const typeButtons = document.querySelectorAll('#typeButtons button');
        const dataContainer = document.getElementById('dataContainer');
        const typeTitle = document.getElementById('typeTitle');

        // Fungsi untuk mengambil data dari API
        const fetchData = async (type) => {
            try {
                const response = await fetch(`${apiUrl}/${type}`);
                const data = await response.json();
                renderData(data);
            } catch (error) {
                console.error('Error fetching data:', error);
                dataContainer.innerHTML = '<p class="text-center text-red-500">Failed to load data.</p>';
            }
        };

        // Fungsi untuk render data ke dalam DOM
        const renderData = (data) => {
            dataContainer.innerHTML = '';
            data.forEach(item => {
                const card = `
                    <div onclick="window.location.href='pembayaran_ziska?id=${
                item.id
            }'" 
            class="border rounded p-2 shadow-md flex flex-col justify-between">
                        <img src="${item.thumbnail}" alt="${item.category_name}" class="w-full h-auto object-contain rounded mb-2">
                        <h3 class="text-center font-semibold">${item.category_name}</h3>
                    </div>`;
                dataContainer.insertAdjacentHTML('beforeend', card);
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
    </script>
</body>

</html>
