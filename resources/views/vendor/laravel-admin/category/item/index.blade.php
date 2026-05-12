<x-laravel-admin::wrapper>
    <x-slot name="title">
        {{ __('Categories') }}
    </x-slot>
    
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
    <x-laravel-admin::add-link href="{{ route('admin.category.type.item.create', $type->id) }}">
        {{ __('Add Category') }}
    </x-laravel-admin::add-link>
    @endcan
    
    <div class="py-2">
        <div class="min-w-full  border-base-200 shadow overflow-x-auto">
            <x-laravel-admin::grid.table>
                <x-slot name="head">
                    <tr class="bg-base-200">
                        <x-laravel-admin::grid.th>
                        {{ __('Name') }}
                        </x-laravel-admin::grid.th>
                        <x-laravel-admin::grid.th>
                        {{ __('Slug') }}
                        </x-laravel-admin::grid.th>
                        <x-laravel-admin::grid.th>
                        {{ __('Image') }}
                        </x-laravel-admin::grid.th>
                        <x-laravel-admin::grid.th>
                            {{ __('Enabled') }}
                        </x-laravel-admin::grid.th>
                        @canany(['adminUpdate', 'adminDelete'], new \BalajiDharma\LaravelCategory\Models\Category)
                        <x-laravel-admin::grid.th>
                            {{ __('Actions') }}
                        </x-laravel-admin::grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($items as $item)
                        <x-laravel-admin::grid.index-category-item :item="$item" :type="$type" level="0"/>
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
            </x-laravel-admin::grid.table>
        </div>
    </div>
</x-laravel-admin::wrapper>
