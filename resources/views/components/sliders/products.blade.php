@props(['products' => []])

@if (count($products) > 0)
    <div class="products-slider">
        <div class="slider-title">{{ $slot }}</div>

        <div class="glide" x-data="productsSlider({{ count($products) }})">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($products as $product)
                        <li class="glide__slide">
                            <a href="{{ route('product', ['product' => $product->id]) }}">
                                <div class="image">
                                    {{-- #TODO product image --}}
                                    <x-icons.image-placeholder />
                                </div>

                                <div class="content">
                                    <div class="badges">
                                        @if ($product->isNew())
                                            <x-badge>New</x-badge>
                                        @endif
                                    </div>
                                    <div class="name">
                                        {{ $product->name }}
                                    </div>
                                    <div class="price">
                                        {{ $product->price }}
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="controls">
                <div data-glide-el="controls" class="buttons">
                    <button data-glide-dir="<" title="Previous slide"><x-icons.arrow-left /></button>
                    <button data-glide-dir=">" title="Next slide"><x-icons.arrow-right /></button>
                </div>
                <span class="progress" x-bind="progress"></span>
            </div>
        </div>
    </div>

    @section('styles')
        @vite(['resources/css/sliders/index.css', 'resources/css/sliders/products.css'])
    @endsection

    @section('scripts')
        @vite('resources/js/sliders/products.js')
    @endsection
@endif
