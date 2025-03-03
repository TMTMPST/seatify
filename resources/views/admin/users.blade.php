@extends('layouts.admin')

@section('admin')
    <h1 class="mb-5 text-lg font-medium">Data Pengguna</h1>
    <div class="relative overflow-x-auto shadow-sm rounded-xl">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Level</th>
                    <th scope="col" class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @if($user->level == 0)
                                <span>Admin</span>
                            @elseif($user->level == 1)
                                <span>User</span>
                            @else
                                <span class="text-gray-600">Unknown</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <!-- Tombol Edit langsung menuju halaman edit dengan ID -->
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-600 hover:underline font-semibold cursor-pointer">
                                Edit
                            </a>
                            <!-- Tombol Hapus -->
                            <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline font-semibold cursor-pointer" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    </div>
@endsection
