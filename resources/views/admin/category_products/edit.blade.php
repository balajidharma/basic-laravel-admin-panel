<x-admin.wrapper>
    <x-slot name="title">
        {{ Breadcrumbs::render('categoryProducts.edit',$categoryProducts) }}
    </x-slot>

    <div>
        <x-admin.breadcrumb href="{{route('categoryProducts.index')}}" title="{{ __('Update categoryProducts') }}"></x-admin.breadcrumb>
        <x-admin.form.errors />
    </div>
    <div class="w-full py-2 bg-white overflow-hidden">

        <form method="POST" enctype="multipart/form-data"  action="{{ route('categoryProducts.update', $categoryProducts->id) }}">
        @csrf
        @method('PUT')
            <div class="py-2">
                <div class="col-span-6 ml-2 sm:col-span-4 mb-4 md:mr-3">
                    <!-- Photo File Input -->

                    <input type="file" id="image_upload" name="image" class="hidden">
                    <input type="text" id="image_upload" name="image_name" value="{{$categoryProducts->image}}" class="hidden">

                    <div class="" >
                        <!-- Current Profile Photo -->

                        <div class="mt-2 mb-2 h-36 w-36 border-2 rounded-lg bg-cover bg-center bg-no-repeat " id="previews_image_upload"
                             style="background-image: url('{{asset('storage/'.$categoryProducts->image)}}')">

                        </div>
                        <label for="image_upload"  class=" inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-400 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150  ">
                            Select New Photo
                        </label>
                    </div>
                </div>

            </div>


            <div class="py-2">
                <x-admin.form.label for="name" class="{{$errors->has('name') ? 'text-red-400' : ''}}">{{ __('Name') }}</x-admin.form.label>

                <x-admin.form.input id="name" class="{{$errors->has('name') ? 'border-red-400' : ''}}"
                                type="text"
                                name="name"
                                value="{{ old('name', $categoryProducts->name) }}"
                                />
            </div>


            <div class="flex justify-end mt-4">
                <x-admin.form.button>{{ __('Update') }}</x-admin.form.button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('js/products.js') }}"></script>
    @endpush


</x-admin.wrapper>
