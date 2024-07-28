@extends('layouts.left-aside')

@section('aside')
    <x-aside-navigation>
        <x-nav-link href="{{ route('admin.products') }}" route="admin/products">
            Products
        </x-nav-link>
        <x-nav-link href="" route="">
            Categories
        </x-nav-link>
    </x-aside-navigation>
@endsection

@section('content')
    <div>
        <form method="GET" class="mb-5">
            <x-forms.input name="search" id="search" label="Product name" placeholder="Dress" />
            <div class="flex gap-5">
                <x-buttons.button type="submit" class="mt-2 w-fit" :link="false">Search</x-buttons.button>
                <x-buttons.button class="mt-2 w-fit bg-green-600 hover:bg-green-800"
                    href="{{ @route('product.show-create') }}">Add
                    new</x-buttons.button>
            </div>
        </form>
        <ul class="grid grid-cols-4 gap-4">
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
    </div>
    <div class="mt-10">
        {{ $products->appends($_GET)->links() }}
    </div>
@endsection
