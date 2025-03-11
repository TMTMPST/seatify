@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.band.store') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
            <div class="lg:grid lg:grid-cols-2 gap-5">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900" for="banner_image">Upload Banner Band</label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" id="banner_image" type="file" name="banner_image" required>
                </div>        
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Band</label>
                    <input type="text" id="name" name="name" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Band" required />
                </div>
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-xl border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis Deskripsi Band...."></textarea>            
            </div>
            <div class="flex flex-row space-x-2">
                <a href="{{ route('admin.band.index') }}">
                    <button type="button" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Kembali</button>
                </a>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">Buat Data</button>
            </div>
        </form>  
    </div>
@endsection
