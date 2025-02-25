@extends('layouts.app')
@section('content')
<section>
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:pt-16">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold text-white md:text-5xl lg:text-6xl">
                Konser Slank
            </h1>
            <button type="button" class="w-11 h-11 flex items-center justify-center rounded-full border border-white text-white hover:bg-white hover:text-gray-900 transition-all duration-300">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.5 3a3.5 3.5 0 0 0-3.456 4.06L8.143 9.704a3.5 3.5 0 1 0-.01 4.6l5.91 2.65a3.5 3.5 0 1 0 .863-1.805l-5.94-2.662a3.53 3.53 0 0 0 .002-.961l5.948-2.667A3.5 3.5 0 1 0 17.5 3Z"/>
                </svg>                  
            </button>
        </div>       
        <hr class="h-px my-8 border-gray-100 border-dashed">
        <div class="flex flex-wrap gap-2 mb-8 font-medium">
            @foreach(['biodata' => '📝 Bio Artis', 'tiket' => '🎫 Tiket'] as $section => $label)
                <button type="button" class="toggle-btn text-sm px-6 py-3 rounded-full border-2 border-blue-700 transition-all duration-300"
                    data-section="{{ $section }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
    </div>
    <div id="biodata" class="toggle-section">
        @component('components.ui.biodata_artis') @endcomponent
    </div>
    <div id="tiket" class="toggle-section hidden">
        @component('components.ui.tiket_konser') @endcomponent
    </div>
</section> 
@endsection
