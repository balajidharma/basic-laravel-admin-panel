<x-admin.wrapper>
    <x-slot name="title">
        {{ Breadcrumbs::render('products.edit',$products) }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('products.index')}}" title="{{ __('Update products') }}"></x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" action="{{ route('products.update', $products->id) }}">
        @csrf
        @method('PUT')

            <div class="py-2">
                <x-admin.form.label for="title" class="{{$errors->has('title') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="title" class="{{$errors->has('title') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="title"
                                    value="{{ $products->title??old('title') }}"
                />
            </div>


            <div class="py-2">
                <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('description') }}</x-admin.form.label>

                <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="description"
                                    value="{{ $products->description??old('description') }}"
                />
            </div>


            <div class="py-2">
                <x-admin.form.label for="price" class="{{$errors->has('price') ? 'text-red-400' : ''}}">{{ __('price') }}</x-admin.form.label>

                <x-admin.form.input id="price" class="{{$errors->has('price') ? 'border-red-400' : ''}}"
                                    type="number"
                                    name="price"
                                    value="{{ $products->price??old('price') }}"
                />
            </div>


            <div class="py-2">
                <x-admin.form.label for="count" class="{{$errors->has('count') ? 'text-red-400' : ''}}">{{ __('count') }}</x-admin.form.label>

                <x-admin.form.input id="price" class="{{$errors->has('count') ? 'border-red-400' : ''}}"
                                    type="number"
                                    name="count"
                                    value="{{ $products->count??old('count') }}"
                />
            </div>




            <div class="py-2">
                <x-admin.form.label for="category_id" class="{{$errors->has('category_id') ? 'text-red-400' : ''}}">{{ __('Category') }}</x-admin.form.label>

                <x-admin.form.select id="category_id" class="{{$errors->has('category_id') ? 'border-red-400' : ''}}"
                                     type="text"
                                     name="category_id"
                                     value="{{ $products->category_id??old('category_id') }}" >

                    <option value="">---</option>
                    @foreach($categoryProd as $category)
                        <option @if($products->category_id ==  $category->id) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </x-admin.form.select>

            </div>


            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>
</x-admin.wrapper>
