<div class="fixed bottom-0 flex w-[500px] z-50 bg-white shadow border-t-2 border-gray-100/50 justify-around py-2 mt-4 max-h-14">
    <a href="dashboard" 
       class="text-center {{ Request::is('dashboard') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-home"></i>
        <p class="text-xs">Beranda</p>
    </a>
    <a href="campaign" 
       class="text-center {{ Request::is('campaign') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-search"></i>
        <p class="text-xs">Campaign</p>
    </a>
    <a href="ziswaf" 
       class="text-center {{ Request::is('ziswaf') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-hand-holding-usd"></i>
        <p class="text-xs">Ziska</p>
    </a>
    <a href="laporan" 
       class="text-center {{ Request::is('laporan') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-newspaper"></i>
        <p class="text-xs">Laporan</p>
    </a>
</div>
