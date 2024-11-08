<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Donation Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Roboto', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Header -->
  <header class="bg-white shadow">
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <div class="flex items-center">
            <img alt="Lazismu Logo" class="h-8" src="{{ asset('storage/Logo-Lazismu-Kota-Yogyakarta-2-1024x709.png') }}" width="50"/>
            </div>
            <div class="flex items-center space-x-4">
                <a class="text-gray-600 hover:text-orange-500" href="#">Masuk</a>
                <a class="bg-orange-500 text-white px-4 py-2 rounded" href="#">Daftar</a>
            </div>
        </div>
    </header>

  <!-- Quote Section -->
  <section class="bg-orange-500 text-black py-10">
    <div class="container mx-auto flex justify-between items-center">
      <div>
        <p class="text-2xl font-bold">"Orang yang berzakat menjadikan hartanya menjadi suci bersih."</p>
        <p class="text-xl">- Prof. Dr. Quraish Shihab</p>
      </div>
      <img src="https://storage.googleapis.com/a1aa/image/rhlAz4AQOf2NSa0pxKZpytaWOCUfN4IbXiimXTVyeut2eWpOB.jpg" 
           alt="Plant Image" class="h-32 rounded-full shadow-md" />
    </div>
  </section>

  <!-- Donation Form Section -->
  <section class="py-20">
    <div class="container mx-auto flex justify-center">
      <div class="bg-white shadow-lg rounded-lg p-10 w-full max-w-md text-lg">
        <div class="flex justify-center space-x-6 mb-8">
          <button class="tab-button bg-orange-500 text-white px-6 py-3 rounded-full" onclick="fetchCategories('zakats')">Zakat</button>
          <button class="tab-button bg-gray-200 text-gray-700 px-6 py-3 rounded-full" onclick="fetchCategories('infaks')">Infaq</button>
          <button class="tab-button bg-gray-200 text-gray-700 px-6 py-3 rounded-full" onclick="fetchCategories('wakafs')">Wakaf</button>
        </div>

        <div class="relative mb-6">
          <button class="bg-orange-500 text-white px-6 py-3 rounded-full w-full text-left text-lg font-semibold" onclick="toggleDropdown()">
            Pilih Kategori
            <i class="fas fa-chevron-down float-right mt-1"></i>
          </button>
          <div class="absolute bg-white shadow-lg rounded-lg mt-2 w-full hidden" id="dropdown"></div>
        </div>

        <div class="relative mb-6">
          <input type="text" placeholder="Jumlah Donasi" class="w-full px-6 py-3 border rounded-full pl-12 text-lg" />
          <span class="absolute left-6 top-3 text-gray-500">Rp</span>
        </div>

        <button class="bg-orange-500 text-white w-full py-3 rounded-full font-semibold text-lg">Hitung Donasi</button>
      </div>
    </div>
  </section>

  <!-- Donation Call to Action -->
  <section class="py-20">
    <div class="container mx-auto flex justify-between items-center">
      <div>
        <h2 class="text-4xl font-bold mb-6">Salurkan donasi kamu dengan mudah</h2>
        <p class="text-xl mb-8">Jadikan program dan donasi kamu lebih mudah dengan sistem yang terintegrasi.</p>
        <button class="bg-orange-500 text-white px-8 py-4 rounded-full text-lg font-semibold">Donasi Sekarang</button>
      </div>
      <img src="https://storage.googleapis.com/a1aa/image/GXw9bbSLvM4oHBZFPOC69fDzD2rmXBd5vuldn932e1ceeWpOB.jpg" 
           alt="Group of people receiving donations" class="h-72 rounded-lg shadow-lg" />
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-orange-500 text-white py-10">
    <div class="container mx-auto flex justify-between text-lg">
      <div>
        <img src="{{ asset('storage/Logo-Lazismu-Kota-Yogyakarta-2-1024x709.png') }}" 
             alt="Logo" class="h-12 mb-6" />
        <p>No Care: LAZISMU</p>
        <p>Jl. Sultan Agung No.14, Wirogunan, Pakualaman, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55151</p>
      </div>
      <div>
        <h3 class="font-bold mb-4">Program</h3>
        <ul>
          <li><a href="#" class="hover:underline">Zakat</a></li>
          <li><a href="#" class="hover:underline">Infaq</a></li>
          <li><a href="#" class="hover:underline">Wakaf</a></li>
        </ul>
      </div>
      <div>
        <h3 class="font-bold mb-4">Lainnya</h3>
        <ul>
          <li><a href="#" class="hover:underline">Berita</a></li>
          <li><a href="#" class="hover:underline">Profil</a></li>
          <li><a href="#" class="hover:underline">Kontak</a></li>
        </ul>
      </div>
      <div class="flex space-x-6">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <p class="text-center mt-10 text-lg">© 2023 LAZISMU. All rights reserved.</p>
  </footer>

  <script>
    function toggleDropdown() {
      document.getElementById('dropdown').classList.toggle('hidden');
    }

    function fetchCategories(type) {
      const dropdown = document.getElementById('dropdown');
      dropdown.innerHTML = '<p class="p-4">Loading...</p>'; // Show loading state

      // Define API URL based on selected type
      const apiUrl = `http://localhost:8000/api/${type}`;

      fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
          dropdown.innerHTML = ''; // Clear dropdown

          data.forEach(category => {
            // Populate dropdown with category names from the response
            const categoryItem = document.createElement('a');
            categoryItem.href = '#';
            categoryItem.className = 'block px-6 py-3 hover:bg-gray-200';
            categoryItem.textContent = category.category_name; // Display category name
            dropdown.appendChild(categoryItem);
          });
        })
        .catch(error => {
          console.error('Error fetching categories:', error);
          dropdown.innerHTML = '<p class="p-4 text-red-500">Failed to load categories.</p>';
        });
    }
  </script>
</body>
</html>
