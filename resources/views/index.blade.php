@extends('layouts.default')


@section('content')
    <x-sliders.products :products="$products">
        Our Products
    </x-sliders.products>
@endsection
