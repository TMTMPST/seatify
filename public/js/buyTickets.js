document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("crud-modal");
    const openModal = document.getElementById("open-modal");
    const closeModal = document.getElementById("close-modal");

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
    
        fetch("/hitung-total", {
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
        e.preventDefault();
        
        const jumlah = parseInt(jumlahTiket.value) || 0;
        const kategori = kategoriTiket.value;
        const promo = kodePromo.value.trim();
    
        fetch("/buat-pesanan", {
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
            if (data.redirect_url) {
                window.location.href = data.redirect_url; // Redirect ke Midtrans
            } else {
                alert("Terjadi kesalahan saat membuat pesanan.");
            }
        })
        .catch(error => console.error("Error:", error));
    });    
});
