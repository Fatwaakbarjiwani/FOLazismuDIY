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
            width: 500px;
            object-fit: cover;
            object-position: center        
        }
    </style>
</head>
<body class="flex justify-center w-full">
    <main class="slider-container mt-16 mx-auto">
     <!-- Swiper Container -->
        <div class="swiper slider-1">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img
                        alt="Dashboard view"
                        class="image"
                        src="{{ asset('image/slider1.jpg') }}"
                    />
                </div>
                <div class="swiper-slide">
                    <img
                    class="image"
                        alt="Children smiling and sitting together"
                        src="{{ asset('image/slider2.jpg') }}"
                    />

                </div>
                <div class="swiper-slide">
                    <img
                    class="image"
                        alt="Children smiling and sitting together"
                        src="{{ asset('image/slider3.jpg') }}"
                    />
                </div>
            </div>
        </div>
    </main>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
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
</html>
