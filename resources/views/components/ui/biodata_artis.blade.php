<section class="bg-white rounded-t-xl">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 space-y-8">
        <div class="relative w-full h-64 rounded-xl overflow-hidden">
            {{-- Banner --}}
            <img src="https://asset.kompas.com/crops/j1ffU8AGsX0ErfVbDQNJ1VfbKm4=/0x0:830x553/1200x800/data/photo/2022/01/19/61e7bd87982b5.jpg" alt="Banner Band" class="w-full h-full object-cover bg-center">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <h1 class="text-4xl font-bold text-white">Slank</h1>
            </div>
        </div>
        <div class="space-y-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Tentang Band</h2>
                <p class="text-gray-900 mt-2 font-medium text-md">Slank awalnya terbentuk dari grup musik sekolah...</p>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Anggota Band</h2>
                <p class="text-gray-900 mt-2 font-medium text-md">Formasi Band Slank Sekarang :</p>
                <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">
                    @foreach ($anggota as $member)
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
                </div>                               
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">📈 Lagu Populer</h2>
                <div class="space-y-4 mt-5 grid grid-cols-1 lg:grid-cols-2 gap-2">
                    @foreach ($lagu as $song)
                        <iframe style="border-radius:12px" src="{{ $song }}" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-gray-800">🌐 Media Sosial</h2>
                <div class="flex space-x-1 mt-4">
                    <a href="https://www.instagram.com/slankdotcom" class="" target="_blank">
                        <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer me-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"  class="w-5 h-5 me-2 ms-1 text-gray-800" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172."/>
                            </svg>
                            Instagram
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
