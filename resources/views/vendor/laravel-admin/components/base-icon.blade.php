@php
$size = $size ?? 16;
@endphp

<span class="inline-flex justify-center items-center">
  <svg viewBox="0 0 24 24" width="{{ $size }}" height="{{ $size }}" class="inline-block">
    <path fill="currentColor" d="{{ $path }}"></path>
  </svg>
</span>