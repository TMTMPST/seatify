@extends('layouts.app')
@section('content')
<section class="">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:pt-16">
        <div class="flex flex-row justify-between items-center mb-8">
            <h1 class="text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                Konser Slank
            </h1>
            <button type="button" class="w-11 h-11 mt-1 flex items-center justify-center rounded-full border cursor-pointer border-white text-white hover:bg-white hover:text-gray-900 transition-all duration-300">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.5 3a3.5 3.5 0 0 0-3.456 4.06L8.143 9.704a3.5 3.5 0 1 0-.01 4.6l5.91 2.65a3.5 3.5 0 1 0 .863-1.805l-5.94-2.662a3.53 3.53 0 0 0 .002-.961l5.948-2.667A3.5 3.5 0 1 0 17.5 3Z"/>
                </svg>                  
            </button>
        </div>       
        <div class="flex flex-wrap justify-left gap-1 mb-8">
            <button type="button" class="= text-white bg-blue-800 border-2 border-blue-800 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-md px-8 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-genre="rock">
                Bio Artis
            </button>
            <button type="button" class="= text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-md px-8 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-genre="pop">
                Tiket
            </button>
        </div> 
        <hr class="h-px my-8 border-1 border-gray-100 mb-8 border-dashed">
        <div class="flex flex-col mb-8">
            <h1 class="text-lg font-bold tracking-tight leading-none text-white md:text-xl lg:text-2xl mb-4">
                Lokasi Konser
            </h1>
            <div class="flex flex-row gap-2">
                <button type="button" class="w-11 h-11 mt-1 flex items-center justify-center rounded-full border cursor-pointer border-white bg-white text-blue-900 hover:bg-gray-200  transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                    </svg>                                        
                </button>                
                <button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" data-dropdown-placement="bottom" class="text-white bg-blue-800 cursor-pointer  font-medium rounded-full text-sm px-5 py-3 mt-1 text-center inline-flex items-center" type="button">
                    <p>Pilih Kota</p>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>     
                <div id="dropdownSearch" class="z-10 hidden bg-white rounded-lg shadow-sm w-60">
                    <div class="p-4">
                        <label for="input-group-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="input-group-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Lokasi">
                        </div>
                    </div>
                    <div class="h-48 px-3 pb-3 overflow-y-auto text-sm">
                        list kota
                    </div>
                </div>    
            </div>
        </div>
    </div>
</section>
@include('components.ui.tiket_konser')
@endsection
