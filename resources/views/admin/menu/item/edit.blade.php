<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Menu Items') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('admin.menu.item.index', $menu->id)}}" title="{{ __('Update Menu Item') }}">{{ __('<< Back to Menu Items') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 overflow-hidden">

        <form method="POST" action="{{ route('admin.menu.item.update', ['menu' => $menu->id, 'item' => $item->id]) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
            <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

            <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $item->name) }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="uri" class="{{$errors->has('uri') ? 'text-red-400' : ''}}">{{ __('Link') }}</x-admin.form.label>

            <x-admin.form.input id="uri" class="{{$errors->has('uri') ? 'border-red-400' : ''}}"
                                type="text"
                                name="uri"
                                value="{{ old('uri', $item->uri) }}"
                                />
                <div class="item-list">
                        You can also enter an internal path such as <em class="placeholder">/home</em> or an external URL such as <em class="placeholder">http://example.com</em>. 
                        Add prefix <em class="placeholder">&lt;admin&gt;</em> to link for admin page. Enter <em class="placeholder">&lt;nolink&gt;</em> to display link text only.
                </div>
            </div>

            <div class="py-2">
            <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('Description') }}</x-admin.form.label>

            <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                type="text"
                                name="description"
                                value="{{ old('description', $item->description) }}"
                                />
            </div>

            <div class="p-2">
                <label for="enabled" class="inline-flex items-center">
                    <input id="enabled" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="enabled" value="1" {{ old('enabled', $item->enabled) ? 'checked="checked"' : '' }}>
                    <span class="ml-2">{{ __('Enabled') }}</span>
                </label>
            </div>

            <div class="py">
                <x-admin.form.label for="parent_id" class="{{$errors->has('parent_id') ? 'text-red-400' : ''}}">{{ __('Parent Item') }}</x-admin.form.label>

                <select name="parent_id" class="input input-bordered w-full ">
                    <option value=''>-ROOT-</option>
                    @foreach ($item_options as $key => $name)
                    <option value="{{ $key }}" @selected(old('parent_id', $item['parent_id']) == $key)>
                        {!! $name !!}
                    </option>
                    @endforeach
                </select>

                <div>
                    The maximum depth for a link and all its children is fixed. Some menu links may not be available as parents if selecting them would exceed this limit.
                </div>
            </div>

            <div class="py-2 w-40">
            <x-admin.form.label for="weight" class="{{$errors->has('weight') ? 'text-red-400' : ''}}">{{ __('Weight') }}</x-admin.form.label>

            <x-admin.form.input id="weight" class="{{$errors->has('weight') ? 'border-red-400' : ''}}"
                                type="number"
                                name="weight"
                                value="{{ old('weight', $item->weight) }}"
                                />
            </div>

            <div class="py-2">
            <x-admin.form.label for="icon" class="{{$errors->has('icon') ? 'text-red-400' : ''}}">{{ __('Icon') }}</x-admin.form.label>

            <textarea name="icon" id="icon" class="{{$errors->has('icon') ? 'border-red-400' : ''}} textarea input-bordered w-full">{{ old('icon', $item->icon) }}</textarea>
            </div>

            <div class="py-2">
                <h3 class="inline-block text-xl sm:text-2xl font-extrabold text-slate-900 tracking-tight py-4 block sm:inline-block flex">Roles</h3>
                <div class="grid grid-cols-4 gap-4">
                    @forelse ($roles as $role)
                        <div class="col-span-4 sm:col-span-2 md:col-span-1">
                            <label class="form-check-label">
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ in_array($role->id, $itemHasRoles) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                {{ $role->name }}
                            </ >
                        </div>
                    @empty
                        ----
                    @endforelse
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
