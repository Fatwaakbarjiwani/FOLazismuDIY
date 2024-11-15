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
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        .image {
            height: 55vh;
            object-position: top        }
    </style>
</head>
<body>
    <main class="slider-container mt-16 relative">
        <div class="h-[55vh] z-40 w-full h-full bg-orange-600/20 absolute"></div>
        <div class="absolute bottom-0 w-full h-[15vh] bg-gradient-to-t from-orange-300 via-orange-300/50 to-transparent z-40"></div>
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
