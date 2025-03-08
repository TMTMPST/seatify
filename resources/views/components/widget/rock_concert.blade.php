<?php
$konserKategori3 = App\Models\DaftarKonser::where('kategori_id', 3)->get();
?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($konserKategori3 as $konser)
        <div class="w-full bg-white border border-gray-200 rounded-xl shadow-sm">
            <a href="#">
                <img class="h-48 w-full object-cover rounded-t-xl" src="{{ $konser->gambar }}" alt="{{ $konser->judul }}" />
            </a>
            <div class="p-5">
                <ul class="max-w-md {{ $konser->ketersediaan_tiket ? 'text-green-700' : 'text-red-700' }} list-disc list-inside font-medium">
                    <li>
                        {{ $konser->ketersediaan_tiket ? 'Tersedia' : 'Tidak Tersedia' }}
                    </li>
                </ul>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $konser->judul }}</h5>
                </a>
                <p class="mb-3 font-normal text-gray-700">{{ $konser->deskripsi }}</p>
                <a href="/detail-konser/{{ $konser->id }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white {{ $konser->ketersediaan_tiket ? 'bg-blue-800 hover:bg-blue-900' : 'bg-gray-300 hover:bg-gray-400' }} rounded-lg">
                    Lihat Konser
                    <svg class="rotate-45 mt-[1px] w-5 h-5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"/>
                    </svg>                  
                </a>
            </div>
        </div>
    @endforeach
</div>
