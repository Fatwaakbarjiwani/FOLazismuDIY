<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Laporan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8fafc;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #ff6f00;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .report-card {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #ff6f00;
        }

        .report-card a {
            color: #ff6f00;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .report-card a:hover {
            color: #d85e00;
        }

        .icon {
            font-size: 1.5rem;
            color: #ff6f00;
        }

        .no-data {
            text-align: center;
            font-size: 1.25rem;
            color: #6b7280;
            margin-top: 20px;
        }

        .button {
            background-color: #ff6f00;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #d85e00;
        }

        .select-input,
        .number-input {
            border: 2px solid #ddd;
            padding: 8px;
            border-radius: 6px;
            width: 100%;
            font-size: 16px;
        }

        .select-input:focus,
        .number-input:focus {
            border-color: #ff6f00;
            outline: none;
        }
    </style>
</head>

<body class="flex justify-center items-center">
    @include('components.header')
    <div class="w-full sm:w-[500px] min-h-screen bg-white mt-16 p-6 shadow-lg rounded-lg">
        @include('components.wa')
        <div class="bg-orange-500 w-full p-2 text-white">
            <h1 class="text-xl font-bold">Daftar Laporan</h1>
        </div>

        <div id="filter" class="flex justify-between mb-6 mt-6">
            <select id="month" class="select-input">
                <option value="">Pilih Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>

            <input id="year" type="number" min="2024" max="2026" value="2024"
                class="number-input ml-2" />
        </div>

        <button id="fetchReports" class="button mb-4">
            Tampilkan Laporan
        </button>

        <div id="reportList" class="space-y-4">
            <!-- Dynamic report cards will appear here -->
        </div>

        <div id="noData" class="no-data hidden">
            <p>Maaf, tidak ada laporan untuk bulan dan tahun yang dipilih.</p>
        </div>
    </div>

    @include('components.bottomNav')
    <script>
        const apiUrl = "{{ env('API_URL') }}";
        const endpoint = `${apiUrl}/get-report`;
        const baseUrl = "https://ws.jalankebaikan.id/storage/"; // Base URL for file paths

        // Event listener for fetch button
        document.getElementById('fetchReports').addEventListener("click", async () => {
            const month = document.getElementById("month").value;
            const year = document.getElementById("year").value;
            try {
                const response = await fetch(`${endpoint}?month=${month}&year=${year}`);
                const data = await response.json();
                const reportList = document.getElementById("reportList");
                const noData = document.getElementById("noData");
                reportList.innerHTML = ""; // Clear previous content

                if (data.length === 0) {
                    noData.classList.remove('hidden'); // Show no data message
                } else {
                    noData.classList.add('hidden'); // Hide no data message
                    // Loop through the data and create report links
                    data.forEach((item) => {
                        const fileExtension = item.file_path.split('.').pop().toLowerCase();
                        let iconClass = "fas fa-file"; // Default icon

                        // Assign icons based on file type
                        if (fileExtension === "pdf") {
                            iconClass = "fas fa-file-pdf text-red-600";
                        } else if (fileExtension === "doc" || fileExtension === "docx") {
                            iconClass = "fas fa-file-word text-blue-600";
                        } else if (fileExtension === "xls" || fileExtension === "xlsx") {
                            iconClass = "fas fa-file-excel text-green-600";
                        }

                        const reportCard = `
                            <a href="${baseUrl}${item.file_path}" class="report-card" target="_blank">
                                <i class="${iconClass} icon"></i>
                                <p>${item.title}</p>
                            </a>
                        `;
                        // Append each report card to the report list
                        reportList.innerHTML += reportCard;
                    });
                }
            } catch (error) {
                console.error("Error fetching reports:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat memuat laporan!',
                });
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
