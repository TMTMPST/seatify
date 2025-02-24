@extends('layouts.component')
@section('component')
<section class="bg-white rounded-t-xl">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">
        <h1 class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray md:text-5xl lg:text-4xl">Trending Konser</h1>
        <div class="flex flex-wrap justify-left gap-1 mb-8">
            <button type="button" class="text-white bg-blue-800 border border-gray-300 focus:outline-none hover:bg-blue-900 cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎸 Rock
            </button>
            <button type="button" class="text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none hover:bg-gray-200     cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎙️ Pop
            </button>
            <button type="button" class="text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none hover:bg-gray-200     cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎶 Jazz
            </button>
        </div>     
        @include('components.widget.rock_concert')         
        @include('components.widget.pop_concert')         
        @include('components.widget.jazz_concert')         
    </div>
</section>
@endsection
