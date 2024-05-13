<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Categories') }}
    </x-slot>
    
    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('admin.category.type.index')}}" title="{{ __('Categories') }}">{{ __('<< Back to all category types') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-base-200 shadow">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('Name') }}</td>
                        <td>{{$type->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Machine name') }}</td>
                        <td>{{$type->machine_name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @can('adminCreate', \BalajiDharma\LaravelCategory\Models\Category::class)
    <x-admin.add-link href="{{ route('admin.category.type.item.create', $type->id) }}">
        {{ __('Add Category') }}
    </x-admin.add-link>
    @endcan
    
    <div class="py-2">
        <div class="min-w-full  border-base-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr class="bg-base-200">
                        <x-admin.grid.th>
                        {{ __('Name') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                        {{ __('Slug') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Enabled') }}
                        </x-admin.grid.th>
                        @canany(['adminUpdate', 'adminDelete'], \BalajiDharma\LaravelCategory\Models\Category::class)
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($items as $item)
                        <x-admin.grid.index-category-item :item="$item" :type="$type" level="0"/>
                    @endforeach
                    @empty($items)
                        <tr>
                            <td colspan="2">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endempty
                </x-slot>
            </x-admin.grid.table>
        </div>
    </div>
</x-admin.wrapper>
