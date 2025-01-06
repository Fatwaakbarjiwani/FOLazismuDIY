// Fungsi untuk menangani fetch API dengan penanganan kesalahan
async function fetchData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return await response.json();
    } catch (error) {
        console.error(`Error fetching data from ${url}:`, error);
        return [];
    }
}

// Fungsi untuk menampilkan loading dan konten dashboard
function toggleLoading(showLoading) {
    const loadingScreen = document.getElementById("loadingScreen");
    const dashboardContent = document.getElementById("dashboardContent");
    if (showLoading) {
        loadingScreen.classList.remove("hidden");
        dashboardContent.classList.add("hidden");
    } else {
        loadingScreen.classList.add("hidden");
        dashboardContent.classList.remove("hidden");
    }
}

// Fungsi untuk membuat elemen kampanye
function createCampaignCard(campaign) {
    return `
        <div class="swiper-slide">
            <div onclick="window.location.href='detailCampaign?id=${
                campaign.id
            }'" 
                class="h-auto md:h-[50vh] flex flex-col justify-between bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer">
                <img alt="${campaign.campaign_name}" 
                    class="w-full h-auto sm:h-[20vh] object-contain" 
                    src="${campaign.campaign_thumbnail}" />
                <h2 class="text-base font-bold line-clamp-2 text-gray-800 px-2">
                    ${campaign.campaign_name}
                </h2>
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
                            <button class="bg-orange-500 text-sm text-white w-full py-1 mt-4 rounded-lg hover:bg-orange-600 transition-colors">
                                Bantu Sekarang
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

// Fungsi untuk membuat elemen kampanye populer
function createPopularCampaignCard(campaign) {
    return `
        <div onclick="window.location.href='detailCampaign?id=${campaign.id}'" 
            class="cursor-pointer flex w-full gap-2 border-y border-gray-300 p-2 items-center">
            <img src="${
                campaign.campaign_thumbnail
            }" class="h-auto w-1/2" alt="">
            <div class="w-1/2">
                <h2 class="text-base font-bold line-clamp-2 text-gray-800">${
                    campaign.campaign_name
                }</h2>
                <div class="flex justify-between text-gray-600 text-xs">
                    <span class="font-medium text-[10px]">Terkumpul</span>
                    <span class="text-orange-500 font-semibold">Rp ${campaign.current_amount.toLocaleString()}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                    <div class="bg-orange-500 h-2 rounded-full" style="width: ${
                        (campaign.current_amount / campaign.target_amount) * 100
                    }%"></div>
                </div>
                <div class="flex justify-between text-gray-600 mt-1 text-xs">
                    <span class="font-medium text-[10px]">Target</span>
                    <span class="font-semibold text-orange-500">Rp ${campaign.target_amount.toLocaleString()}</span>
                </div>
            </div>
        </div>
    `;
}

// Fungsi untuk inisialisasi ulang Swiper
function initializeSwiper() {
    new Swiper(".swiper-container", {
        slidesPerView: 1.5,
        spaceBetween: 10,
        loop: false,
        autoplay: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: false,
        },
        navigation: {
            nextEl: null,
            prevEl: null,
        },
        breakpoints: {
            640: { slidesPerView: 2, spaceBetween: 10 },
            768: { slidesPerView: 2, spaceBetween: 5 },
        },
    });
}

// Mendapatkan data rekomendasi kampanye
async function loadRecommendations() {
    const data = await fetchData(`${apiUrl}/campaign/get-recomendation`);
    const campaignList = document.getElementById("campaignList");
    if (data.length > 0) {
        toggleLoading(false);
        campaignList.innerHTML = data.map(createCampaignCard).join("");
        initializeSwiper();
    } else {
        toggleLoading(true);
    }
}

// Mendapatkan data kampanye populer
async function loadPopularCampaigns() {
    const data = await fetchData(`${apiUrl}/campaign/get-priority`);
    const campaignPopular = document.getElementById("campaignPopular");
    campaignPopular.innerHTML = data
        .slice(0, 5)
        .map(createPopularCampaignCard)
        .join("");
}

// Menyimpan tipe ke localStorage
function setType(type) {
    localStorage.setItem("type", type);
}

// Memuat data saat halaman dimuat
document.addEventListener("DOMContentLoaded", () => {
    loadRecommendations();
    loadPopularCampaigns();
});
