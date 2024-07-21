@extends('layouts.default')

@section('header')
    {{ $product->name }}
@endsection

@section('content')
    <div class="product-show">
        <section class="product-section">
            <div class="image">
                <x-icons.image-placeholder />
            </div>
            <div class="product-info">
                <h1>{{ $product->name }}</h1>
                <div class="price">
                    {{ $product->price }}
                </div>
                <p class="description">
                    {{ $product->short_description }}
                </p>
                <div class="buy-section">
                    <div class="buy-button">
                        <x-buttons.buy-button>
                            <x-buttons.button :link="false">
                                <x-icons.basket />
                                Add to cart
                            </x-buttons.button>
                        </x-buttons.buy-button>
                    </div>
                </div>
            </div>
        </section>
        <section class="description-section">
            <p class="description">
                {{ $product->description }}
            </p>
        </section>
    </div>
@endsection

@section('styles')
    @vite('resources/css/product/show.css')
@endsection
