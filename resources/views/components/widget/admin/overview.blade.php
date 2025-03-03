<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">    
    @if ($showKonser)
    <div>
        <div class="block hover:border-blue-900 hover:border w-full p-6 bg-white border border-gray-200 rounded-xl shadow-xs">
            <h5 class="mb-1 text-md font-medium tracking-tight text-gray-400">Jumlah Konser</h5>
            <p class="mb-2 text-4xl font-bold text-gray-900">10</p>
            <h5 class="text-md font-medium tracking-tight text-green-800">5% dari bulan lalu</h5>
        </div>
    </div>
    @endif
    @if ($showPengguna)
    <div>
        <div class="block hover:border-blue-900 hover:border w-full p-6 bg-white border border-gray-200 rounded-xl shadow-xs">
            <h5 class="mb-1 text-md font-medium tracking-tight text-gray-400">Jumlah Pengguna</h5>
            <p class="mb-2 text-4xl font-bold text-gray-900">1.500</p>
            <h5 class="text-md font-medium tracking-tight text-green-800">5% dari bulan lalu</h5>
        </div>
    </div>
    @endif
    @if ($showPendapatan)
    <div>
        <div class="block hover:border-blue-900 hover:border w-full p-6 bg-white border border-gray-200 rounded-xl shadow-xs">
            <h5 class="mb-1 text-md font-medium tracking-tight text-gray-400">Total Pendapatan</h5>
            <p class="mb-2 text-4xl font-bold text-gray-900">Rp 50.000.000</p>
            <h5 class="text-md font-medium tracking-tight text-green-800">5% dari bulan lalu</h5>
        </div>
    </div>
    @endif
</div>