@extends('layouts.admin')

@section('admin')
    @include('components.widget.admin.overview')

    <hr class="h-px my-8 bg-gray-300 border-0">

    <a href="/admin/konser/tambah-konser">
        <button type="button" class="px-5 py-3 mb-4 text-sm font-medium text-white bg-gray-800 rounded-xl hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 cursor-pointer">
            Tambah Konser
        </button>
    </a>

    <div class="relative overflow-x-auto shadow-md rounded-lg bg-white">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs uppercase bg-gray-100 text-gray-600">
                <tr>
                    <th scope="col" class="px-6 py-3">Judul Konser</th>
                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                    <th scope="col" class="px-6 py-3">Ketersediaan Tiket</th>
                    <th scope="col" class="px-6 py-3">Gambar</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($konser as $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-4 font-semibold text-gray-900">{{ $item->judul }}</td>
                        <td class="px-6 py-4">{{ $item->kategori->nama ?? 'Tanpa Kategori' }}</td>
                        <td class="px-6 py-4">{{ Str::limit($item->deskripsi, 50) }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 text-xs font-semibold rounded-lg
                                {{ $item->ketersediaan_tiket ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $item->ketersediaan_tiket ? 'Tersedia' : 'Tidak Tersedia' }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset($item->gambar) }}" alt="Gambar Konser" class="w-20 h-20 object-cover rounded-lg shadow">
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('konser.edit', $item->id) }}" class="text-blue-600 hover:underline">
                                ✏️ Edit
                            </a>
                            |
                            <form action="{{ route('konser.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus konser ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline cursor-pointer">
                                    🗑 Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
