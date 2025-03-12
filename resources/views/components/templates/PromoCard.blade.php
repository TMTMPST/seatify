<div class="w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $judul }}</h5>
    <p class="mb-3 font-normal text-gray-700">{{ $deskripsi }}</p>
    <div class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
        <span class="text-gray-900 font-semibold" id="{{ $id }}">{{ $kode }}</span>
        <button onclick="copyToClipboard('{{ $id }}')" class="cursor-pointer px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Salin
        </button>
    </div>
</div>
