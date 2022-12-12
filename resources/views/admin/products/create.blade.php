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
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 ml-2 sm:col-span-4 md:mr-3">
                    <!-- Photo File Input -->
                    <input type="file" class="hidden" x-ref="photo" x-on:change="
                        photoName = $refs.photo.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo.files[0]);
                    ">

                    <div class="flex justify-start items-center" >
                        <!-- Current Profile Photo -->
                        <div class="mt-2 mb-4 rounded-lg" x-show="! photoPreview">
                            <img src="https://images.unsplash.com/photo-1531316282956-d38457be0993?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=700&q=80"
                                 class="w-40 h-40 m-auto rounded-lg shadow">
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="mt-2 mb-4" x-show="photoPreview" style="display: none;">
                        <span class="block w-40 h-40 rounded-lg m-auto shadow" x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url('null');">
                        </span>
                        </div>
                        <button type="button" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150 mt-2 ml-3" x-on:click.prevent="$refs.photo.click()">
                            Select New Photo
                        </button>
                    </div>
                </div>

            </div>


            <div class="py-2">
                <x-admin.form.label for="title" class="{{$errors->has('title') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="title" class="{{$errors->has('title') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="title"
                                    value="{{ old('title') }}"
                                    />
            </div>


            <div class="py-2">
                <x-admin.form.label for="description" class="{{$errors->has('description') ? 'text-red-400' : ''}}">{{ __('description') }}</x-admin.form.label>

                <x-admin.form.input id="description" class="{{$errors->has('description') ? 'border-red-400' : ''}}"
                                    type="text"
                                    name="description"
                                    value="{{ old('description') }}"
                                    />
            </div>


            <div class="py-2">
                <x-admin.form.label for="price" class="{{$errors->has('price') ? 'text-red-400' : ''}}">{{ __('price') }}</x-admin.form.label>

                <x-admin.form.input id="price" class="{{$errors->has('price') ? 'border-red-400' : ''}}"
                                    type="number"
                                    name="price"
                                    value="{{ old('price') }}"
                                    />
            </div>


            <div class="py-2">
                <x-admin.form.label for="count" class="{{$errors->has('count') ? 'text-red-400' : ''}}">{{ __('count') }}</x-admin.form.label>

                <x-admin.form.input id="price" class="{{$errors->has('count') ? 'border-red-400' : ''}}"
                                    type="number"
                                    name="count"
                                    value="{{ old('count') }}"
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
                    @foreach($categoryProd as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </x-admin.form.select>

            </div>








            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Create') }}</x-admin.form.button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
    @endpush
</x-admin.wrapper>
