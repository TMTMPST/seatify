@extends('layouts.admin')
@section('admin')
    <a href="/admin/konser/tambah-artis">
        <button type="button" class="px-5 py-3 mb-4 text-base font-medium text-center text-white bg-blue-800 rounded-xl cursor-pointer hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300">
            Tambah Artis
        </button>
    </a>
    <div class="relative overflow-x-auto shadow-sm rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Band
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi Band
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Anggota Band
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Social Media
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection