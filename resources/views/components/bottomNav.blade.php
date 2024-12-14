<div class="fixed bottom-0 flex w-full sm:w-[500px] z-40 bg-white shadow border-t-2 border-gray-100/50 justify-around py-2 mt-4 max-h-14">
    <a href="/" 
       class="text-center flex flex-col items-center text-sm {{ Request::is('/') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-home text-lg"></i>
        <p>Beranda</p>
    </a>
    <a href="campaign" 
       class="text-center flex flex-col items-center text-sm {{ Request::is('campaign') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-search text-lg"></i>
        <p>Campaign</p>
    </a>
    <a href="ziska" 
       class="text-center flex flex-col items-center text-sm {{ Request::is('ziska') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-hand-holding-usd text-lg"></i>
        <p>Ziska</p>
    </a>
    <a href="laporan" 
       class="text-center flex flex-col items-center text-sm {{ Request::is('laporan') ? 'text-yellow-500' : 'text-gray-500' }}">
        <i class="fas fa-newspaper text-lg"></i>
        <p>Laporan</p>
    </a>
</div>
