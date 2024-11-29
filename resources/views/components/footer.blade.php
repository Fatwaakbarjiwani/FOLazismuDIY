<!-- resources/views/components/footer.blade.php -->
<div
  {{-- style="background-image: url('{{ asset('image/footer.svg') }}')" --}}
  class="relative mb-14 flex flex-col gap-y-2 py-2 justify-around bg-gradient-to-t from-orange-600 to-orange-400 text-white font-Inter mt-10 w-full h-auto"
>
<div class="absolute top-0">
  <img alt="Lazismu Logo" class="h-24 left-0 " src="{{ asset('image/logoPutih.png') }}"/>
</div>
  
  <div class="w-full flex flex-col gap-2 mt-20 px-4">
    <p class="font-bold text-lg ">Kantor</p>
    <p class="text-base ">
        Jl. Gedongkuning No.152, RT.41, Rejowinangun, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta
    </p>
  </div>

  <div class=" w-full flex flex-col gap-2 px-4">
    <p class="font-bold text-lg ">Tentang Kami</p>
    <div class="flex flex-col gap-2 text-sm">
      <a href="https://lazismudiy.or.id/latar-belakang/" class="flex gap-2 items-center">
        <p>Latar Belakang</p>
      </a>
      <a href="https://lazismudiy.or.id/visi-dan-misi/" class="flex gap-2 items-center">
        <p>Visi Misi</p>
      </a>
      <a href="https://lazismudiy.or.id/susunan-lazismu/" class="flex gap-2 items-center">
        <p>Struktur Pengelola</p>
      </a>
      <a href="https://lazismudiy.or.id/kebijakan-strategis/" class="flex gap-2 items-center">
        <p>Kebijakan Strategis</p>
      </a>
      <a href="https://lazismudiy.or.id/kebijakan-mutu/" class="flex gap-2 items-center">
        <p>Kebijakan Mutu</p>
      </a>
      <a href="https://lazismudiy.or.id/laporan/" class="flex gap-2 items-center">
        <p>Laporan</p>
      </a>
      <a href="https://lazismudiy.or.id/laporan/" class="flex gap-2 items-center">
        <p>Mitra</p>
      </a>
    </div>
    <div class="mb-6">
      <h1 class="my-2 font-bold text-lg">Temukan kami di </h1>
      <div class="flex gap-4">
        <!-- Logo Facebook -->
        <a href="https://facebook.com/lazismudiy" target="_blank" class="hover:scale-110 duration-200 shadow">
          <img src="https://store-images.s-microsoft.com/image/apps.30645.9007199266245907.cb06f1f9-9154-408e-b4ef-d19f2325893b.ac3b465e-4384-42a8-9142-901c0405e1bc" alt="Facebook Logo" class="h-8 w-8 rounded" />
        </a>
        <!-- Logo Instagram -->
        <a href="https://instagram.com/lazismudiy" target="_blank" class="hover:scale-110 duration-200 shadow">
          <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png" alt="YouTube Logo" class="h-8 w-8 rounded" />
        </a>
        <!-- Logo TikTok -->
        <a href="https://www.tiktok.com/@jalankebaikan.id" target="_blank" class="hover:scale-110 duration-200 shadow">
          <img src="https://play-lh.googleusercontent.com/-eFRwLcNm0Ax43uXu5BrXIwhuGC7vm7N2OFRqVuMCVQxYE7Ca3Xdr5xvGmnYGoUO8jfm" alt="TikTok Logo" class="h-8 w-8 rounded" />
        </a>
        <!-- Logo YouTube -->
        <a href="https://www.youtube.com/@lazismudiy" target="_blank" class="hover:scale-110 duration-200 shadow">
          <img src="https://play-lh.googleusercontent.com/6am0i3walYwNLc08QOOhRJttQENNGkhlKajXSERf3JnPVRQczIyxw2w3DxeMRTOSdsY" alt="Instagram Logo" class="h-8 w-8 rounded" />
        </a>
        <a href="https://x.com/@lazismu_diy" target="_blank" class="hover:scale-110 duration-200 shadow">
          <img src="https://akcdn.detik.net.id/visual/2023/07/24/logo-twitter-terbaru_169.jpeg?w=480&q=90" alt="Instagram Logo" class="h-8 w-8 rounded" />
        </a>
      </div>
      <p class="text-sm my-2">Jalan Kebaikan by Lazismu Daerah Istimewa Yogyakarta</p>
    </div>
  </div>
</div>
