<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
            @foreach ($menuItems as $item)
                <li>
                    <a href="{{ $item['url'] }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100 group">
                        {!! $item['iconPath'] !!}
                        <span class="ms-3">{{ $item['label'] }}</span>
                        @if (isset($item['badge']))
                            <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full">{{ $item['badge'] }}</span>
                        @endif
                    </a>
                </li>
            @endforeach
            <hr class="h-px bg-gray-200 border-0">
            <li>
                <form action="{{ route('logout') }}" method="POST" class="cursor-pointer flex items-center p-2 text-red-500 rounded-lg hover:bg-gray-100 group">
                    @csrf
                    <svg class="w-5 h-5 text-red-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M14 19V5h4a1 1 0 0 1 1 1v11h1a1 1 0 0 1 0 2h-6Z"/>
                        <path fill-rule="evenodd" d="M12 4.571a1 1 0 0 0-1.275-.961l-5 1.428A1 1 0 0 0 5 6v11H4a1 1 0 0 0 0 2h1.86l4.865 1.39A1 1 0 0 0 12 19.43V4.57ZM10 11a1 1 0 0 1 1 1v.5a1 1 0 0 1-2 0V12a1 1 0 0 1 1-1Z" clip-rule="evenodd"/>
                    </svg>                      
                    <button class="cursor-pointer px-2 ms-2">
                        Keluar
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>
