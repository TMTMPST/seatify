document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("dropdown");
    const maxAnggota = 4;

    dropdown.addEventListener("change", function () {
        let selectedValue = parseInt(this.value);

        for (let i = 1; i <= maxAnggota; i++) {
            let anggotaDiv = document.getElementById(`anggota${i}`);
            if (i <= selectedValue) {
                anggotaDiv.style.display = "block";
            } else {
                anggotaDiv.style.display = "none";
            }
        }
    });

    for (let i = 1; i <= maxAnggota; i++) {
        document.getElementById(`anggota${i}`).style.display = "none";
    }
});