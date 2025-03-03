@extends('layouts.admin')

@section('admin')
    <h1 class="mb-5 text-lg font-medium">Data Pengguna</h1>

    <div class="relative overflow-x-auto shadow-sm rounded-xl">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Level</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @php
                                $levels = ['Admin', 'User', 'Unknown'];
                                $levelText = $levels[$user->level] ?? 'Unknown';
                            @endphp
                            <span class="{{ $user->level > 1 ? 'text-gray-600' : '' }}">
                                {{ $levelText }}
                            </span>
                        </td>
                        <td class="px-6 py-4 flex gap-2">
                            <x-widget.admin.action-button href="{{ route('admin.users.edit', $user->id) }}" color="blue" label="Edit" />
                            <x-widget.admin.delete-form action="{{ route('admin.users.delete', $user->id) }}" confirm="Yakin ingin menghapus pengguna ini?" />
                        </td>
                    </tr>
                @endforeach            
            </tbody>
        </table>
    </div>
@endsection
