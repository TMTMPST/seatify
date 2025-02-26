<section class="bg-blue-900 text-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-left">
        <div class="lg:py-16 px-8 max-w-5xl mx-auto flex flex-col md:flex-row lg:gap-12 gap-6">
            <div class="flex flex-col text-left basis-1/2">
                <p class="inline-block font-semibold text-primary mb-2">Insurance FAQ</p>
                <p class="text-3xl font-extrabold text-base-content">Frequently Asked Questions</p>
            </div>
            <ul class="basis-1/2">
                <li>
                    <button class="faq-toggle relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-b border-blue-800 md:text-lg border-base-content/10" aria-expanded="false">
                        <span class="flex-1 text-base-content text-xl">How secure is my insurance information?</span>
                        <svg class="faq-icon flex-shrink-0 w-4 h-4 ml-auto fill-current transition-transform duration-200 ease-out" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                            <rect y="7" width="16" height="2" rx="1"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="rotate-90"></rect>
                        </svg>
                    </button>
                    <div class="faq-content transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                        <div class="pb-5 leading-relaxed mt-5">
                            <div class="space-y-2 leading-relaxed font-medium text-lg">We prioritize the security of your insurance information. We use advanced encryption and strict data protection measures to ensure your data is safe and confidential.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="faq-toggle relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-b border-blue-800 md:text-lg border-base-content/10" aria-expanded="false">
                        <span class="flex-1 text-base-content text-xl">How can I customize my insurance coverage?</span>
                        <svg class="faq-icon flex-shrink-0 w-4 h-4 ml-auto fill-current transition-transform duration-200 ease-out" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                            <rect y="7" width="16" height="2" rx="1"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="rotate-90"></rect>
                        </svg>
                    </button>
                    <div class="faq-content transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                        <div class="pb-5 leading-relaxed mt-5">
                            <div class="space-y-2 leading-relaxed font-medium text-lg">Our insurance plans are customizable. You can tailor your coverage to meet your specific needs and budget.</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button class="faq-toggle relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-b border-blue-800 md:text-lg border-base-content/10" aria-expanded="false">
                        <span class="flex-1 text-base-content text-xl">Is there a waiting period for insurance claims?</span>
                        <svg class="faq-icon flex-shrink-0 w-4 h-4 ml-auto fill-current transition-transform duration-200 ease-out" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                            <rect y="7" width="16" height="2" rx="1"></rect>
                            <rect y="7" width="16" height="2" rx="1" class="rotate-90"></rect>
                        </svg>
                    </button>
                    <div class="faq-content transition-all duration-300 ease-in-out max-h-0 overflow-hidden">
                        <div class="pb-5 leading-relaxed mt-5">
                            <div class="space-y-2 leading-relaxed font-medium text-lg">There may be a waiting period for certain insurance claims, depending on the policy terms and conditions. Please refer to your policy documents for details.</div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const faqButtons = document.querySelectorAll(".faq-toggle");

    // Set semua FAQ ke kondisi tertutup saat halaman dimuat
    document.querySelectorAll(".faq-content").forEach((content) => {
        content.style.maxHeight = "0";
    });
    document.querySelectorAll(".faq-toggle").forEach((btn) => {
        btn.setAttribute("aria-expanded", "false");
        btn.querySelector(".faq-icon").classList.remove("rotate-180");
    });

    faqButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const content = this.nextElementSibling;
            const icon = this.querySelector(".faq-icon");
            const isOpen = this.getAttribute("aria-expanded") === "true";

            // Tutup semua FAQ sebelum membuka yang baru
            document.querySelectorAll(".faq-content").forEach((el) => {
                el.style.maxHeight = "0";
            });
            document.querySelectorAll(".faq-toggle").forEach((btn) => {
                btn.setAttribute("aria-expanded", "false");
                btn.querySelector(".faq-icon").classList.remove("rotate-180");
            });

            // Jika sebelumnya tertutup, maka buka
            if (!isOpen) {
                this.setAttribute("aria-expanded", "true");
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add("rotate-180");
            }
        });
    });
});

</script>


<style>
    .rotate-90 {
        transform: rotate(90deg);
    }
    .rotate-180 {
        transform: rotate(180deg);
    }
</style>
