function initStickyHeader() {
    const heroSection = document.getElementById("hero");
    const stickyHeader = document.getElementById("stickyLogin");

    if (!heroSection || !stickyHeader) return;

    const toggleStickyHeader = (isVisible) => {
        if (isVisible) {
            stickyHeader.classList.add(
                "opacity-0",
                "pointer-events-none",
                "-translate-y-full"
            );
        } else {
            stickyHeader.classList.remove(
                "opacity-0",
                "pointer-events-none",
                "-translate-y-full"
            );
        }
    };

    const observer = new IntersectionObserver(
        ([entry]) => toggleStickyHeader(entry.isIntersecting),
        { threshold: 0.1 }
    );

    observer.observe(heroSection);

    // Cek saat pertama kali load halaman
    const rect = heroSection.getBoundingClientRect();
    const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
    toggleStickyHeader(isVisible);

    console.log("StickyHeader initiated");
}

// Jalankan saat halaman benar-benar di-load
document.addEventListener("DOMContentLoaded", () => {
    initStickyHeader();
});

// Paksa reload jika kembali dari halaman login (agar sticky header muncul normal)
window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
        console.log("Kembali dari cache, me-refresh halaman...");
        window.location.reload(true); // force reload dari server
    }
});
