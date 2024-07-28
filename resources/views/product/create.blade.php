@extends('layouts.default')


@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <x-forms.input name="name" id="name" label="Product name" placeholder="Dress" reqired
            value="{{ old('name') }}" />
        <x-forms.group>
            <x-forms.input name="price" id="Price" label="Price" reqired value="{{ old('price') }}" />
            <x-forms.input name="quantity" id="quantity" label="Quantity" type="number" reqired
                value="{{ old('quantity') }}" />
        </x-forms.group>
        <x-forms.text-area name="short_description" id="short_description" label="Short description">
            {{ old('short_description') }} </x-forms.text-area>
        <x-forms.text-area name="description" id="description" label="Description"> {{ old('description') }}
        </x-forms.text-area>
        <x-forms.checkbox name="is_bestseller" id="is_bestseller" label="Bestseller" value="1" />
        <x-forms.input type="file" name="thumb" id="thumb" label="Product thumb" accept="image/png, image/jpeg" />
        <x-buttons.button type="submit" class="mt-8 w-fit" :link="false">Submit</x-buttons.button>
    </form>
@endsection
