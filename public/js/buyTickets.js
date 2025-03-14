document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("crud-modal");
    const openModal = document.getElementById("open-modal");
    const closeModal = document.getElementById("close-modal");
    const successModal = document.getElementById("success-modal");
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
    
        if (jumlah === 0) {
            totalPembayaran.innerHTML = `<p class="text-lg font-semibold text-red-600">Pilih jumlah tiket terlebih dahulu!</p>`;
            return;
        }
    
        fetch("/pembelian/hitung-total", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({ jumlahTiket: jumlah, kategoriTiket: kategori, kodePromo: promo })
        })
        .then(response => response.json())
        .then(data => {
            if (data.total) {
                totalPembayaran.innerHTML = `
                    <p class="text-lg font-semibold">Total: Rp${data.total.toLocaleString()}</p>
                    ${data.diskon && data.diskon !== "-" ? `<p class="text-sm text-green-600">Diskon: Rp${data.diskon.toLocaleString()}</p>` : ""}
                `;
            } else {
                totalPembayaran.innerHTML = `<p class="text-lg font-semibold text-red-600">Gagal menghitung total!</p>`;
            }
        })
        .catch(error => {
            console.error("Error:", error);
            totalPembayaran.innerHTML = `<p class="text-lg font-semibold text-red-600">Terjadi kesalahan, coba lagi.</p>`;
        });
    };         

    jumlahTiket.addEventListener("change", updateTotalPembayaran);
    kategoriTiket.addEventListener("change", updateTotalPembayaran);
    kodePromo.addEventListener("input", updateTotalPembayaran);

    formPembelian.addEventListener("submit", (e) => {
        e.preventDefault();
        
        const jumlah = parseInt(jumlahTiket.value) || 0;
        const kategori = kategoriTiket.value;
        const promo = kodePromo.value.trim();
        
        fetch("/pembelian/buat-pesanan", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ jumlahTiket: jumlah, kategoriTiket: kategori, kodePromo: promo, konser_id: 1 })
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                localStorage.setItem(`payment_${data.order_id}`, JSON.stringify({ order_id: data.order_id, status: "pending" }));
                window.location.href = `https://app.sandbox.midtrans.com/snap/v2/vtweb/${data.snap_token}`;
            } else {
                console.error("Snap token tidak ditemukan.");
            }
        })
        .catch(error => console.error("Error:", error));        
    });          

    closeSuccessModal.addEventListener("click", () => {
        successModal.classList.add("hidden");
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const urlParams = new URLSearchParams(window.location.search);
    const orderId = urlParams.get("order_id");
    const transactionStatus = urlParams.get("transaction_status");

    if (orderId && transactionStatus) {
        localStorage.setItem(`payment_${orderId}`, JSON.stringify({ order_id: orderId, status: transactionStatus }));

        if (transactionStatus === "settlement") {
            window.location.href = `/detail-konser/1`;
        }
    }
});