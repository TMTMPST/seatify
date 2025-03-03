@extends('layouts.admin')
@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form class="w-full mx-auto">
            <div class="lg:grid lg:grid-cols-2 gap-5">
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Kategori Konser</label>
                    <select id="dropdown" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Pilih opsi</option>
                        <option value="option1">Opsi 1</option>
                        <option value="option2">Opsi 2</option>
                        <option value="option3">Opsi 3</option>
                    </select>                
                </div>
                <div class="mb-5">
                    <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Artis Band</label>
                    <select id="dropdown" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        <option value="" disabled selected>Pilih opsi</option>
                        <option value="option1">Opsi 1</option>
                        <option value="option2">Opsi 2</option>
                        <option value="option3">Opsi 3</option>
                    </select> 
                </div>
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Judul Konser</label>
                <input type="text" id="text" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Judul Konser" required />
            </div>
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                <input type="text" id="text" class="shadow-xs bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Deskripsi" required />
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Poster Konser</label>
                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " aria-describedby="user_avatar_help" id="user_avatar" type="file">            
            </div>        
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Selanjutnya</button>
        </form>  
    </div>
@endsection