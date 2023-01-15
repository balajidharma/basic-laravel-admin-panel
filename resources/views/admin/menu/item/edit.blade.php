<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Menu Items') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('menu.item.index', $menu->id)}}" title="{{ __('Update Menu Item') }}">{{ __('<< Back to Menu Items') }}</x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('menu.item.update', ['menu' => $menu->id, 'item' => $item->id]) }}">
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

                <select name="parent_id" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full">
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

            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
