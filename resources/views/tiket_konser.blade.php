@extends('layouts.app')
@section('content')
    <section class="bg-white rounded-t-xl">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 space-y-5">
            <a href="/detail-konser/1">
                <button type="button" class="text-gray-900 border-2 border-gray-100 bg-white hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-100 cursor-pointer font-medium rounded-xl text-sm px-6 py-2.5 text-center inline-flex items-center">
                    <svg class="w-6 h-6 me-2 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>                  
                    Kembali
                </button>
            </a>
            <div class="flex flex-col mt-5 justify-between">
                <!-- Card Event -->
                <div class="inline-flex items-center rounded-t-xl bg-blue-200 px-4 py-2 lg:text-md text-sm gap-1 font-medium text-blue-700 justify-between">
                    <div class="flex gap-1 text-center relative justify-center items-center">
                        <svg class="w-6 h-6 text-blue-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.122 17.645a7.185 7.185 0 0 1-2.656 2.495 7.06 7.06 0 0 1-3.52.853 6.617 6.617 0 0 1-3.306-.718 6.73 6.73 0 0 1-2.54-2.266c-2.672-4.57.287-8.846.887-9.668A4.448 4.448 0 0 0 8.07 6.31 4.49 4.49 0 0 0 7.997 4c1.284.965 6.43 3.258 5.525 10.631 1.496-1.136 2.7-3.046 2.846-6.216 1.43 1.061 3.985 5.462 1.754 9.23Z"/>
                        </svg>                                                         
                        Hampir Habis
                    </div>
                    <div>
                        Berakhir 1 Mar 2025 | 23.59
                    </div>
                </div>
                <!-- Card Body -->
                <div id="open-modal" class="flex items-center justify-between rounded-b-xl bg-white p-4 border-2 border-gray-100 hover:border-blue-700 cursor-pointer transition-all duration-300 ease-in-out">
                    <div class="flex items-start space-x-4">
                        <div class="text-left pr-2 flex flex-col justify-between h-full">
                            <p class="text-xl font-bold text-gray-800">Mar 2</p>
                            <p class="text-xl text-gray-500">SENIN</p>
                            <p class="text-xl font-medium text-gray-700">21.00</p>
                        </div>
                        <div class="border-l border-gray-300 pl-5 border-dashed">
                            <h3 class="text-xl font-bold text-gray-900">Slank</h3>
                            <p class="text-sm text-gray-600">Malang Creative Center</p>
                            <p class="text-sm text-gray-500 flex flex-row">Malang, Indonesia</p>
                            <div class="mt-2">
                                <p class="text-sm text-gray-700">💰 Mulai dari <strong>Rp 200.000</strong></p>
                                <p class="text-sm text-gray-700">🚪 Pintu dibuka: 7:00 PM</p>
                                <p class="text-sm text-gray-700">🎸 Special Guest: Sheila on 7</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
            <div class="flex items-center justify-between rounded-xl bg-gray-100 p-4 border-2 border-gray-200">
                <div class="flex items-start space-x-4">
                    <div class="text-left pr-2 flex flex-col justify-between h-full">
                        <p class="text-xl font-bold text-gray-400">AUG 10</p>
                        <p class="text-xl text-gray-400">SAT</p>
                        <p class="text-xl font-medium text-gray-400">8:00 PM</p>
                    </div>
                    <div class="border-l border-gray-300 pl-5 border-dashed">
                        <h3 class="text-xl font-bold text-gray-400">Slank</h3>
                        <p class="text-sm text-gray-400">Stadion Madya Senayan</p>
                        <p class="text-sm text-gray-400">Jakarta, Indonesia</p>
                        <div class="mt-2">
                            <p class="text-sm text-gray-400">💰 Mulai dari <strong>Rp 1.500.000</strong></p>
                            <p class="text-sm text-gray-400">🚪 Pintu dibuka: 6:00 PM</p>
                            <p class="text-sm text-gray-400">🎸 Special Guest: Tulus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between rounded-xl bg-gray-100 p-4 border-2 border-gray-200">
                <div class="flex items-start space-x-4">
                    <div class="text-left pr-2 flex flex-col justify-between h-full">
                        <p class="text-xl font-bold text-gray-400">AUG 10</p>
                        <p class="text-xl text-gray-400">SAT</p>
                        <p class="text-xl font-medium text-gray-400">8:00 PM</p>
                    </div>
                    <div class="border-l border-gray-300 pl-5 border-dashed">
                        <h3 class="text-xl font-bold text-gray-400">Slank</h3>
                        <p class="text-sm text-gray-400">Stadion Madya Senayan</p>
                        <p class="text-sm text-gray-400">Jakarta, Indonesia</p>
                        <div class="mt-2">
                            <p class="text-sm text-gray-400">💰 Mulai dari <strong>Rp 1.500.000</strong></p>
                            <p class="text-sm text-gray-400">🚪 Pintu dibuka: 6:00 PM</p>
                            <p class="text-sm text-gray-400">🎸 Special Guest: Tulus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/buyTickets.js') }}"></script>
    @include('components.widget.pembayaran_tiket')

@endsection



