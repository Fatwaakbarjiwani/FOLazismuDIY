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
    </style>
</head>

<body class="bg-white flex justify-center items-center min-h-screen">
    <!-- Wrapper dengan maksimal lebar 500px -->
    <div id="loadingScreen"
        class="relative w-full md:w-[500px] h-screen flex flex-col justify-center items-center bg-white">
        <!-- Logo dengan animasi pulse -->
        <img alt="Lazismu Logo" src="{{ asset('image/logoOrange.png') }}" class="h-32 animate-pulse" />

        <!-- Teks dengan efek mengetik dan gradasi -->
        <div class="mt-4 text-center">
            <span
                class="block bg-clip-text text-transparent bg-gradient-to-r from-[#FFA500] via-[#FF4500] to-[#FF6347] text-lg sm:text-xl font-semibold">
                SIAPA TAHU,
            </span>
            <span
                class="block bg-clip-text text-transparent bg-gradient-to-r from-[#FFA500] via-[#FF4500] to-[#FF6347] text-lg sm:text-xl font-semibold">
                INI KEBAIKANMU UNTUK YANG TERAKHIR KALINYA
            </span>
        </div>
    </div>
</body>

</html>
