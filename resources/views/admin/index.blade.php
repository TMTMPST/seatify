@extends('layouts.admin')
@section('admin')
    @include('components.widget.admin.overview')
    <hr class="h-px my-8 bg-gray-200 border-0">
    @include("components.widget.admin.data_konser")
@endsection