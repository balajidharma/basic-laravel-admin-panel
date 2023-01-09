<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Menus') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('menu.index')}}" title="{{ __('Create menu') }}">{{ __('<< Back to all menus') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('menu.store') }}">
        @csrf

            <div class="py-2">
                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="machine_name" class="{{$errors->has('machine_name') ? 'text-red-400' : ''}}">{{ __('Machine-readable name') }}</x-admin.form.label>

                <x-admin.form.input id="machine_name" class="{{$errors->has('machine_name') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="machine_name"
                                    value="{{ old('machine_name') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

                <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="description"
                                    value="{{ old('description') }}"
                                    />
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>