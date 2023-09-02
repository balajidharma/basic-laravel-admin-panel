@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-base-700']) }}>
    {{ $value ?? $slot }}
</label>
