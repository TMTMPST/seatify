@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="w-full mx-auto">
            @csrf
            <div class="lg:grid lg:grid-cols-2 gap-5">
                <div class="mb-5">
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900">ID Pengguna</label>
                    <input type="text" id="id" name="id" value="{{ $user->id }}" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" disabled />
                </div>
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" required />
                </div>
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Kata Sandi Baru (Kosongkan jika tidak ingin mengganti)</label>
                    <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" />
                </div>
                <div class="mb-5">
                    <label for="level" class="block mb-2 text-sm font-medium text-gray-900">Level</label>
                    <select id="level" name="level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-full p-2.5" required>
                        <option value="0" {{ $user->level == 0 ? 'selected' : '' }}>Admin</option>
                        <option value="1" {{ $user->level == 1 ? 'selected' : '' }}>User</option>
                    </select>  
                </div>      
            </div>
            <div class="flex flex-row space-x-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">
                    Edit Pengguna
                </button>
                <a href="{{ route('admin.users') }}" class="text-gray-600 bg-gray-200 hover:bg-gray-300 font-medium rounded-xl text-sm px-5 py-2.5 text-center cursor-pointer">
                    Kembali
                </a>
            </div>
        </form>  
    </div>
@endsection
