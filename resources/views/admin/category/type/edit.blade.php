<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Category Types') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('admin.category.type.index')}}" title="{{ __('Update Category Type') }}">{{ __('<< Back to all Category Type') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('admin.category.type.update', $type->id) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
            <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

            <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $type->name) }}"
                                />
            </div>

            <div class="py-2">
                <x-admin.form.label for="machine_name">{{ __('Machine name:') }} {{ $type->machine_name }}</x-admin.form.label>
            </div>

            <div class="py-2">
            <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

            <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                type="text"
                                name="description"
                                value="{{ old('name', $type->description) }}"
                                />
            </div>

            <div class="p-2">
                <label for="is_flat" class="inline-flex items-center">
                    <input id="is_flat" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_flat" value="1" {{ old('is_flat', $type->is_flat) ? 'checked="checked"' : '' }}>
                    <span class="ml-2">{{ __('Use Flat Category') }}</span>
                </label>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
