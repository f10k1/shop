import Alpine from "alpinejs";

document.addEventListener("alpine:init", () => {
    Alpine.data('navigation', () => ({
        mobileMenuOpen: false,
        dropDownMenuOpen: false,
        mobileMenuButton: {
            ['@click']() {
                this.mobileMenuOpen = !this.mobileMenuOpen;
            }
        },
        mobileMenu: {
            [':class']() {
                return this.mobileMenuOpen ? '' : 'hidden';
            }
        },
        dropDownMenuButton: {
            ['@click']() {
                this.dropDownMenuOpen = !this.dropDownMenuOpen;
            },
            ['@mousedown.outside']() {
                this.dropDownMenuOpen = false;
            }
        },
        dropDownMenu: {
            ['x-show']() {
                return this.dropDownMenuOpen
            }
        }
    }));
});

Alpine.start()