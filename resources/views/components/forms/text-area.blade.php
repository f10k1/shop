@props(['label' => '', 'name', 'id'])

<div class="flex flex-col gap-3 mt-4">
    @if (!empty($label))
        <label for="{{ $id }}" class="text-md">
            {{ $label }}
        </label>
    @endif
    <textarea {{ $attributes->merge(['class' => 'rounded-lg px-4 py-2 border border-gray-300']) }} name="{{ $name }}"
        id="{{ $id }}">{{ $slot }}</textarea>

    @error($name)
        <div class="text-red-400 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>
