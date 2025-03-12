<div class="w-full p-6 bg-gray-800 border border-gray-900 rounded-xl shadow-sm">
    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-200">{{ $judul }}</h5>
    <p class="mb-3 font-normal text-white">{{ $deskripsi }}</p>
    <div class="flex items-center justify-between bg-gray-700 px-4 py-2 rounded-lg">
        <span class="text-white font-semibold" id="{{ $id }}">{{ $kode }}</span>
        <button onclick="copyToClipboard('{{ $id }}')" class="cursor-pointer px-3 py-1 text-sm font-medium text-white bg-green-700 rounded-md">
            Salin
        </button>
    </div>
</div>
