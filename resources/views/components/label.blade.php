@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-500 pb-1']) }}>
    {{ $value ?? $slot }}
</label>
