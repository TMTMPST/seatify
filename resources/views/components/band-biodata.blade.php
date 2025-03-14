@if ($band)
    <section class="bg-white rounded-t-xl">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 space-y-8">
            <div class="flex flex-row justify-between gap-8">
                <!-- Image Banner -->
                <div class="w-full">
                    <img src="{{ $band->banner_image }}" alt="{{ $band->name }}" class="w-full h-80 object-cover bg-center flex items-center justify-center rounded-xl" />
                </div>
                <!-- Ticket Information -->
                <div class="bg-white border border-gray-200 h-80 px-6 py-5 rounded-xl max-w-sm w-full flex-col lg:flex hidden">
                    <h2 class="text-xl font-semibold mb-6">Informasi Tiket</h2>
                    <div class="flex-1 space-y-6">
                        <ul class="space-y-4">
                            <li class="flex justify-between">
                                <span class="font-medium">Tiket Regular</span>
                                <span class="font-bold">Rp 200.000</span>
                            </li>
                            <li class="flex justify-between">
                                <span class="font-medium">Tiket VIP</span>
                                <span class="font-bold">+ Rp 100.000</span>
                            </li>
                        </ul>
                        <div class="w-full bg-gray-200 text-gray-900 text-left py-3 px-3 rounded-xl text-sm font-medium">Biaya tambahan mungkin dikenakan</div>
                    </div>                
                    <a href="/detail-konser/1/tiket">
                        <button class="mt-auto w-full bg-blue-700 hover:bg-blue-800 cursor-pointer text-white py-3 rounded-xl font-medium ">Beli Tiket</button>
                    </a>
                </div>                         
            </div>
            <!-- Band Information -->
            <div>
                <h1 class="text-3xl font-bold">{{ $band->name }}</h1>
                <p class="mt-2 text-gray-700">{{ $band->description }}</p>
                <div class="mt-5">
                    <h1 class="text-3xl font-bold">Band Member</h1>
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-3 justify-left gap-5">
                        @if ($band->members->isNotEmpty())
                            @foreach ($band->members as $index => $member)
                                <div class="w-full bg-white border border-gray-200 rounded-xl p-4 text-center transition-shadow duration-300 ease-in-out hover:shadow-md">
                                    <img class="mx-auto w-24 h-24 rounded-full bg-gray-200" src="{{ $member->image }}" alt="{{ $member->name }}">
                                    <h3 class="mt-4 text-lg font-semibold text-gray-900">{{ $member->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $member->role }}</p>
                                </div>
                            @endforeach                           
                        @endif
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-3xl font-bold">Lagu Terpopuler</h1>
                    <div class="space-y-4 mt-5 grid grid-cols-1 lg:grid-cols-2 gap-2">
                        @foreach ($band->songs as $song)
                            <iframe style="border-radius:12px" src="{{ $song->spotify_url }}" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5">
                    <h1 class="text-3xl font-bold">Social Media</h1>
                    <div class="flex space-x-1 mt-4">
                        @foreach ($band->socialMedia as $social)
                            <a href="{{ $social->url }}" class="" target="_blank">
                                <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium rounded-lg text-sm px-2.5 py-2.5 text-center inline-flex items-center cursor-pointer me-2 mb-2">
                                    <svg class="w-5 h-5 me-2 ms-1 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                                    </svg>                                      
                                    {{ $social->platform }}
                                </button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('components.widget.bottominformation') --}}
    @include('components.widget.bottombar')
@endif
