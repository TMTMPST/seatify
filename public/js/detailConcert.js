document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".toggle-btn");
    const sections = document.querySelectorAll(".toggle-section");

    // Set default aktif pada Bio Artis, Tiket tidak aktif
    document.getElementById("biodata").classList.remove("hidden");
    buttons.forEach(btn => btn.classList.remove("bg-white", "text-black", "border-blue-700", "bg-transparent", "text-white", "border-white"));

    const bioBtn = document.querySelector("[data-section='biodata']");
    const tiketBtn = document.querySelector("[data-section='tiket']");

    bioBtn.classList.add("bg-white", "text-black", "border-blue-700"); 
    tiketBtn.classList.add("bg-transparent", "text-white", "border-white"); 

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const sectionToShow = this.getAttribute("data-section");
            sections.forEach(section => section.classList.add("hidden"));
            document.getElementById(sectionToShow).classList.remove("hidden");
            buttons.forEach(btn => btn.classList.remove("bg-white", "text-black", "border-blue-700", "bg-transparent", "text-white", "border-white"));
            if (sectionToShow === "biodata") {
                bioBtn.classList.add("bg-white", "text-black", "border-blue-700");
                tiketBtn.classList.add("bg-transparent", "text-white", "border-white");
            } else {
                bioBtn.classList.add("bg-transparent", "text-white", "border-white");
                tiketBtn.classList.add("bg-white", "text-black", "border-blue-700");
            }
        });
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const jumlahTiket = document.getElementById('jumlahTiket');
    const kategoriTiket = document.getElementById('kategoriTiket');
    const kodePromo = document.getElementById('kodePromo');
    function hitungTotal() {
        let data = {
            jumlahTiket: jumlahTiket.value,
            kategoriTiket: kategoriTiket.value,
            kodePromo: kodePromo.value
        };
        fetch('/hitung-total', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('totalPembayaran').innerHTML = `
                <div class="border-t border-gray-300 border-dashed col-span-2 text-xl p-2 font-semibold">
                    Pembayaran
                </div>
                <div class="col-span-2 p-2">
                    <p>Jumlah Tiket: ${data.jumlah_tiket}</p>
                    <p>Kategori: ${data.kategori}</p>
                    <p>Harga: ${data.harga}</p>
                    <p>Diskon: ${data.diskon}</p>
                    <p class="text-lg font-bold mt-2">Total: ${data.total}</p>
                </div>
            `;
        })
        .catch(error => console.error('Error:', error));
    }
    jumlahTiket.addEventListener('change', hitungTotal);
    kategoriTiket.addEventListener('change', hitungTotal);
    kodePromo.addEventListener('input', hitungTotal);
});