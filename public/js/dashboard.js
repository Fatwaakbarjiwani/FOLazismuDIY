// Fetch data from the API and dynamically add to Swiper
fetch(
    "http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaign/get-recomendation"
)
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

    .catch((error) => {
        console.error("Error fetching campaigns:", error);
    });
    
fetch(
    "http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaign/get-priority"
)
    .then((response) => response.json())
    .then((data) => {
        const campaignPopular = document.getElementById("campaignPopular");
        campaignPopular.innerHTML = "";

        data.slice(0,5).forEach((campaign) => {
            const campaignItem = `
                        <div  onclick="window.location.href='detailCampaign?id=${
                            campaign.id
                        }'" class="cursor-pointer flex w-full gap-2 border-y border-gray-300 p-2 items-center">
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
                                (campaign.current_amount /
                                    campaign.target_amount) *
                                100
                            }%"></div>
                        </div>
                        <div class="flex justify-between text-gray-600 mt-1 text-xs">
                            <span class="font-medium text-[10px]">Target</span>
                            <span class="font-semibold text-orange-500">Rp ${campaign.target_amount.toLocaleString()}</span>
                        </div>
                    </div>
                </div>
        `;
            campaignPopular.innerHTML += campaignItem;
        });
    })

function handleSearch(event) {
    if (event.key === "Enter") {
        const searchTerm = document.getElementById("searchInput").value;
        if (searchTerm.trim()) {
            window.location.href = `searchCampaign?query=${encodeURIComponent(
                searchTerm
            )}`;
        }
    }
}

function setType(type) {
    localStorage.setItem("type", type);
}
