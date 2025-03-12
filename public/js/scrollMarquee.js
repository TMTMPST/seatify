document.addEventListener("DOMContentLoaded", () => {
    const scrollContainer = document.getElementById("scroll-container-1");
    if (!scrollContainer) return;

    const items = JSON.parse(scrollContainer.dataset.items || "[]");
    let scrollPosition = 0;

    const createTextItem = (text) => {
        const span = document.createElement("span");
        span.className = "text-3xl font-semibold";
        span.textContent = text;
        return span;
    };

    const populateItems = () => {
        items.forEach(item => scrollContainer.appendChild(createTextItem(item)));
    };

    const cloneContent = () => {
        Array.from(scrollContainer.children).forEach(child => {
            const clone = child.cloneNode(true);
            scrollContainer.appendChild(clone);
        });
    };

    const animateScroll = () => {
        scrollPosition -= 1;
        scrollContainer.style.transform = `translateX(${scrollPosition}px)`;

        const firstChild = scrollContainer.firstElementChild;
        if (firstChild?.getBoundingClientRect().right < 0) {
            scrollContainer.appendChild(firstChild);
            scrollPosition += firstChild.offsetWidth;
        }

        requestAnimationFrame(animateScroll);
    };

    populateItems();
    cloneContent();
    animateScroll();
});
