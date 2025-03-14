document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("crud-modal");
    const openModal = document.getElementById("open-modal");
    const closeModal = document.getElementById("close-modal");
    const successModal = document.getElementById("success-modal"); // Modal sukses
    const closeSuccessModal = document.getElementById("close-success-modal");

    const toggleModal = (show) => modal.classList.toggle("hidden", !show);
    
    openModal.addEventListener("click", () => toggleModal(true));
    closeModal.addEventListener("click", () => toggleModal(false));
    modal.addEventListener("click", (event) => {
        if (event.target === modal) toggleModal(false);
    });

    const kategoriTiket = document.getElementById("kategoriTiket");
    const benefitVIP = document.getElementById("benefitVIP");
    const jumlahTiket = document.getElementById("jumlahTiket");
    const kodePromo = document.getElementById("kodePromo");
    const totalPembayaran = document.getElementById("totalPembayaran");
    const formPembelian = document.querySelector("form");

    const toggleBenefitVIP = () => {
        benefitVIP.style.display = kategoriTiket.value === "vip" ? "block" : "none";
    };

    kategoriTiket.addEventListener("change", toggleBenefitVIP);

    const updateTotalPembayaran = () => {
        const jumlah = parseInt(jumlahTiket.value) || 0;
        const kategori = kategoriTiket.value;
        const promo = kodePromo.value.trim();
    
        fetch("/pembelian/hitung-total", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                jumlahTiket: jumlah,
                kategoriTiket: kategori,
                kodePromo: promo
            })
        })
        .then(response => response.json())
        .then(data => {
            totalPembayaran.innerHTML = `
                <p class="text-lg font-semibold">Total: ${data.total}</p>
                ${data.diskon !== "-" ? `<p class="text-sm text-green-600">Diskon: ${data.diskon}</p>` : ""}
            `;
        })
        .catch(error => console.error("Error:", error));
    };    

    jumlahTiket.addEventListener("change", updateTotalPembayaran);
    kategoriTiket.addEventListener("change", updateTotalPembayaran);
    kodePromo.addEventListener("input", updateTotalPembayaran);

    formPembelian.addEventListener("submit", (e) => {
        e.preventDefault(); // Hindari refresh halaman
    
        const jumlah = parseInt(jumlahTiket.value) || 0;
        const kategori = kategoriTiket.value;
        const promo = kodePromo.value.trim();
    
        fetch('/pembelian/buat-pesanan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                tiket_id: 1,
                jumlah: 2
            })
        })        
        .then(response => response.json())
        .then(data => {
            if (data.redirect_url) {
                // Buka URL pembayaran Midtrans di tab baru
                window.open(data.redirect_url, "_blank");
            } else {
                successModal.classList.remove("hidden"); // Tampilkan modal sukses
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

    closeSuccessModal.addEventListener("click", () => {
        successModal.classList.add("hidden");
    });
});