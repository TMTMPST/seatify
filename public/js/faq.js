document.addEventListener("DOMContentLoaded", () => {
    const faqButtons = document.querySelectorAll(".faq-toggle");
    const faqContents = document.querySelectorAll(".faq-content");

    const closeAllFaqs = () => {
        faqContents.forEach((content) => (content.style.maxHeight = "0"));
        faqButtons.forEach((btn) => {
            btn.setAttribute("aria-expanded", "false");
            btn.querySelector(".faq-icon").classList.remove("rotate-180");
        });
    };

    closeAllFaqs();

    faqButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const content = button.nextElementSibling;
            const icon = button.querySelector(".faq-icon");
            const isOpen = button.getAttribute("aria-expanded") === "true";

            closeAllFaqs();

            if (!isOpen) {
                button.setAttribute("aria-expanded", "true");
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add("rotate-180");
            }
        });
    });
});
