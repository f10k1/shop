import Glide, {
    Breakpoints,
    Controls,
} from "@glidejs/glide/dist/glide.modular.esm";
import Alpine from "alpinejs";

document.addEventListener("alpine:init", () => {
    Alpine.data('productsSlider', (products) => ({
        products,
        index: 0,
        perView: 5,
        glide: null,
        progress: {
            ['x-bind:style']() { 
                return `--current: ${this.index + this.perView}; --max: ${this.products};`;
            }
        },
        init() {
            this.glide = new Glide(".products-slider .glide", {
                type: 'slider',
                perView: 5,
                bound: true,
                rewind: false,
                breakpoints: {
                    460: {
                        perView: 1
                    },
                    768: {
                        perView: 2
                    },
                    1024: {
                        perView: 3
                    }
                }
            })

            this.glide.mount({Controls, Breakpoints}).on('move', () => {
                this.index = this.glide.index
            });

            this.perView = this.glide.settings.perView

            window.addEventListener("resize", () => {
                this.perView = this.glide.settings.perView
            })
        }
    }))
})