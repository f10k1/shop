@props(['link' => true])

@php
    $class =
        'flex gap-2 bg-indigo-500 px-6 py-2 rounded-lg text-white hover:bg-indigo-700 transition-colors align-center text-lg justify-center';
@endphp

@if ($link)
    <a {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $class]) }}>
        {{ $slot }}
    </button>
@endif
