let currentPage = 1;
let categoryId = ""; // Variabel untuk menyimpan kategori yang dipilih

// Fungsi untuk mengambil dan menampilkan data kategori
async function fetchCategories() {
    try {
        const response = await fetch(`${apiUrl}/campaign-categories`);
        const categories = await response.json(); // Parsing JSON response

        const select = document.getElementById("campaignCategory");
        categories.forEach((category) => {
            const option = document.createElement("option");
            option.value = category.id; // ID kategori
            option.textContent = category.campaign_category; // Nama kategori
            select.appendChild(option);
        });
    } catch (error) {
        console.error("Gagal mengambil data kategori:", error);
    }
}

// Fungsi untuk mengambil data kampanye berdasarkan kategori dan halaman
async function getCampaigns(page) {
    try {
        const response = await fetch(
            `${apiUrl}/campaign/get-active?page=${page}&category_id=${categoryId}`
        );
        const data = await response.json();

        const campaigns = document.getElementById("campaignCard");
        campaigns.innerHTML = ""; 
        
        data.data.forEach((campaign) => {
            const campaignCard = `
            <div class="bg-white flex flex-col justify-between rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-200 cursor-pointer"
            onclick="window.location.href='detailCampaign?id=${campaign.id}'">
                <img alt="${
                    campaign.campaign_name
                }" class="w-full h-auto object-cover" src="${
                campaign.campaign_thumbnail
            }" />
            <h2 class="text-base font-bold text-gray-800 px-2 line-clamp-2">${
                campaign.campaign_name
            }</h2>
                <div class="px-2">
                    <p class="text-orange-500 font-semibold mt-1 text-xs">Kategori ${
                        campaign.category.campaign_category
                    }</p>
                    <p class="text-gray-500 mt-1 text-xs"><i class="fas fa-map-marker-alt"></i> ${
                        campaign.location
                    }</p>
                    <div class="mt-4">
                        <div class="flex justify-between text-gray-600 text-sm">
                            <span class="font-medium text-xs">Terkumpul</span>
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
                            <span class="font-medium text-xs">Target</span>
                            <span class="font-medium">Rp ${campaign.target_amount.toLocaleString()}</span>
                        </div>
                        <div class="flex  items-end gap-2 mb-2">
                        <button class="bg-orange-500 text-white w-full py-1 mt-2 rounded-lg hover:bg-orange-600 transition-colors">Bantu Sekarang</button>
                        <p class="text-gray-400 text-sm mt-2 text-right">${new Date(
                            campaign.start_date
                        ).toLocaleDateString()}</p>
                        </div>
                    </div>
                </div>
            </div>`;
            campaigns.innerHTML += campaignCard;
        });

        // Periksa apakah tombol navigasi perlu dinonaktifkan
        document.getElementById("prevPage").disabled = page === 1;
        document.getElementById("nextPage").disabled = data.data.length < 12;
    } catch (error) {
        console.error("Error fetching campaign data:", error);
    }
}

// Fungsi untuk mencatat ID kategori yang dipilih dan memuat kampanye
function logCategoryId() {
    const select = document.getElementById("campaignCategory");
    categoryId = select.value; // Perbarui ID kategori
    currentPage = 1; // Reset ke halaman pertama
    getCampaigns(currentPage); // Panggil fungsi untuk memuat kampanye
}

// Event listener untuk navigasi halaman
document.getElementById("prevPage").addEventListener("click", () => {
    if (currentPage > 1) {
        currentPage--;
        getCampaigns(currentPage);
    }
});

document.getElementById("nextPage").addEventListener("click", () => {
    currentPage++;
    getCampaigns(currentPage);
});

// Panggil fungsi saat halaman dimuat
document.addEventListener("DOMContentLoaded", () => {
    fetchCategories(); // Ambil kategori saat halaman dimuat
    getCampaigns(currentPage); // Muat kampanye awal
});
