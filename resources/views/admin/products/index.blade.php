<x-admin.wrapper>

    <x-slot name="title">
        {{ Breadcrumbs::render('products.index') }}
    </x-slot>



    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <div class="flex justify-between  items-center mb-5">
                <x-admin.grid.search action="{{ route('products.index') }}" />
                @can('products create')
                    <x-admin.add-link href="{{ route('products.create') }}">
                        {{ __('Add products') }}
                    </x-admin.add-link>
                @endcan
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg ">
                <div class="w-full overflow-x-auto">
                    <x-admin.grid.table>
                        <x-slot name="head">
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">

                            <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Title', 'attribute' => 'title'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'category', 'attribute' => 'category'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'count', 'attribute' => 'count'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Price', 'attribute' => 'price'])
                        </x-admin.grid.th>
                        @canany(['products edit', 'products delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($products as $product)
                        <tr class="text-gray-700">

                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('user.show', $product->id)}}" class="no-underline hover:underline text-cyan-600">{{ $product->title }}</a>
                            </div>
                        </x-admin.grid.td>

                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">

                                {{ $product->categoryProducts->name??'---' }}
                            </div>
                        </x-admin.grid.td>

                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $product->count }}
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $product->price }}
                            </div>
                        </x-admin.grid.td>
                            @canany(['products edit', 'products delete'])
                                <x-admin.grid.td style="width: 150px">
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                        <div class="flex">

                                            @can('products edit')
                                                <a href="{{route('products.edit', $product->id)}}" >
                                                    <x-icons.edit />
                                                </a>
                                            @endcan

                                            @can('products delete')
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                                    <x-icons.delete />
                                                </button>
                                            @endcan
                                        </div>
                                    </form>
                                </x-admin.grid.td>
                            @endcanany
                    </tr>
                    @endforeach
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="3">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
                </div>
            </div>
        </div>
        <div class="py-8">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
