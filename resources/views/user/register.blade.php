@extends('layouts.default')

@section('content')
    <div class="md:w-1/2 mx-auto">
        <h1 class="font-bold text-3xl my-5">
            Register
        </h1>
        <form action="/register" method="POST">
            @csrf
            <x-forms.input label="Username" name="name" id="name" required value="{{ old('name') }}" />
            <x-forms.input label="Email address" name="email" id="email" type="email" required
                value="{{ old('email') }}" />
            <x-forms.input label="Phone number" name="phone" id="phone" required value="{{ old('phone') }}" />
            <x-forms.input label="Password" name="password" id="password" type="password" required />
            <x-forms.input label="Confirm Password" name="password_confirmation" id="password_confirm" type="password"
                required />
            <x-buttons.button class="w-fit mt-5" type="submit" :link="false">
                Submit
            </x-buttons.button>
        </form>
    </div>
@endsection
