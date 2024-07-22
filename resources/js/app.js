import Alpine from "alpinejs";

document.addEventListener("alpine:init", () => {
    Alpine.data('navigation', () => ({
        mobileMenuOpen: false,
        mobileMenuButton: {
            ['@click']() {
                this.mobileMenuOpen = !this.mobileMenuOpen
            }
        },
        mobileMenu: {
            [':class']() {
                return this.mobileMenuOpen ? '' : 'hidden'
            }
        }
    }));
});

Alpine.start()