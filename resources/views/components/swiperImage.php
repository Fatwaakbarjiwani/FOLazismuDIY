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
            height: 250px;
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        @media (min-width: 768px) {
            .image {
                height: 300px;
                width: 500px;
            }
        }
    </style>
</head>
<body class="flex justify-center w-full">
    <main class="slider-container mx-auto w-full max-w-[500px]">
        <!-- Swiper Container -->
        <div class="swiper slider-1">
            <div class="swiper-wrapper">
                <div class="swiper-slide flex justify-center">
                    <img
                        alt="image1"
                        class="image1 h-[30vh] sm:h-[50vh] object-contain"
                        src="{{ asset('image/slider1.jpg') }}"
                    />
                </div>
                <div class="swiper-slide flex justify-center">
                    <img
                        alt="image2"
                        class="image2 h-[30vh] sm:h-[50vh] object-contain"
                        src="{{ asset('image/slider1.jpg') }}"
                    />
                </div>
                <div class="swiper-slide flex justify-center">
                    <img
                        alt="image3"
                        class="image3 h-[30vh] sm:h-[50vh] object-contain"
                        src="{{ asset('image/slider1.jpg') }}"
                    />
                </div>
            </div>
        </div>
    </main>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper(".slider-1", {
                slidesPerView: 1,
                spaceBetween: 10,
                loop: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
            });
        });
    </script>
</body>
</html>
