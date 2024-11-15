<!-- resources/views/components/footer.blade.php -->
<div
  {{-- style="background-image: url('{{ asset('image/footer.svg') }}')" --}}
  class="flex flex-col gap-y-4 justify-around p-5 bg-gradient-to-t from-orange-600 to-orange-400 text-white font-Inter mt-10 w-full h-auto"
>
  <div class="w-full flex flex-col gap-2 xl:gap-5 items-start">
    <div class="bg-white p-1 rounded">
    <img alt="Lazismu Logo" class="h-8" src="{{ asset('image/Logo-Lazismu-Kota-Yogyakarta-2-1024x709.png') }}" width="50"/>
    </div>
    <p class="text-base ">
        LAZISMU adalah lembaga amil zakat nasional dengan SK. Menteri Agama RI No. 90 Tahun 2022, yang berkhidmat dalam pemberdayaan masyarakat, melalui pendayagunaan dana zakat, infaq dan dana kedermawanan lainnya baik dari perseorangan, lembaga, perusahaan dan instansi lainnya.
    </p>
  </div>
  
  <div class="w-full flex flex-col gap-2">
    <p class="font-bold text-lg ">Kantor</p>
    <p class="text-base ">
        Jl. Gedongkuning No.152, RT.41, Rejowinangun, Kec. Kotagede, Kota Yogyakarta, Daerah Istimewa Yogyakarta
    </p>
  </div>

  <div class=" w-full flex flex-col gap-2">
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
  </div>
</div>
