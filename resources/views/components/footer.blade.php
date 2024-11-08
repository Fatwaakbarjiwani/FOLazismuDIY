<!-- resources/views/components/footer.blade.php -->
<div
  {{-- style="background-image: url('{{ asset('image/footer.svg') }}')" --}}
  class="flex flex-col gap-y-4 justify-around p-5 bg-orange-600 text-white font-Inter mt-10 w-full h-auto"
>
  <div class="w-full flex flex-col gap-2 xl:gap-5 items-start">
    <div class="bg-white p-1 rounded">
    <img alt="Lazismu Logo" class="h-8" src="{{ asset('image/Logo-Lazismu-Kota-Yogyakarta-2-1024x709.png') }}" width="50"/>
    </div>
    <p class="text-base ">
        Jl.Raya Kaligawe, Km.4, Sambirejo, Genuk, Terboyo Wetan, Kec.Genuk, Kota Semarang, Jawa Tengah 50112
    </p>
  </div>

  <div class="w-full flex flex-col gap-2">
    <p class="font-bold text-lg ">Program</p>
    <div class="text-sm w-1/2 ">
      <div class="flex justify-between gap-2">
        <p>Zakat</p>
        <p>Campaign</p>
      </div>
      <div class="flex justify-between gap-2">
        <p>Ziswaf</p>
      </div>
      <div class="flex justify-between gap-2">
        <p>Donasi</p>
        <p>Infak</p>
      </div>
    </div>
  </div>

  <div class="w-full flex flex-col gap-2 ">
    <p class="font-bold text-lg">Lainnya</p>
    <div class="flex flex-col gap-1 text-sm">
      <p>Zakat</p>
      <p>Apa itu Ziswaf?</p>
      <p>Privacy Policy</p>
      <p>Syarat dan Ketentuan</p>
      <p>Refund Policy</p>
    </div>
  </div>

  <div class=" w-full flex flex-col gap-2">
    <p class="font-bold text-lg ">Tentang Kami</p>
    <div class="flex flex-col gap-2 text-sm">
      <a href="https://ybw-sa.org/" class="flex gap-2 items-center">
        <img src="{{ asset('image/browser.svg') }}" class="w-5 " alt="Website" />
        <p>https://lazis.org/</p>
      </a>
      <a class="flex gap-2 items-center">
        <img src="{{ asset('image/pesan.svg') }}" class="w-5" alt="Contact" />
        <p>https://lazis.org/</p>
      </a>
    </div>
  </div>
</div>
