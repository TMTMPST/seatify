<footer class="bg-white">
    <div class="mx-auto w-full max-w-screen-xl p-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="javascript:void(0)" class="flex items-center">
                    <img src="{{ asset('images/Seatify.png') }}" class="h-8 me-3" alt="Seatify Logo" />
                    <span class="text-2xl font-semibold whitespace-nowrap">Seatify</span>
                </a>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                @foreach([
                    'Repository' => ['Github' => 'https://github.com/ckckckcz/seatify'],
                    'Developer' => [
                        'Riovaldo' => 'https://github.com/ckckckcz',
                        'Vidi' => 'https://github.com/TMTMPST'
                    ]
                ] as $title => $links)
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">{{ $title }}</h2>
                        <ul class="text-gray-500 font-medium">
                            @foreach($links as $name => $url)
                                <li class="mb-4">
                                    <a href="{{ $url }}" class="hover:underline">{{ $name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
        <hr class="my-6 border-gray-200" />
        <span class="text-sm text-gray-500 text-center block">
            © 2025 <a href="https://flowbite.com/" class="hover:underline">Seatify™</a>. All Rights Reserved.
        </span>
    </div>
</footer>