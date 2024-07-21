@props(['route'])
<a
    {{ $attributes->merge(['class' => request()->is($route) ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : 'rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white']) }}>{{ $slot }}</a>
