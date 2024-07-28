@props(['products' => []])

@if (count($products) > 0)
    <div x-data="productsSlider({{ count($products) }})" {{ $attributes->merge(['class' => 'products-slider']) }}>
        <div class="slider-title">{{ $slot }}</div>

        <div class="glide" x-ref="slider">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">
                    @foreach ($products as $product)
                        <li class="glide__slide">
                            <a href="{{ route('product', ['product' => $product->id]) }}">
                                <div class="image">
                                    @if ($product->thumb)
                                        <img src="{{ $product->thumb() }}" />
                                    @else
                                        <x-icons.image-placeholder />
                                    @endif
                                </div>

                                <div class="content">
                                    <div class="badges">
                                        @foreach ($product->badges() as $badge)
                                            <x-badge class="{{ $badge['background'] }}">{{ $badge['name'] }}</x-badge>
                                        @endforeach
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

    @pushOnce('styles')
        @vite(['resources/css/sliders/index.css', 'resources/css/sliders/products.css'])
    @endpushonce

    @pushOnce('scripts')
        @vite('resources/js/sliders/products.js')
    @endpushonce
@endif
