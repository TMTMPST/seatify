@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.band.social.store', ['band' => $band->id]) }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
            <input type="hidden" name="band_id" value="{{ $band->id }}">
            
            <div class="mb-5">
                <label for="platform" class="block mb-2 text-sm font-medium text-gray-900">Platform</label>
                <input type="text" name="platform" id="platform" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Platform (misal: Instagram)" required />
            </div>

            <div class="mb-5">
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900">URL Social Media</label>
                <input type="text" name="url" id="url" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="URL Social Media" required />
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