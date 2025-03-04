<section class="bg-blue-900 text-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl">
        <div class="text-left mb-6">
            <p class="inline-block font-semibold text-primary">FAQ Tiket Konser</p>
            <p class="text-3xl font-extrabold text-white">Pertanyaan yang Sering Diajukan</p>
        </div>
        <ul id="faq-list">
            @foreach ($faqs as $faq)
                <li>
                    <button class="faq-toggle relative flex gap-2 items-center w-full py-5 text-left border-b border-blue-800 cursor-pointer text-lg font-semibold" aria-expanded="false">
                        <span class="flex-1 text-white">{{ $faq['question'] }}</span>
                        <svg class="faq-icon w-4 h-4 ml-auto fill-current transition-transform duration-200 ease-out" fill="#fff" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="rotate-90"></rect>
                        </svg>
                    </button>
                    <div class="faq-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                        <div class="pb-5 leading-relaxed mt-5 text-lg">{{ $faq['answer'] }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>