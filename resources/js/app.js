document.addEventListener("DOMContentLoaded", () => {
    const heroSection = document.getElementById("hero");
    const stickyHeader = document.getElementById("stickyLogin");

    if (!heroSection || !stickyHeader) return;

    const observer = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                stickyHeader.classList.add("hidden");
            } else {
                stickyHeader.classList.remove("hidden");
            }
        },
        { threshold: 0.1 }
    );

    observer.observe(heroSection);
});
