<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary px-6']) }}>
    {{ $slot }}
</button>
