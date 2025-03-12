<section class="bg-blue-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left">
        <h1 class="mb-3 text-4xl lg:text-5xl md:text-3xl font-bold tracking-tight leading-none text-white">Nikmati Promonya!</h1>
        <div class="mt-10 lg:grid-cols-3 lg:grid grid grid-cols-1 md:grid md:grid-cols-2 gap-2">
            @include('components.templates.PromoCard', [
                'judul' => 'Promo Natal 2025',
                'deskripsi' => 'Gunakan kode promo berikut untuk mendapatkan potongan 20% di Natal 2025.',
                'kode' => 'NATAL2025',
                'id' => 'promo1'
            ])

            @include('components.templates.PromoCard', [
                'judul' => 'Promo Tahun Baru 2026',
                'deskripsi' => 'Dapatkan potongan 50% awal tahun dengan kode promo spesial berikut.',
                'kode' => 'TAHUNBARU2026',
                'id' => 'promo2'
            ])

            @include('components.templates.PromoCard', [
                'judul' => 'Promo Ramadhan 2025',
                'deskripsi' => 'Dapatkan potongan 20% awal ramadhan dengan kode promo spesial berikut.',
                'kode' => 'RAMADHAN2025',
                'id' => 'promo3'
            ])
        </div>
    </div>
</section>
<script src="{{ asset('js/promo.js') }}"></script>
