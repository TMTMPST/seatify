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
        <hr class="h-px my-8 border-1 border-gray-100 mb-8 border-dashed">
        <div class="flex flex-wrap justify-left gap-1 mb-8">
            <button type="button" class="toggle-btn text-white bg-blue-800 border-2 border-blue-800 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-section="biodata">
                📝 Bio Artis
            </button>
            <button type="button" class="toggle-btn text-gray bg-gray-100 border-2 border-gray-200 focus:outline-none cursor-pointer focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-6 py-3 me-2 mb-2 transition-all duration-300 ease-in-out" data-section="tiket">
                🎫 Tiket
            </button>
        </div>
    </div>
    <div id="biodata" class="toggle-section">
        @component('components.ui.biodata_artis')
        @endcomponent
    </div>
    <div id="tiket" class="toggle-section hidden">
        @component('components.ui.tiket_konser')
        @endcomponent
    </div>
</section> 

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.toggle-btn');
        const sections = document.querySelectorAll('.toggle-section');

        function showSection(sectionId) {
            sections.forEach(section => {
                section.classList.add('hidden');
            });

            const target = document.getElementById(sectionId);
            if (target) {
                target.classList.remove('hidden');
            }

            buttons.forEach(btn => {
                if (btn.dataset.section === sectionId) {
                    btn.classList.add('bg-blue-800', 'text-white');
                    btn.classList.remove('bg-gray-100', 'text-gray-500');
                } else {
                    btn.classList.add('bg-gray-100', 'text-gray-500');
                    btn.classList.remove('bg-blue-800', 'text-white');
                }
            });
        }

        // Set default ke biodata
        showSection('biodata');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const sectionId = this.dataset.section;
                showSection(sectionId);
            });
        });
    });
</script>
@endsection
