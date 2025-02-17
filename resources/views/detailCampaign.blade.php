<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KWQ5Z1NW94"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-KWQ5Z1NW94');
    </script>
    {{--  --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta property="og:title" content="JALAN KEBAIKAN">
    <meta property="og:description"
        content="Platfrom Crowdfunding Lazismu DIY untuk menyalurkan berbagai kebaikan secara online dengan berbagai progam pemberdayaan dan pendayagunaan.">
    <meta property="og:image" content="{{ asset('image/logoOrange.png') }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <title>Bantu Korban Kebakaran</title>
    <title>Lazismu - Campaign Detail</title> --}}
    <title>{{ $campaign['campaign_name'] }}</title>
    <link rel="icon" type="image/svg+xml" href="image/logoOrange.png"/>
    <!-- Meta Tags untuk Sosial Media -->
    <meta property="og:title" content="{{ $campaign['campaign_name'] }}">
    <meta property="og:description" content="{{ $campaign['description'] }}">
    <meta property="og:image" content="{{ $campaign['campaign_thumbnail'] }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">
    {{--  --}}
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '6779218792190886');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=6779218792190886&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* CSS untuk teks-clamp */
        .text-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .news-card {
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .news-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Deskripsi dengan rata kiri-kanan */
        .text-justify {
            text-align: justify;
        }

        /* Gambar disembunyikan awalnya */
        .hidden {
            display: none;
        }

        /* Menampilkan gambar ketika aktif */
        .visible {
            display: block;
        }

        .paragraph {
            margin-bottom: 1rem;
        }
    </style>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .progress-bar {
            transition: width 0.5s ease;
        }

        p.paragraph {
            text-indent: 1.25em;
            /* Menambahkan indentasi di awal paragraf */
            margin-bottom: 0.5em;
            /* Menambahkan jarak antar paragraf */
            text-align: justify;
            /* Menjaga paragraf tetap rata kanan-kiri */
        }

        .campaign-card {
            max-width: 800px;
            margin: 20px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .active {
            display: block;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-full sm:w-[500px] bg-white shadow-lg">
        @include('components.header')
        @include('components.wa')
        <div class="bg-white p-4 mt-16">
            <h1 class="text-2xl font-bold text-gray-800">DETAIL <span class="text-orange-600">CAMPAIGN</span></h1>
            <div class="flex flex-col gap-4">
                <!-- Campaign Image -->
                <img id="campaignImage" class="h-[30vh] sm:h-[40vh] w-full object-contain sm:object-cover rounded-lg"
                    alt="Campaign Image">
                <div class="flex flex-col w-full">
                    <!-- Campaign Title -->
                    <h2 id="campaignTitle" class="text-2xl font-bold text-gray-900">Campaign Title</h2>
                    <!-- Category and Location -->
                    <div class="flex justify-between items-center">
                        <p id="campaignCategory" class="text-orange-500 font-semibold mt-1">Kategori: Category</p>
                        <p id="campaignLocation" class="text-gray-600 mt-1 text-sm flex items-center">
                            <i class="fas fa-map-marker-alt mr-1"></i> Location
                        </p>
                    </div>

                    <!-- Amount and Progress -->
                    <div class="mt-2">
                        <div class="flex flex-wrap justify-between">
                            <div class="flex justify-between gap-2 text-gray-700 text-sm">
                                <span class="font-medium">Terkumpul</span>
                                <span id="currentAmount" class="text-orange-600 font-semibold">Rp 0</span>
                            </div>
                            <div class="flex justify-between gap-2 text-gray-700 text-sm">
                                <span class="font-medium">Target</span>
                                <span id="targetAmount" class="text-orange-600 font-semibold">Rp 0</span>
                            </div>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3 mt-1">
                            <div id="progressBar" class="bg-orange-500 h-3 rounded-full progress-bar" style="width: 0%">
                            </div>
                        </div>
                    </div>
                    <p id="Date" class="text-gray-500 text-sm text-right mt-1">Date</p>

                    <!-- Share and Toggle Buttons -->
                    <div class="flex flex-wrap items-center gap-2 lg:gap-3 mt-2">
                        <p class="text-gray-600">Bagikan Campaign</p>
                        <button id="shareButton"
                            class="btn-share text-sm lg:text-lg items-center hover:scale-110 flex gap-2 border-2 border-primary px-1 rounded-lg font-semibold text-primary">
                            Share <i class="fas fa-share-alt"></i>
                        </button>
                    </div>

                    <!-- Donation Button -->
                    <!-- Donation Button -->
                    <a href="#" id="donateButtonLink" class="w-full">
                        <button id="donateButton"
                            class="w-full bg-orange-500 text-white py-2 rounded-lg hover:bg-orange-600 transition-colors mt-4">Mulai
                            Donasi</button>
                    </a>

                </div>
                <div class="w-full">
                    <div class="flex justify-start w-full gap-2">
                        <button onclick="showDetail('campaign')"
                            class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Detail Campaign
                        </button>
                        <button onclick="showDetail('donatur')"
                            class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Donatur
                        </button>
                        <button onclick="showDetail('laporan')"
                            class="text-sm lg:text-lg items-center hover:-translate-y-1 duration-200 flex gap-2 border-2 border-primary px-3 rounded-lg font-semibold text-primary">
                            Kabar Terbaru
                        </button>
                    </div>

                    <!-- Campaign Details and Donors List -->
                    <div id="campaignDetail" class="text-justify mt-2">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Deskripsi Campaign</h3>
                        <div id="campaignDescriptionContainer">
                            <!-- Deskripsi akan dimasukkan secara dinamis -->
                        </div>
                        @include('components.swiperImage')
                    </div>


                </div>

                <div id="donorList" class="hidden w-full text-left mt-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Daftar Donatur</h3>
                    <ul id="donors" class="list-disc pl-5 text-gray-700">
                        <li>Donatur 1: Rp 100,000</li>
                    </ul>
                </div>
                <div id="laporanDonasi" class="hidden w-full text-left mt-2">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Kabar Terbaru</h3>
                    <div id="kabarTerbaru" class="flex flex-col gap-2"></div>
                </div>
            </div>
        </div>
        <div class="mt-8 bg-gray-100 p-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Rekomendasi <span class="text-orange-500">Campaign</span>
            </h1>
            <!-- Swiper Container for Campaign Cards -->
            <div class="swiper-container overflow-x-hidden p-2">
                <div class="swiper-wrapper" id="campaignList">
                    <!-- Campaigns will be injected here dynamically -->
                </div>
            </div>
        </div>

        @include('components.footer')
        @include('components.bottomNav')
    </div>
</body>
<script>
    const apiUrl = "{{ env('API_URL') }}";
</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
{{-- <script src="{{ asset('js/dashboard.js') }}"></script> --}}
<script>
    fetch(`${apiUrl}/campaign/get-recomendation`)
        .then((response) => response.json())
        .then((data) => {
            const campaignList = document.getElementById("campaignList");

            // Kosongkan kontainer sebelum menambahkan elemen baru
            campaignList.innerHTML = "";

            data.forEach((campaign) => {
                const campaignItem = `
        <div class="swiper-slide">
            <div onclick="window.location.href='detailCampaign?id=${
                campaign.id
            }'" class="h-auto md:h-[50vh] flex flex-col justify-between bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer">
                <img alt="${
                    campaign.campaign_name
                }" class="w-full h-auto sm:h-[20vh] object-contain" src="${
                campaign.campaign_thumbnail
            }" />
                <h2 class="text-base font-bold line-clamp-2 text-gray-800 px-2">${
                    campaign.campaign_name
                }</h2>
                <div class="px-2">
                    <div>
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span class="font-medium">Terkumpul</span>
                            <span class="font-medium">Rp ${campaign.current_amount.toLocaleString()}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mt-1">
                            <div class="bg-orange-500 h-2.5 rounded-full" style="width: ${
                                (campaign.current_amount /
                                    campaign.target_amount) *
                                100
                            }%"></div>
                        </div>
                        <div class="flex justify-between text-gray-600 mt-1 text-sm">
                            <span class="font-medium">Target</span>
                            <span class="font-medium">Rp ${campaign.target_amount.toLocaleString()}</span>
                        </div>
                        <div class="w-full mb-2">
                            <button class="bg-orange-500 text-sm text-white w-full py-1 mt-4 rounded-lg hover:bg-orange-600 transition-colors">Bantu Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
                campaignList.innerHTML += campaignItem;
            });

            // Inisialisasi ulang Swiper
            const swiper = new Swiper(".swiper-container", {
                slidesPerView: 1.5,
                spaceBetween: 10,
                loop: false,
                autoplay: false,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: false,
                },
                navigation: {
                    nextEl: false,
                    prevEl: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 10,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 5,
                    },
                },
            });
        })
</script>
<script>
    // URL share
    const shareUrl = window.location.href;

    // Tombol share
    const shareButton = document.getElementById('shareButton');

    shareButton.addEventListener('click', () => {
        if (navigator.share) {
            // Gunakan Web Share API
            navigator.share({
                    url: shareUrl,
                })
                .then(() => console.log('Berhasil dibagikan!'))
                .catch((error) => console.error('Gagal membagikan:', error));
        } else {
            // Fallback: Salin URL ke clipboard
            navigator.clipboard.writeText(shareUrl)
                .then(() => alert('Link telah disalin ke clipboard!'))
                .catch((error) => console.error('Gagal menyalin URL:', error));
        }
    });

    function toggleVisibility(section) {
        const sections = {
            campaign: document.getElementById('campaignDetail'),
            donor: document.getElementById('donorList'),
            report: document.getElementById('laporanDonasi'),
        };

        Object.keys(sections).forEach(key => {
            sections[key].classList.toggle('hidden', key !== section);
        });

        if (section === 'donor') fetchDonors();
    }

    function fetchData(url, onSuccess, onError) {
        fetch(url)
            .then(response => response.json())
            .then(onSuccess)
            .catch(onError);
    }

    function renderDonors(data) {
        const donorListContainer = document.getElementById('donors');
        donorListContainer.innerHTML = '';

        if (data && data.data && Array.isArray(data.data)) {
            data.data.forEach(transaction => {
                const donorCard = document.createElement('li');
                donorCard.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'mb-2', 'shadow-md');
                donorCard.innerHTML = `
                <p class="text-sm text-gray-700"><span class="font-semibold">Tanggal:</span> ${new Date(transaction.transaction_date).toLocaleDateString()}</p>
                <p class="text-sm text-gray-700"><span class="font-semibold">Donatur:</span> ${transaction.donatur || 'Anonim'}</p>
                <p class="text-sm text-gray-700"><span class="font-semibold">Pesan:</span> ${transaction.message || '-'}</p>
                <p class="text-sm text-gray-700"><span class="font-semibold">Nominal:</span> Rp ${transaction.transaction_amount.toLocaleString('id-ID', {day: '2-digit',month: 'short',year: 'numeric'})}</p>
            `;
                donorListContainer.appendChild(donorCard);
            });
        } else {
            donorListContainer.innerHTML = '<li class="text-gray-600">Belum ada transaksi.</li>';
        }
    }

    function fetchDonors() {
        const campaignId = new URLSearchParams(window.location.search).get('id');
        if (!campaignId) return;

        fetchData(
            `${apiUrl}/transactions/campaign/${campaignId}`,
            renderDonors,
            () => document.getElementById('donors').innerHTML =
            '<li class="text-gray-600">Gagal memuat data donatur.</li>'
        );
    }

    function showDetail(section) {
        const campaignDetail = document.getElementById('campaignDetail');
        const donorList = document.getElementById('donorList');
        const laporanList = document.getElementById('laporanDonasi');

        if (section === 'campaign') {
            campaignDetail.classList.remove('hidden');
            donorList.classList.add('hidden');
            laporanList.classList.add('hidden');
        } else if (section === 'donatur') {
            campaignDetail.classList.add('hidden');
            donorList.classList.remove('hidden');
            laporanList.classList.add('hidden');
            fetchDonors(); // Fetch data transaksi saat tombol "Donatur" diklik
        } else if (section === 'laporan') {
            laporanList.classList.remove('hidden');
            donorList.classList.add('hidden');
            campaignDetail.classList.add('hidden');
        }
    }

    function fetchDonors() {
        const donorListContainer = document.getElementById('donors');
        donorListContainer.innerHTML = ''; // Clear existing donor list

        const urlParams = new URLSearchParams(window.location.search);
        const campaignId = urlParams.get('id');

        if (campaignId) {
            fetch(`${apiUrl}/transactions/campaign/${campaignId}`)
                .then(response => response.json())
                .then(data => {
                    if (data && data.data && Array.isArray(data.data)) {
                        data.data.forEach(transaction => {
                            const donorCard = document.createElement('li');
                            donorCard.classList.add('bg-gray-100', 'p-4', 'rounded-lg', 'mb-2',
                                'shadow-md');

                            donorCard.innerHTML = `
                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Tanggal:</span> 
                                ${new Date(transaction.transaction_date).toLocaleDateString()}
                            </p>
                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Donatur:</span> 
                                ${transaction.donatur || 'Anonim'}
                            </p>
                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Pesan:</span> 
                                ${transaction.message || '-'}
                            </p>
                            <p class="text-sm text-gray-700">
                                <span class="font-semibold">Nominal:</span> 
                                Rp ${transaction.transaction_amount.toLocaleString()}
                            </p>
                        `;
                            donorListContainer.appendChild(donorCard);
                        });
                    } else {
                        donorListContainer.innerHTML = '<li class="text-gray-600">Belum ada transaksi.</li>';
                    }
                })
                .catch(error => {
                    console.error("Error fetching donor data:", error);
                    donorListContainer.innerHTML = '<li class="text-gray-600">Gagal memuat data donatur.</li>';
                });
        }
    }

    const urlParams = new URLSearchParams(window.location.search);
    const campaignId = urlParams.get('id');
    if (campaignId) {
        fetch(`${apiUrl}/latestNews/list/campaign/${campaignId}`)
            .then(response => response.json())
            .then(data => {
                const kabarTerbaruContainer = document.getElementById('kabarTerbaru');
                kabarTerbaruContainer.innerHTML = ''; // Clear existing content
                if (data && Array.isArray(data)) {
                    data.forEach(news => {
                        const newsCard = document.createElement('div');
                        newsCard.classList.add(
                            'news-card',
                            'bg-white',
                            'rounded-xl',
                            'p-4',
                            'shadow-md',
                            'border',
                            'border-gray-300',
                            'gap-4'
                        );

                        // Pecah deskripsi menjadi paragraf
                        const descriptionParagraphs = news.description.split('\n').map(paragraph => {
                            return `<p class="text-gray-700 text-justify paragraph">${paragraph.trim()}</p>`;
                        }).join('');

                        // Tambahkan elemen untuk teks dan gambar
                        newsCard.innerHTML = `
                                    <p class="text-sm text-gray-500">${news.latest_news_date}</p>
                                    <div class="news-description text-clamp-3">
                                        ${descriptionParagraphs}
                                    </div>
                                    <img src="${news.image}" class="news-image hidden w-full h-48 object-contain rounded-xl mt-4" alt="${news.title || 'Kabar Terbaru'}">
                                `;

                        // Event listener untuk toggle deskripsi dan gambar
                        newsCard.addEventListener('click', () => {
                            const descriptionEl = newsCard.querySelector('.news-description');
                            const imageEl = newsCard.querySelector('.news-image');
                            if (descriptionEl.style.webkitLineClamp) {
                                // Tampilkan semua deskripsi dan gambar
                                descriptionEl.style.webkitLineClamp = '';
                                descriptionEl.style.display = 'block';
                                imageEl.classList.remove('hidden');
                                imageEl.classList.add('visible');
                            } else {
                                // Sembunyikan deskripsi tambahan dan gambar
                                descriptionEl.style.webkitLineClamp = '3';
                                descriptionEl.style.display = '-webkit-box';
                                imageEl.classList.remove('visible');
                                imageEl.classList.add('hidden');
                            }
                        });

                        kabarTerbaruContainer.appendChild(newsCard);
                    });
                } else {
                    kabarTerbaruContainer.innerHTML = '<p class="text-gray-600">Belum ada kabar terbaru.</p>';
                }
            })
            .catch(error => {
                console.error("Error fetching latest news:", error);
                document.getElementById('kabarTerbaru').innerHTML =
                    '<p class="text-gray-600">Gagal memuat kabar terbaru.</p>';
            });
    }
    if (campaignId) {
        fetch(`${apiUrl}/latestNews/list/campaign/${campaignId}`)
            .then(response => response.json())
            .then(data => {
                const kabarTerbaruContainer = document.getElementById('kabarTerbaru');
                kabarTerbaruContainer.innerHTML = ''; // Clear existing content
                if (data && Array.isArray(data)) {
                    data.forEach(news => {
                        const newsCard = document.createElement('div');
                        newsCard.classList.add(
                            'news-card',
                            'bg-white',
                            'rounded-xl',
                            'p-4',
                            'shadow-md',
                            'border',
                            'border-gray-300',
                            'gap-4'
                        );

                        // Pecah deskripsi menjadi paragraf
                        const descriptionParagraphs = news.description.split('\n').map(paragraph => {
                            return `<p class="text-gray-700 text-justify paragraph">${paragraph.trim()}</p>`;
                        }).join('');

                        // Tambahkan elemen untuk teks dan gambar
                        newsCard.innerHTML = `
                                    <p class="text-sm text-gray-500">${news.latest_news_date}</p>
                                    <div class="news-description text-clamp-3">
                                        ${descriptionParagraphs}
                                    </div>
                                    <img src="${news.image}" class="news-image hidden w-full h-48 object-contain rounded-xl mt-4" alt="${news.title || 'Kabar Terbaru'}">
                                `;

                        // Event listener untuk toggle deskripsi dan gambar
                        newsCard.addEventListener('click', () => {
                            const descriptionEl = newsCard.querySelector('.news-description');
                            const imageEl = newsCard.querySelector('.news-image');
                            if (descriptionEl.style.webkitLineClamp) {
                                // Tampilkan semua deskripsi dan gambar
                                descriptionEl.style.webkitLineClamp = '';
                                descriptionEl.style.display = 'block';
                                imageEl.classList.remove('hidden');
                                imageEl.classList.add('visible');
                            } else {
                                // Sembunyikan deskripsi tambahan dan gambar
                                descriptionEl.style.webkitLineClamp = '3';
                                descriptionEl.style.display = '-webkit-box';
                                imageEl.classList.remove('visible');
                                imageEl.classList.add('hidden');
                            }
                        });

                        kabarTerbaruContainer.appendChild(newsCard);
                    });
                } else {
                    kabarTerbaruContainer.innerHTML = '<p class="text-gray-600">Belum ada kabar terbaru.</p>';
                }
            })
            .catch(error => {
                console.error("Error fetching latest news:", error);
                document.getElementById('kabarTerbaru').innerHTML =
                    '<p class="text-gray-600">Gagal memuat kabar terbaru.</p>';
            });
    }

    if (campaignId) {
        fetch(`${apiUrl}/campaigns/${campaignId}`)
            .then(response => response.json())
            .then(campaign => {
                updateMetaTags(campaign);
                const campaignDescriptionContainer = document.getElementById("campaignDescriptionContainer");
                const descriptionText = campaign.description;

                // Pisahkan deskripsi menjadi paragraf berdasarkan karakter baris baru (\n)
                const paragraphs = descriptionText.split('\n');

                // Bersihkan kontainer deskripsi
                campaignDescriptionContainer.innerHTML = '';

                // Buat elemen <p> untuk setiap paragraf
                paragraphs.forEach(paragraph => {
                    if (paragraph.trim() !== '') { // Pastikan tidak ada paragraf kosong
                        const pElement = document.createElement('p');
                        pElement.classList.add('paragraph'); // Tambahkan class untuk gaya CSS
                        pElement.textContent = paragraph.trim(); // Tambahkan teks paragraf
                        campaignDescriptionContainer.appendChild(pElement); // Tambahkan ke kontainer
                    }
                });
                document.getElementById("campaignImage").src = campaign.campaign_thumbnail;
                document.getElementById("campaignTitle").textContent = campaign.campaign_name;
                document.getElementById("campaignCategory").textContent =
                    `Kategori: ${campaign.category.campaign_category}`;
                document.getElementById("campaignLocation").innerHTML =
                    `<i class="fas fa-map-marker-alt mr-1"></i> ${campaign.location}`;
                document.getElementById("currentAmount").textContent =
                    `Rp ${campaign.current_amount.toLocaleString()}`;
                document.getElementById("targetAmount").textContent =
                    `Rp ${campaign.target_amount.toLocaleString()}`;
                document.getElementById("Date").textContent =
                    `Date: ${new Date(campaign.start_date).toLocaleDateString()}`;


                const progress = (campaign.current_amount / campaign.target_amount) * 100;
                document.getElementById("progressBar").style.width = `${progress}%`;

                document.getElementById("donateButtonLink").href = `pembayaran?id=${campaignId}`;

                const slide1 = document.querySelector(".image1").parentElement;
                const slide2 = document.querySelector(".image2").parentElement;
                const slide3 = document.querySelector(".image3").parentElement;


                if (campaign.campaign_image_1) {
                    slide1.querySelector("img").src = campaign.campaign_image_1;
                    slide1.querySelector("img")
                    slide1.style.display = "block";
                } else {
                    slide1.style.display = "none";
                }

                if (campaign.campaign_image_2) {
                    slide2.querySelector("img").src = campaign.campaign_image_2;
                    slide2.style.display = "block";
                } else {
                    slide2.style.display = "none";
                }

                if (campaign.campaign_image_3) {
                    slide3.querySelector("img").src = campaign.campaign_image_3;
                    slide3.style.display = "block";
                } else {
                    slide3.style.display = "none";
                }
            })
            .catch(error => console.error("Error fetching campaign data:", error));
    }

    function updateMetaTags(campaign) {
        // Update title
        document.title = campaign.campaign_name;

        // Update meta description
        const descriptionMeta = document.querySelector('meta[name="description"]');
        if (descriptionMeta) {
            descriptionMeta.setAttribute('content', campaign.description);
        } else {
            const newDescriptionMeta = document.createElement('meta');
            newDescriptionMeta.name = "description";
            newDescriptionMeta.content = campaign.description;
            document.head.appendChild(newDescriptionMeta);
        }

        // Update og:title
        const ogTitleMeta = document.querySelector('meta[property="og:title"]');
        if (ogTitleMeta) {
            ogTitleMeta.setAttribute('content', campaign.campaign_name);
        } else {
            const newOgTitleMeta = document.createElement('meta');
            newOgTitleMeta.setAttribute('property', 'og:title');
            newOgTitleMeta.setAttribute('content', campaign.campaign_name);
            document.head.appendChild(newOgTitleMeta);
        }

        // Update og:description
        const ogDescriptionMeta = document.querySelector('meta[property="og:description"]');
        if (ogDescriptionMeta) {
            ogDescriptionMeta.setAttribute('content', campaign.description);
        } else {
            const newOgDescriptionMeta = document.createElement('meta');
            newOgDescriptionMeta.setAttribute('property', 'og:description');
            newOgDescriptionMeta.setAttribute('content', campaign.description);
            document.head.appendChild(newOgDescriptionMeta);
        }

        // Update og:image
        const ogImageMeta = document.querySelector('meta[property="og:image"]');
        if (ogImageMeta) {
            ogImageMeta.setAttribute('content', campaign.campaign_thumbnail);
        } else {
            const newOgImageMeta = document.createElement('meta');
            newOgImageMeta.setAttribute('property', 'og:image');
            newOgImageMeta.setAttribute('content', campaign.campaign_thumbnail);
            document.head.appendChild(newOgImageMeta);
        }
    }

    // Example usage: Fetch campaign data and update meta tags
    fetch(`${apiUrl}/campaigns/${campaignId}`)
        .then(response => response.json())
        .then(campaign => {
            updateMetaTags(campaign);
        })
        .catch(error => console.error("Error fetching campaign data:", error));
</script>

</html>
