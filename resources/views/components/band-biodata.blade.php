@if ($band)
    <section class="bg-white rounded-t-xl">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 space-y-8">
            <div class="relative w-full h-64 rounded-xl overflow-hidden">
                {{-- Banner --}}
                <img src="{{ $band->banner_image }}" alt="{{ $band->name }}" class="w-full h-full object-cover bg-center">
                <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                    <h1 class="text-4xl font-bold text-white">{{ $band->name }}</h1>
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Tentang Band</h2>
                    <p class="text-gray-900 mt-2 font-medium text-md">{{ $band->description }}</p>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Anggota Band</h2>
                    <p class="text-gray-900 mt-2 font-medium text-md">Formasi Band Slank Sekarang :</p>
                    <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                        @if ($band->members->isNotEmpty())
                            @foreach ($band->members as $member)
                                <div class="relative group max-w-sm bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
                                    <div class="relative">
                                        <img class="rounded-t-lg w-full" src="{{ $member->image }}" alt="{{ $member->name }}" />
                                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-500 ease-in-out">
                                            <div class="absolute bottom-4 left-4 ml-3 transform scale-90 opacity-0 group-hover:scale-100 group-hover:opacity-100 transition-all duration-500">
                                                <h5 class="text-xl font-bold text-white">{{ $member->name }}</h5>
                                                <p class="text-white">{{ $member->role }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>                               
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">📈 Lagu Populer</h2>
                    <div class="space-y-4 mt-5 grid grid-cols-1 lg:grid-cols-2 gap-2">
                        @foreach ($band->songs as $song)
                            <iframe style="border-radius:12px" src="{{ $song->spotify_url }}" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">🌐 Media Sosial</h2>
                    <div class="flex space-x-1 mt-4">
                        @foreach ($band->socialMedia as $social)
                            <a href="{{ $social->url }}" class="" target="_blank">
                                <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer me-2 mb-2">
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
@endif