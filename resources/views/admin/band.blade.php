@extends('layouts.admin')

@section('admin')
    <a href="/admin/band/tambah-band">
        <button type="button" class="px-5 py-3 mb-4 text-sm font-medium text-white bg-gray-800 rounded-xl hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 cursor-pointer">
            Tambah Band
        </button>
    </a>
    <div class="relative overflow-visible shadow-sm rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 rounded-xl">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Band</th>
                    <th scope="col" class="px-6 py-3">Deskripsi Band</th>
                    <th scope="col" class="px-6 py-3">Anggota</th>
                    <th scope="col" class="px-6 py-3">Social Media</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="rounded-xl">
                @foreach ($bands as $band)
                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $band->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ \Illuminate\Support\Str::words($band->description, 10, '...') }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($band->members->count() > 0)
                                {{ $band->members->count() }} Anggota
                            @else
                                <a href="{{ route('admin.band.anggota.create', $band->id) }}" class="text-blue-500 hover:underline">
                                    Tambah Anggota
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if ($band->socialMedia->count() > 0)
                                @foreach ($band->socialMedia as $social)
                                    <a href="{{ $social->url }}" target="_blank" class="text-blue-500 hover:underline">
                                        {{ ucfirst($social->platform) }}
                                    </a><br>
                                @endforeach
                            @else
                                <a href="{{ route('admin.band.social.create', $band->id) }}" class="text-blue-500 hover:underline">
                                    Tambah Social Media
                                </a>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center relative">
                            <div class="inline-block text-left">
                                <button onclick="toggleDropdown(this)" class="px-3 py-1 text-gray-500 bg-gray-200 rounded-lg hover:bg-blue-400 cursor-pointer">
                                    ⋮
                                </button>
                                <div class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-50">
                                    <a href="{{ route('admin.band.edit', $band->id) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">✏️ Edit Band</a>
                                    <a href="{{ route('admin.band.anggota.edit', ['band' => $band->id, 'anggota' => $band->members->first()->id]) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">👥 Edit Anggota</a>
                                    @if($band->socialMedia->count() > 0)
                                            <a href="{{ route('admin.band.social.edit', ['band' => $band->id, 'social' => $band->socialMedia->first()->id]) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🌐 Edit Social Media</a>
                                        @else
                                            <a href="{{ route('admin.band.social.create', ['band' => $band->id]) }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">🌐 Tambah Social Media</a>
                                        @endif
                                    <hr class="border-gray-200">
                                    <form action="{{ route('admin.band.destroy', $band->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus band ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">🗑 Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>                                     
                    </tr>
                @endforeach
            </tbody>                
        </table>
    </div>
    <script>
        function toggleDropdown(button) {
            let dropdown = button.nextElementSibling;
            dropdown.classList.toggle('hidden');

            // Menutup dropdown lain jika ada
            document.addEventListener('click', function (event) {
                if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                    dropdown.classList.add('hidden');
                }
            }, { once: true });
        }
    </script>
@endsection
