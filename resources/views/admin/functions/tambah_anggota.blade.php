@extends('layouts.admin')

@section('admin')
    <div class="bg-gray-100 p-5 rounded-xl">
        <form action="{{ route('admin.band.store') }}" method="POST" enctype="multipart/form-data" class="w-full mx-auto">
            @csrf
        </form>
    </div>
@endsection