<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            @foreach ($menuItems as $item)
                <li>
                    <a href="{{ $item['url'] }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="{{ $item['iconViewBox'] }}">
                            {!! $item['iconPath'] !!}
                        </svg>
                        <span class="ms-3">{{ $item['label'] }}</span>
                        @if (isset($item['badge']))
                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
