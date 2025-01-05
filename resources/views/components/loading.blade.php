<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loading Screen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Animasi untuk logo */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .animate-pulse-slow {
            animation: pulse 3s ease-in-out infinite;
        }

        /* Gaya untuk teks gradasi */
        .gradient-text {
            background: linear-gradient(90deg, #FFA500, #FF4500, #FF6347);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 3s ease infinite;
        }

        /* Gaya untuk teks yang akan diketik */
        .typing {
            display: inline-block;
            overflow: hidden;
            white-space: nowrap;
            /* border-right: 2px solid #FFA500; */
        }
    </style>
</head>

<body class="bg-white flex justify-center items-center h-screen">
    <!-- Wrapper dengan maksimal lebar 500px -->
    <div id="loadingScreen"
        class="relative w-full md:w-[500px] h-screen flex flex-col justify-center items-center bg-white">
        <!-- Logo dengan animasi pulse -->
        <img alt="Lazismu Logo" src="{{ asset('image/logoOrange.png') }}" class="h-32 animate-pulse-slow" />

        <!-- Teks dengan efek mengetik dan gradasi -->
        {{-- <div class="mt-2 text-lg sm:text-xl font-semibold text-center">
            <p id="typingTextLine1"></p>
            <p id="typingTextLine2"></p>
        </div> --}}
        <span class="typing gradient-text font-semibold">SIAPA TAHU,</span>
        <span class="typing gradient-text font-semibold">INI KEBAIKANMU UNTUK YANG TERAKHIR KALINYA</span>
    </div>

    {{-- <script>
        // Teks untuk masing-masing baris
        const textLine1 = "SALURKAN DONASI ANDA";
        const textLine2 = "DENGAN MENGGUNAKAN LAYANAN KAMI";

        // Elemen untuk setiap baris
        const typingTextElementLine1 = document.getElementById("typingTextLine1");
        const typingTextElementLine2 = document.getElementById("typingTextLine2");

        // Variabel untuk mengontrol efek mengetik
        let indexLine1 = 0;
        let indexLine2 = 0;

        function typeEffectLine1() {
            if (indexLine1 < textLine1.length) {
                typingTextElementLine1.innerHTML =
                    `<span class="typing gradient-text">${textLine1.slice(0, indexLine1 + 1)}</span>`;
                indexLine1++;
                setTimeout(typeEffectLine1, 100);
            } else {
                typingTextElementLine1.querySelector(".typing").style.borderRight = "none";
                setTimeout(typeEffectLine2, 500); // Mulai baris kedua setelah jeda
            }
        }

        function typeEffectLine2() {
            if (indexLine2 < textLine2.length) {
                typingTextElementLine2.innerHTML =
                    `<span class="typing gradient-text2">${textLine2.slice(0, indexLine2 + 1)}</span>`;
                indexLine2++;
                setTimeout(typeEffectLine2, 100);
            } else {
                typingTextElementLine2.querySelector(".typing").style.borderRight = "none";
            }
        }

        // Mulai efek mengetik
        typeEffectLine1();
    </script> --}}
</body>

</html>
