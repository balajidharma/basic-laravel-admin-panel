<x-admin.wrapper>
    <x-slot name="title">
            {{ __($title) }}
    </x-slot>

    <div class="w-full py-2 overflow-hidden">
        {!! form($form) !!}
    </div>
</x-admin.wrapper>