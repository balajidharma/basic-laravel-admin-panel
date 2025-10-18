<x-laravel-admin::wrapper>
    <x-slot name="title">
        {{ __($crud->title) }}
    </x-slot>
    <div class="w-full py-2">
        {!! crud($crud, 'show') !!}
        @isset($relations)
            @foreach ($relations as $relation)
                <h2 class="text-xl font-bold">{{ $relation['crud']->title }}</h2>
                {!! crud($relation['crud'], $relation['view']) !!}
            @endforeach
        @endisset
    </div>
</x-laravel-admin::wrapper>
