@extends('layouts.admin')
@section('admin')
    @include('components.widget.admin.overview')
    <hr class="h-px my-8 bg-gray-200 border-0">
    <button type="button" class="px-5 py-3 mb-4 text-base font-medium text-center text-white bg-blue-800 rounded-xl cursor-pointer hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300">
        Tambah Konser
    </button>
    @include('components.widget.rock_concert')
@endsection