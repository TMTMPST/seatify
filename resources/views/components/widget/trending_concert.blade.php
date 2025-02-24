<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach ($concerts as $concert)
    <div class="max-w-sm bg-white border border-gray-200 rounded-xl shadow-sm">
        <a href="{{ $concert['link'] }}">
            <img class="rounded-t-xl w-full h-48 object-cover" src="{{ asset($concert['image']) }}" alt="{{ $concert['band'] }}">
        </a>
        <div class="p-5">
            <a href="{{ $concert['link'] }}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $concert['title'] }}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700">{{ $concert['description'] }}</p>
            <a href="{{ $concert['link'] }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                Beli Tiket
                <svg class="w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
            </a>
        </div>
    </div>
    @endforeach
</div>
