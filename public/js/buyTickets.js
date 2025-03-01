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
});
document.addEventListener("DOMContentLoaded", () => {
    const kategoriTiket = document.getElementById("kategoriTiket");
    const benefitVIP = document.getElementById("benefitVIP");

    const toggleBenefitVIP = () => {
        benefitVIP.style.display = kategoriTiket.value === "vip" ? "block" : "none";
    };

    kategoriTiket.addEventListener("change", toggleBenefitVIP);
});
