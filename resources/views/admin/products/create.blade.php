<x-admin.wrapper>
    <x-slot name="title">
        {{ Breadcrumbs::render('products.create') }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('products.index')}}" title="{{ __('Create products') }}"></x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('products.store') }}">
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
                <x-admin.form.label for="subdomain" class="{{$errors->has('subdomain') ? 'text-red-400' : ''}}">{{ __('Subdomain') }}</x-admin.form.label>

                <x-admin.form.input id="subdomain" class="{{$errors->has('subdomain') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="subdomain"
                                    value="{{ old('subdomain') }}"
                                    />
            </div>

            <div class="py-2">
                <x-admin.form.label for="category_id" class="{{$errors->has('category_id') ? 'text-red-400' : ''}}">{{ __('Category') }}</x-admin.form.label>

                <x-admin.form.select id="category_id" class="{{$errors->has('category_id') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="category_id"
                                    value="{{ old('category_id') }}"
                                    >
                    <option value="">---</option>
                    <option value="1">Mode femme</option>
                    <option value="2">Mode homme</option>
                    <option value="3">Électronique</option>
                </x-admin.form.select>

            </div>



            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
