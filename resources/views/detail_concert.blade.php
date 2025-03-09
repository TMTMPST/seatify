@extends('layouts.app')
@section('content')
<section>
    <div id="biodata" class="toggle-section">
        <x-band-biodata />
    </div>    
    <div id="tiket" class="toggle-section hidden">
        @component('components.ui.tiket_konser') @endcomponent
    </div>    
</section> 
<script src="{{ asset('js/detailConcert.js') }}"></script>
@endsection
