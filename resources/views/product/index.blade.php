@extends('layouts.default')


@section('content')
    <ul class="grid grid-cols-4 gap-10">
        @foreach ($products as $product)
            <li>
                <a href="{{ route('product', ['product' => $product->id]) }}">
                    <div class="h-[200px]">
                        @if ($product->thumb)
                            <img class="max-h-full" src="{{ $product->thumb() }}" />
                        @else
                            <x-icons.image-placeholder />
                        @endif
                    </div>
                    <div>
                        {{ $product->name }}
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
    <div class="mt-9">
        {{ $products->links() }}
    </div>
@endsection
