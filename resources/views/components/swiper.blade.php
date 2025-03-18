<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swiper Slider</title>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        .slider-container {
            position: relative;
            overflow: hidden;
        }

        .image {
            height: auto;
            width: 100%;
            object-fit: contain;
            object-position: center;
        }

        @media (min-width: 768px) {
            .image {
                height: auto;
                width: 500px;
            }
        }
    </style>
</head>

<body class="flex justify-center w-full">
    <main class="slider-container mt-16 mx-auto w-full max-w-[500px]">
        <!-- Swiper Container -->
        <div class="swiper slider-1">
            <div class="swiper-wrapper" id="sliderHomePage">

            </div>
        </div>
    </main>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const swiper1 = new Swiper(".slider-1", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
</body>
<script>
    fetch(
            `${apiUrl}/zakats`
        )
        .then((response) => response.json())
        .then((data) => {

            const sliderHomePage = document.getElementById("sliderHomePage");
            sliderHomePage.innerHTML = "";

            data.filter(data => data.id == 2 || data.id == 4).forEach((campaign) => {
                const campaignItem = `
                       <div onclick="window.location.href='pembayaran_ziska?id=${
                campaign.id
            }'" class="swiper-slide">
                    <img alt="Dashboard view" class="image" src="${
                        campaign.thumbnail
                    }" />
                </div>
        `;
                sliderHomePage.innerHTML += campaignItem;
            });
        })
    // fetch(
    //         `${apiUrl}/campaign/get-recomendation`
    //     )
    //     .then((response) => response.json())
    //     .then((data) => {

    //         const sliderHomePage = document.getElementById("sliderHomePage");
    //         sliderHomePage.innerHTML = "";

    //         data.slice(0, 3).forEach((campaign) => {
    //             const campaignItem = `
    //                    <div onclick="window.location.href='detailCampaign?id=${
    //             campaign.id
    //         }'" class="swiper-slide">
    //                 <img alt="Dashboard view" class="image" src="${
    //                     campaign.campaign_thumbnail
    //                 }" />
    //             </div>
    //     `;
    //             sliderHomePage.innerHTML += campaignItem;
    //         });
    //     })
</script>

</html>
