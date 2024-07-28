@extends('layouts.default')

@section('header')
    {{ $product->name }}
@endsection

@section('content')
    <div class="product-show">
        <section class="product-section">
            <div class="image">
                @if ($product->thumb)
                    <img src="{{ $product->thumb() }}" />
                @else
                    <x-icons.image-placeholder />
                @endif

                <div class="badges">
                    @foreach ($product->badges() as $badge)
                        <x-badge class="{{ $badge['background'] }}">{{ $badge['name'] }}</x-badge>
                    @endforeach
                </div>
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
                    @can('admin')
                        <div class="admin-buttons">
                            <form method="POST">
                                <x-buttons.delete :link="false" class="bg-red-500">
                                    @csrf
                                    @method('DELETE')
                                    Remove
                                </x-buttons.delete>
                            </form>
                            <form method="POST">
                                @csrf
                                @method('PUT')
                                <x-buttons.edit :link="false" class="bg-blue-500">
                                    Edit
                                </x-buttons.edit>
                            </form>
                        </div>
                    @endcan
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

@push('styles')
    @vite('resources/css/product/show.css')
@endpush
