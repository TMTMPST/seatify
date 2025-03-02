document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.toggle-btn');
    const sections = document.querySelectorAll('.toggle-section');
    const showSection = (sectionId) => {
        sections.forEach(section => section.classList.toggle('hidden', section.id !== sectionId));

        buttons.forEach(btn => {
            const isActive = btn.dataset.section === sectionId;
            btn.classList.toggle('bg-blue-800', isActive);
            btn.classList.toggle('text-white', isActive);
            btn.classList.toggle('bg-gray-100', !isActive);
            btn.classList.toggle('text-gray-500', !isActive);
        });
    };
    showSection('biodata');
    buttons.forEach(button => 
        button.addEventListener('click', () => showSection(button.dataset.section))
    );
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