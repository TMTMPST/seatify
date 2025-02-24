@extends('layouts.app')
@section('content')
<section class="">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">
        <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Rasakan Euforia Konser Tak Terlupakan</h1>
        <p class="mb-8 text-lg font-bold tracking-tight leading-none text-gray-300 md:text-5xl lg:text-2xl">Pesan tiket konser favoritmu dengan mudah dan cepat. Jadilah bagian dari momen spektakuler yang penuh semangat dan kenangan indah!</p>
        <button type="button" class="text-blue-900 bg-white hover:bg-gray-300 cursor-pointer font-medium rounded-full text-md px-6 py-4 text-center inline-flex items-center">
            Temukan Konser
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </button>
        {{-- <div class="flex flex-wrap justify-left gap-1">
            <button type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-300 cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎸 Rock
            </button>
            <button type="button" class="text-white bg-transparent border-2 border-white focus:outline-none hover:bg-white hover:border-white hover:text-gray-900 cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎙️ Pop
            </button>
            <button type="button" class="text-white bg-transparent border-2 border-white focus:outline-none hover:bg-white hover:border-white hover:text-gray-900 cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out">
                🎶 Jazz
            </button>
        </div>               --}}
    </div>
</section>
@endsection
