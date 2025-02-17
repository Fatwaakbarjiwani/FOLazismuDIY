<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KWQ5Z1NW94"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-KWQ5Z1NW94');
    </script>
    <meta charset="utf-8" />
    <meta name="description"
        content="Platfrom Crowdfunding Lazismu DIY untuk menyalurkan berbagai kebaikan secara online dengan berbagai progam pemberdayaan dan pendayagunaan.">
    <meta name="keywords" content="Daftar Zakat, Zakat, Infak">
    <meta name="author" content="Akbar">
    <meta name="title" content="Jalan Kebaikan">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Ziska</title>
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '6779218792190886');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=6779218792190886&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .active {
            background-color: rgb(255, 187, 0);
            color: white;
        }
    </style>
    <link rel="icon" type="image/svg+xml" href="image/logoOrange.png"/>
    
</head>

<body class="bg-gray-100 flex justify-center">
    <div class="w-full sm:w-[500px] bg-white shadow-lg min-h-screen py-16">
        @include('components.header')
        @include('components.wa')

        <img src="image/logooo.jpg" class="bg-gray-200 w-full h-auto object-contain" alt="">
        <div class="bg-white w-full sm:w-3/4 m-auto p-4">
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
                <button id="submitButton"
                    class="bg-orange-500 w-full mt-2 text-white font-semibold p-2 rounded active:scale-105 duration-300">Lanjutkan</button>
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
        const categoryDropdown = document.getElementById('categoryDropdown');
        const amountInput = document.getElementById('amountInput');
        const submitButton = document.getElementById('submitButton');

        // Fungsi untuk mengambil data dari API
        const fetchData = async (type) => {
            try {
                const response = await fetch(`${apiUrl}/${type}`);
                const data = await response.json();
                populateCategories(data);
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
                option.value = item.id; // Menggunakan ID kategori
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

        // Event listener untuk dropdown kategori
        categoryDropdown.addEventListener('change', () => {
            const selectedCategoryId = categoryDropdown.value;
            if (selectedCategoryId !== 'Pilih Kategori') {
                localStorage.setItem('id', selectedCategoryId); // Simpan ID ke localStorage
            }
        });

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

        // Event listener untuk tombol "Lanjutkan"
        submitButton.addEventListener('click', () => {
            const amount = amountInput.value.replace(/[^\d]/g, ''); // Ambil angka tanpa format
            const selectedCategory = categoryDropdown.value;

            if (selectedCategory === 'Pilih Kategori') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Kategori Belum Dipilih',
                    text: 'Silakan pilih kategori terlebih dahulu.',
                });
                return;
            }

            if (!amount || parseInt(amount) === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Nominal Tidak Valid',
                    text: 'Masukkan nominal yang valid.',
                });
                return;
            }

            // Simpan nominal ke localStorage
            localStorage.setItem('nominal', amount);

            // Arahkan ke halaman formPembayaran
            window.location.href = '/formPembayaran_ziska';
        });

        // Jalankan inisialisasi saat halaman dimuat
        initialize();
    </script>
</body>

</html>
