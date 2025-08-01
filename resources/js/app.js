document.addEventListener("DOMContentLoaded", () => {
    const heroSection = document.getElementById("hero");
    const stickyHeader = document.getElementById("stickyLogin");

    if (!heroSection || !stickyHeader) return;

    const observer = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                // Saat hero terlihat → header disembunyikan dengan transisi
                stickyHeader.classList.add("opacity-0", "pointer-events-none", "-translate-y-full");
            } else {
                // Saat hero tidak terlihat → header ditampilkan dengan transisi
                stickyHeader.classList.remove("opacity-0", "pointer-events-none", "-translate-y-full");
            }
        },
        { threshold: 0.1 }
    );

    observer.observe(heroSection);
});