@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <div class="flex space-x-4 mb-4">
            <button onclick="showForm('editBand')" class="px-4 py-2 text-white bg-blue-600 rounded-xl hover:bg-blue-700">Edit Band</button>
            <button onclick="showForm('editMember')" class="px-4 py-2 text-white bg-green-600 rounded-xl hover:bg-green-700">Edit Anggota Band</button>
            <button onclick="showForm('editSocial')" class="px-4 py-2 text-white bg-purple-600 rounded-xl hover:bg-purple-700">Edit Social Media</button>
        </div>

        {{-- Form Edit Band --}}
        <form id="editBand" action="{{ route('admin.band.update', $band->id) }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto bg-white p-5 rounded-xl shadow">
            @csrf
            @method('PUT')
            <h2 class="text-lg font-semibold mb-4">Edit Band</h2>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Band</label>
                <input type="text" name="name" id="name" value="{{ $band->name }}" class="border rounded-lg w-full p-2">
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Band</label>
                <textarea name="description" id="description" class="border rounded-lg w-full p-2">{{ $band->description }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Update Band</button>
        </form>

        {{-- Form Edit Anggota Band --}}
            {{-- <form id="editMember" action="{{ route('admin.band.member.update', $member->id) }}" method="POST" class="w-full mx-auto bg-white p-5 rounded-xl shadow hidden">
                @csrf
                @method('PUT')
                <h2 class="text-lg font-semibold mb-4">Edit Anggota Band</h2>
                <div class="mb-4">
                    <label for="member_name" class="block text-sm font-medium text-gray-700">Nama Anggota</label>
                    <input type="text" name="member_name" id="member_name" value="{{ $member->name }}" class="border rounded-lg w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-700">Peran dalam Band</label>
                    <input type="text" name="role" id="role" value="{{ $member->role }}" class="border rounded-lg w-full p-2">
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-green-600 rounded-lg hover:bg-green-700">Update Anggota</button>
            </form> --}}

        {{-- Form Edit Social Media --}}
        @if(isset($social))
            <form action="{{ route('admin.band.social.update', ['band' => $band->id, 'social' => $social->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="platform" class="block text-sm font-medium text-gray-700">Platform</label>
                    <input type="text" name="platform" id="platform" value="{{ old('platform', $social->platform ?? '') }}" class="border rounded-lg w-full p-2">
                </div>
                <div class="mb-4">
                    <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url', $social->url ?? '') }}" class="border rounded-lg w-full p-2">
                </div>
                <button type="submit" class="px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700">Update Social Media</button>
            </form>
        @else
            <p class="text-red-500">Data social media tidak ditemukan.</p>
        @endif     
    </div>

    <script>
        function showForm(formId) {
            document.getElementById('editBand').classList.add('hidden');
            document.getElementById('editMember').classList.add('hidden');
            document.getElementById('editSocial').classList.add('hidden');
            document.getElementById(formId).classList.remove('hidden');
        }
    </script>
@endsection
