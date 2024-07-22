@extends('layouts.default')

@section('content')
    <div class="md:w-1/2 mx-auto">
        <h1 class="font-bold text-3xl my-5">
            Sign in
        </h1>
        <form action="/login" method="POST">
            @csrf
            <x-forms.input label="Username" name="name" id="name" required value="{{ old('name') }}" />
            <x-forms.input label="Password" name="password" id="password" type="password" required />
            <x-buttons.button class="w-fit mt-5" type="submit" :link="false">
                Submit
            </x-buttons.button>
        </form>
    </div>
@endsection
