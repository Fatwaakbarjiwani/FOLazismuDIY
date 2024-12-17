    let currentPage = 1;
    let totalPages = 1; // Variable for total pages

    // Function to Get Query Parameter from URL
    function getQueryParam(param) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    // Fetch and Display Campaigns Based on URL Query
    async function searchCampaign() {
        const searchTerm = getQueryParam("query"); // Get 'query' from URL
        if (!searchTerm) return; // Exit if no search term is found

        const response = await fetch(
            `${apiUrl}/campaign/get-active?page=${currentPage}&search=${encodeURIComponent(
                searchTerm
            )}`
        );
        const data = await response.json();

        totalPages = data.total_pages; // Assuming the response contains a field 'total_pages'
        const lastPage = data.last_page; // Assuming the response contains a field 'last_page'
        
        displayCampaigns(data.data);
        updatePaginationButtons(lastPage);
        
    }

    // Function to Render Campaign Cards
    function displayCampaigns(campaigns) {
        const campaignList = document.getElementById("campaignList");
        campaignList.innerHTML = ""; // Clear previous results

        campaigns.forEach((campaign) => {
            const campaignCard = `
                <div
                onclick="window.location.href='detailCampaign?id=${
                    campaign.id
                }'"
                class="bg-white flex flex-col justify-between rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer"
                     onclick="window.location.href='detailCampaign.php?id=${
                         campaign.id
                     }'">
                    <img alt="${
                        campaign.campaign_name
                    }" class="w-full h-auto object-contain" src="${
                campaign.campaign_thumbnail
            }" />
                    <h2 class="text-base px-2 font-bold text-gray-800">${
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
                            <div class="flex items-end gap-2">
                                <button class="bg-orange-500 text-white w-full py-1 mt-4 rounded-lg hover:bg-orange-600 transition-colors">Bantu Sekarang</button>
                                <p class="text-gray-400 text-sm mt-2 text-right">${new Date(
                                    campaign.start_date
                                ).toLocaleDateString()}</p>
                            </div>
                        </div>
                    </div>
                </div>`;
            campaignList.insertAdjacentHTML("beforeend", campaignCard);
        });
    }

    // Function to Update Pagination Buttons Visibility
    function updatePaginationButtons(lastPage) {
         
        const prevButton = document.getElementById("prevPage");
        const nextButton = document.getElementById("nextPage");

        // Hide prev/next buttons if there's only one page
        if (lastPage === 1) {
            prevButton.style.display = "none";
            nextButton.style.display = "none";
        } else {
            prevButton.style.display = "inline-block";
            nextButton.style.display = "inline-block";
        }
    }

    // Add Pagination Functionality
    document.getElementById("nextPage").addEventListener("click", () => {
        currentPage++;
        searchCampaign();
    });

    document.getElementById("prevPage").addEventListener("click", () => {
        if (currentPage > 1) currentPage--;
        searchCampaign();
    });

    // Call searchCampaign when the page loads
    window.onload = searchCampaign;

    function handleShareLink() {
        // Assuming the campaign URL is passed from the controller
        const url = "{{ url()->current() }}";
        // Create a temporary input element to copy the URL to clipboard
        const tempInput = document.createElement("input");
        document.body.appendChild(tempInput);
        tempInput.value = url;
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        
        alert("Campaign link copied to clipboard!");
    }