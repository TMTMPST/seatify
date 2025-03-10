<div id="crud-modal" class="fixed inset-0 flex justify-center items-center modal-overlay p-4 hidden">
    <div class="relative w-full max-w-md bg-white rounded-xl shadow-sm">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h3 class="text-xl font-bold text-gray-900">Pembelian Tiket Konser</h3>
            <button id="close-modal" class="text-gray-400 hover:bg-gray-200 rounded-lg cursor-pointer w-8 h-8 flex justify-center items-center">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
        <form class="p-4" onsubmit="return false;">
            <div class="grid gap-4 mb-4 grid-cols-2">
                <div class="col-span-2 sm:col-span-1">
                    <label for="jumlahTiket" class="block mb-2 text-sm font-medium text-gray-900">Tiket</label>
                    <select id="jumlahTiket" class="w-full p-2.5 border border-gray-300 rounded-xl bg-gray-100">
                        <option selected>Pilih Jumlah Tiket</option>
                        <option value="1">1 Tiket</option>
                        <option value="2">2 Tiket</option>
                        <option value="3">3 Tiket</option>
                        <option value="4">4 Tiket</option>
                        <option value="5">5 Tiket</option>
                    </select>
                </div>
                <div class="col-span-2 sm:col-span-1">
                    <label for="kategoriTiket" class="block mb-2 text-sm font-medium text-gray-900">Kategori Tiket</label>
                    <select id="kategoriTiket" class="w-full p-2.5 border border-gray-300 rounded-xl bg-gray-100">
                        <option value="vip">VIP</option>
                        <option value="reguler" selected>Reguler</option>
                    </select>
                </div>                
                <div id="benefitVIP" class="col-span-2 p-3 bg-blue-100 border border-blue-300 rounded-xl border-dashed hidden">
                    <p class="text-lg font-semibold text-blue-900">✨ Benefit VIP ✨</p>
                    <div class="flex flex-col text-sm font-medium mt-2">
                        <div>Dapat makan & minum gratis 🍔🥤</div>
                        <div>Masuk konser lebih cepat 🚀</div>
                        <div>Foto dengan artis 📸</div>
                    </div>
                </div>
                <div class="col-span-2">
                    <label for="kodePromo" class="block mb-2 text-sm font-medium text-gray-900">Kode promo</label>
                    <input type="text" id="kodePromo" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block w-full p-3" placeholder="Masukkan kode promo" />
                </div>
                <div class="col-span-2" id="totalPembayaran"></div>
            </div>
            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 cursor-pointer text-white p-2.5 rounded-xl font-medium">
                Beli Tiket
            </button>
        </form>
    </div>
</div> 