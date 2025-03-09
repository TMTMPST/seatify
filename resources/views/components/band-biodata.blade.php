@if ($band)
    <section class="bg-white rounded-t-xl">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-left lg:py-16 space-y-8">
            <div class="flex flex-row justify-between gap-8">
                <!-- Image Banner -->
                <div class="w-full">
                    <img src="{{ $band->banner_image }}" alt="{{ $band->name }}" class="w-full h-80 object-cover bg-center flex items-center justify-center rounded-xl" />
                </div>
                <!-- Ticket Information -->
                <div class="bg-white border border-gray-200 h-80 px-6 py-5 rounded-xl max-w-sm w-full flex flex-col">
                    <h2 class="text-xl font-semibold mb-4">Informasi Tiket</h2>
                    <div class="flex-1 space-y-6">
                        <ul class="space-y-4">
                            <li class="flex justify-between"><span>General Admission</span> <span>$99.99</span></li>
                            <li class="flex justify-between"><span>VIP Package</span> <span>$249.99</span></li>
                            <li class="flex justify-between"><span>Platinum</span> <span>$399.99</span></li>
                        </ul>
                        <div class="w-full bg-gray-200 text-gray-900 text-left py-3 px-3 rounded-xl text-sm font-medium">Biaya tambahan mungkin dikenakan</div>
                    </div>                
                    <button class="mt-auto w-full bg-gray-900 text-white py-2 rounded-xl font-medium">Beli Tiket</button>
                </div>                         
            </div>
            <!-- Band Information -->
            <div>
                <h1 class="text-3xl font-bold">{{ $band->name }}</h1>
                <p class="mt-2 text-gray-700">{{ $band->description }}</p>
            </div>
        </div>
    </section>
@endif
