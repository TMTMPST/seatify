@extends('layouts.app')
    @section('content')
    <div id="biodata" class="toggle-section">
        <x-band-biodata />
    </div>   
    <script src="{{ asset('js/detailConcert.js') }}"></script>
@endsection
