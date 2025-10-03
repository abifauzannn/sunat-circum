import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

function toggleMobileMenu() {
    const mobileMenu = document.getElementById("mobileMenu");
    const mobileMenuPanel = document.getElementById("mobileMenuPanel");
    const body = document.body;

    if (mobileMenu.classList.contains("hidden")) {
        // Open menu
        mobileMenu.classList.remove("hidden");
        body.classList.add("menu-open");
        setTimeout(() => {
            mobileMenuPanel.classList.remove("translate-x-full");
        }, 10);
    } else {
        // Close menu
        mobileMenuPanel.classList.add("translate-x-full");
        body.classList.remove("menu-open");
        setTimeout(() => {
            mobileMenu.classList.add("hidden");
        }, 300);
    }
}
