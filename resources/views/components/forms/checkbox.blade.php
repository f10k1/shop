@props(['label' => '', 'name', 'id'])

<div class="flex flex-col gap-3 mt-4">
    @if (!empty($label))
        <label for="{{ $id }}" class="text-md flex gap-3 items-center">
            <span class="border border-indigo-600 w-5 h-5 flex items-center justify-center">
                <input type="checkbox" {{ $attributes->merge(['class' => 'hidden peer']) }} name="{{ $name }}"
                    id="{{ $id }}">
                <x-icons.check class="w-4 h-4 hidden peer-checked:block" />
            </span>
            {{ $label }}
        </label>
    @endif

    @error($name)
        <div class="text-red-400 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>
