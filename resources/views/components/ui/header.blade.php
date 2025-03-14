@extends('layouts.component')
@section('header')
<section class="bg-white rounded-t-xl">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">
        <h1 class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray md:text-5xl lg:text-4xl">
            Trending Konser
        </h1>
        @php $genres = ['rock' => '🎸 Rock', 'pop' => '🎙️ Pop', 'jazz' => '🎶 Jazz']; @endphp
        <div class="flex flex-wrap justify-left gap-1 mb-8">
            @foreach ($genres as $genre => $label)
                <button type="button" class="genre-btn {{ $loop->first ? 'bg-blue-700 text-white' : 'bg-gray-100 text-gray' }} border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" 
                    data-genre="{{ $genre }}">
                    {{ $label }}
                </button>
            @endforeach
        </div>
        @foreach ($genres as $genre => $label)
            <div id="{{ $genre }}" class="genre-widget {{ $loop->first ? '' : 'hidden' }}">
                @include("components.widget.{$genre}_concert")
            </div>
        @endforeach
    </div>
    @include('components.widget.banner')
    <x-benefit />
</section>
@endsection
