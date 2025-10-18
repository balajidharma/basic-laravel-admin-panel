<x-laravel-admin::wrapper>
    <x-slot name="title">
        {{ __($crud->title) }}
    </x-slot>

    <div class="w-full py-2">
        {!! crud($crud) !!}
    </div>
</x-laravel-admin::wrapper>
