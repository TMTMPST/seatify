@extends('layouts.admin')
@section('admin')
    <a href="/admin/konser/tambah-band">
        <button type="button" class="px-5 py-3 mb-4 text-sm font-medium text-white bg-gray-800 rounded-xl hover:bg-gray-900 focus:ring-4 focus:ring-gray-300 cursor-pointer">
            Tambah Band
        </button>
    </a>
    <div class="relative overflow-x-auto shadow-sm rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Band</th>
                    <th scope="col" class="px-6 py-3">Deskripsi Band</th>
                    <th scope="col" class="px-6 py-3">Anggota Band</th>
                    <th scope="col" class="px-6 py-3">Social Media</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bands as $band)
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $band->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ \Illuminate\Support\Str::words($band->description, 50, '...') }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $band->members->count() }} anggota
                    </td>
                    <td class="px-6 py-4">
                        @foreach ($band->socialMedia as $social)
                            <a href="{{ $social->url }}" target="_blank" class="text-blue-500 hover:underline">
                                {{ ucfirst($social->platform) }}
                            </a><br>
                        @endforeach
                    </td>
                    {{-- <td class="px-6 py-4">
                        <a href="{{ route('band.edit', $band->id) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                    </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
