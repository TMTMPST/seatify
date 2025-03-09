<section class="bg-blue-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left">
        <h1 class="mb-3 text-4xl lg:text-5xl md:text-3xl font-bold tracking-tight leading-none text-white">Nikmati Promonya!</h1>
        <div class="mt-10 lg:grid-cols-3 lg:grid grid grid-cols-1 md:grid md:grid-cols-2 gap-2">
            <div class="w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Natal 2025</h5>
                <p class="mb-3 font-normal text-gray-700">Gunakan kode promo berikut untuk mendapatkan potongan 20% di Natal 2025.</p>
                <div class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                    <span class="text-gray-900 font-semibold" id="promo1">NATAL2025</span>
                    <button onclick="copyToClipboard('promo1')" class="cursor-pointer px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Salin
                    </button>
                </div>
            </div>

            <div class="w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Tahun Baru 2026</h5>
                <p class="mb-3 font-normal text-gray-700">Dapatkan potongan 50% awal tahun dengan kode promo spesial berikut.</p>
                <div class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                    <span class="text-gray-900 font-semibold" id="promo2">TAHUNBARU2026</span>
                    <button onclick="copyToClipboard('promo2')" class="cursor-pointer px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Salin
                    </button>
                </div>
            </div>
            <div class="w-full p-6 bg-white border border-gray-200 rounded-xl shadow-sm">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Promo Ramadhan 2025</h5>
                <p class="mb-3 font-normal text-gray-700">Dapatkan potongan 20% awal ramadhan dengan kode promo spesial berikut.</p>
                <div class="flex items-center justify-between bg-gray-100 p-2 rounded-md">
                    <span class="text-gray-900 font-semibold" id="promo3">RAMADHAN2025</span>
                    <button onclick="copyToClipboard('promo3')" class="cursor-pointer px-3 py-1 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Salin
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function copyToClipboard(elementId) {
        const text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text).then(() => {
            alert("Kode promo berhasil disalin: " + text);
        }).catch(err => {
            console.error("Gagal menyalin teks: ", err);
        });
    }
</script>
