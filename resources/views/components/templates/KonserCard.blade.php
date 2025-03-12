@props(['konser'])

<div class="w-full bg-white border border-gray-200 rounded-xl shadow-sm">
    <a href="#">
        <img class="h-48 w-full object-cover rounded-t-xl" src="{{ $konser->gambar }}" alt="{{ $konser->judul }}" />
    </a>
    <div class="p-5">
        <ul class="max-w-md list-disc list-inside font-medium {{ $konser->ketersediaan_tiket ? 'text-green-700' : 'text-red-700' }}">
            <li>{{ $konser->ketersediaan_tiket ? 'Tersedia' : 'Tidak Tersedia' }}</li>
        </ul>
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $konser->judul }}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700">{{ $konser->deskripsi }}</p>

        @if ($konser->ketersediaan_tiket)
            <a href="/detail-konser/{{ $konser->id }}" 
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-gray-800 hover:bg-gray-900 rounded-lg transition">
                Lihat Konser
                <svg class="w-5 h-5 ms-2 rotate-45 mt-[1px]" aria-hidden="true" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4"/>
                </svg>                  
            </a>
        @else
            <button class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-300 rounded-lg opacity-50 cursor-not-allowed">
                Tiket Habis
            </button>
        @endif
    </div>
</div>
