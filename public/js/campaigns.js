let currentPage = 1;

async function fetchCampaigns(page) {
    try {
        const response = await fetch(
            `http://103.23.103.43/lazismuDIY/backendLazismuDIY/public/api/campaigns?page=${page}`
        );
        const data = await response.json();

        const campaignList = document.getElementById("campaignList");
        campaignList.innerHTML = ""; // Clear previous content

        data.data.forEach((campaign) => {
            const campaignCard = `
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer"
            onclick="window.location.href='detailCampaign?id=${
                campaign.id
            }'">
                <img alt="${
                    campaign.campaign_name
                }" class="w-full h-32 object-cover" src="${
                campaign.campaign_thumbnail
            }" />
            <h2 class="text-base font-bold text-gray-800 px-2">${
                campaign.campaign_name
            }</h2>
                <div class="p-2">
                    <p class="text-orange-500 font-semibold mt-1 text-sm">Kategori ${
                        campaign.category.campaign_category
                    }</p>
                    <p class="text-gray-500 mt-1 text-sm"><i class="fas fa-map-marker-alt"></i> ${
                        campaign.location
                    }</p>
                    <div class="mt-4">
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
                        <div class="flex justify-between text-gray-600 mt-2 text-sm">
                            <span class="font-medium">Target</span>
                            <span class="font-medium">Rp ${campaign.target_amount.toLocaleString()}</span>
                        </div>
                        <div class="flex  items-end gap-2">
                        <button class="bg-orange-500 text-white w-full py-2 mt-4 rounded-lg hover:bg-orange-600 transition-colors">Ikut Donasi</button>
                        <p class="text-gray-400 text-sm mt-2 text-right">${new Date(
                            campaign.start_date
                        ).toLocaleDateString()}</p>
                        </div>
                    </div>
                </div>
            </div>`;
            campaignList.innerHTML += campaignCard;
        });

        document.getElementById("prevPage").disabled = page === 1;
        document.getElementById("nextPage").disabled = data.data.length < 12;
    } catch (error) {
        console.error("Error fetching campaign data:", error);
    }
}

document.getElementById("prevPage").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        fetchCampaigns(currentPage);
    }
});

document.getElementById("nextPage").addEventListener("click", () => {
    currentPage++;
    fetchCampaigns(currentPage);
});

document.addEventListener("DOMContentLoaded", () =>
    fetchCampaigns(currentPage)
);
