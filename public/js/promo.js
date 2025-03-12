function copyToClipboard(elementId) {
    const text = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(text).then(() => {
        alert("Kode promo berhasil disalin: " + text);
    }).catch(err => {
        console.error("Gagal menyalin teks: ", err);
    });
}