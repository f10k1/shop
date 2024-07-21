import Alpine from "alpinejs";

document.addEventListener("alpine:init", () => {
    Alpine.data('navigation', () => ({
        mobileMenuOpen: false,
        monileMenuButton: {
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