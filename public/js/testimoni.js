document.addEventListener("DOMContentLoaded", () => {
    const testimonials = [
        {
            text: "Layanan pemesanan tiket di sini sangat cepat dan mudah! Saya bisa memesan tiket dalam hitungan menit tanpa ribet.",
            name: "Andi Pratama",
            img: "https://randomuser.me/api/portraits/men/32.jpg"
        },
        {
            text: "Prosesnya simpel dan tidak ada kendala. Sangat puas dengan layanan yang diberikan!",
            name: "Rina Setiawan",
            img: "https://randomuser.me/api/portraits/women/44.jpg"
        },
        {
            text: "Saya bisa mendapatkan tiket dengan harga terbaik tanpa harus mengantri. Sistemnya luar biasa!",
            name: "Dian Nugroho",
            img: "https://randomuser.me/api/portraits/men/29.jpg"
        },
        {
            text: "Website ini sangat user-friendly. Semua informasi jelas dan mudah diakses.",
            name: "Siti Ramadhani",
            img: "https://randomuser.me/api/portraits/women/36.jpg"
        },
        {
            text: "Pelayanan pelanggan sangat responsif dan membantu ketika saya mengalami kendala saat pemesanan.",
            name: "Budi Santoso",
            img: "https://randomuser.me/api/portraits/men/40.jpg"
        }
    ];

    let currentIndex = 0;
    const elements = {
        container: document.getElementById("testimonial-container"),
        text: document.getElementById("testimonial-text"),
        name: document.getElementById("testimonial-name"),
        img: document.getElementById("testimonial-img")
    };

    const fadeElement = (element, opacity, callback) => {
        element.style.opacity = opacity;
        if (callback) setTimeout(callback, 500);
    };

    const updateTestimonial = () => {
        fadeElement(elements.container, "0", () => {
            const { text, name, img } = testimonials[currentIndex];
            elements.text.textContent = text;
            elements.name.textContent = name;
            elements.img.src = img;
            fadeElement(elements.container, "1");
        });

        currentIndex = (currentIndex + 1) % testimonials.length;
    };

    updateTestimonial();
    setInterval(updateTestimonial, 3000);
});
