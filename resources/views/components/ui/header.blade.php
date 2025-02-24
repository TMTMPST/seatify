@extends('layouts.component')
@section('component')
<section class="bg-white rounded-t-xl">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16">
        <h1 class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray md:text-5xl lg:text-4xl">Trending Konser</h1>
        <div class="flex flex-wrap justify-left gap-1 mb-8">
            <button type="button" class="genre-btn text-white bg-blue-800 border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-genre="rock">
                🎸 Rock
            </button>
            <button type="button" class="genre-btn text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-genre="pop">
                🎙️ Pop
            </button>
            <button type="button" class="genre-btn text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-genre="jazz">
                🎶 Jazz
            </button>
        </div>
        
        <!-- Widget -->
        <div id="rock" class="genre-widget">
            @include('components.widget.rock_concert')
        </div>
        <div id="pop" class="genre-widget hidden">
            @include('components.widget.pop_concert')
        </div>
        <div id="jazz" class="genre-widget hidden">
            @include('components.widget.jazz_concert')
        </div>                 
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.genre-btn');
        const widgets = document.querySelectorAll('.genre-widget');
    
        // Fungsi untuk mengubah tampilan widget
        function showWidget(genre) {
            widgets.forEach(widget => {
                widget.classList.add('hidden');
            });
            document.getElementById(genre).classList.remove('hidden');
    
            // Atur tampilan tombol aktif
            buttons.forEach(btn => {
                if (btn.dataset.genre === genre) {
                    btn.classList.add('bg-blue-800', 'text-white');
                    btn.classList.remove('bg-gray-100', 'text-gray');
                } else {
                    btn.classList.add('bg-gray-100', 'text-gray');
                    btn.classList.remove('bg-blue-800', 'text-white');
                }
            });
        }
    
        // Set default ke rock
        showWidget('rock');
    
        // Event listener untuk setiap tombol
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const genre = button.dataset.genre;
                showWidget(genre);
            });
        });
    });
    </script>
    
@endsection
