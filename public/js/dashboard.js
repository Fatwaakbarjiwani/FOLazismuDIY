// Fetch data from the API and dynamically add to Swiper
fetch(
    "http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaigns?page=1"
)
    .then((response) => response.json())
    .then((data) => {
        const campaignList = document.getElementById("campaignList");

        data.data.forEach((campaign) => {
            const campaignItem = `
                       <div  onclick="window.location.href='detailCampaign?id=${
                           campaign.id
                       }'" class="h-[55vh] flex flex-col justify-between swiper-slide bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer">
    <img alt="${
        campaign.campaign_name
    }" class="w-full h-[20vh] object-cover" src="${
                campaign.campaign_thumbnail
            }" />
    <div class="p-2">
        <h2 class="text-sm font-bold text-gray-800">${
            campaign.campaign_name
        }</h2>
        <p class="text-orange-500 font-semibold text-[10px]">Kategori: ${
            campaign.category.campaign_category
        }</p>
        <p class="text-gray-500 text-[10px]"><i class="fas fa-map-marker-alt"></i> ${
            campaign.location
        }</p>

        <div class="mt-4">
            <div class="flex justify-between text-gray-600 text-[10px]">
                <span class="font-medium">Terkumpul</span>
                <span class="font-medium">Rp ${campaign.current_amount.toLocaleString()}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5">
                <div class="bg-orange-500 h-2.5 rounded-full" style="width: ${
                    (campaign.current_amount / campaign.target_amount) * 100
                }%"></div>
            </div>
            <div class="flex justify-between text-gray-600 mt-2 text-[10px]">
                <span class="font-medium">Target</span>
                <span class="font-medium">Rp ${campaign.target_amount.toLocaleString()}</span>
            </div>
            <div class="flex items-end justify-between gap-2">
                <button class="bg-orange-500 text-sm text-white w-full py-1 mt-4 rounded-lg hover:bg-orange-600 transition-colors">Ikut Donasi</button>
                <p class="text-gray-400 text-[10px] mt-2 text-right">${new Date(
                    campaign.end_date
                ).toLocaleDateString()}</p>
            </div>
        </div>
    </div>
</div>

                    `;
            campaignList.innerHTML += campaignItem;
        });

        const swiper = new Swiper(".swiper-container", {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: false, // Disable autoplay

            // Remove pagination by setting it to false
            pagination: {
                el: ".swiper-pagination",
                clickable: false, // Disable clickable dots
            },

            // Remove navigation arrows by setting them to false
            navigation: {
                nextEl: false,
                prevEl: false,
            },

            // Responsive breakpoints
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 5,
                },
            },
        });
    })
    .catch((error) => {
        console.error("Error fetching campaigns:", error);
    });

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
