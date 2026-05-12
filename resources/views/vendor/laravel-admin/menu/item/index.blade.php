<x-laravel-admin::wrapper>
    <x-slot name="title">
        {{ __('Menus') }}
    </x-slot>
    
    <div class="w-full py-2">
        <div class="min-w-full border-base-200 shadow">
            <table class="table">
                <tbody>
                    <tr>
                        <td>{{ __('Name') }}</td>
                        <td>{{$menu->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ __('Machine name') }}</td>
                        <td>{{$menu->machine_name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @can('adminCreate', \BalajiDharma\LaravelMenu\Models\MenuItem::class)
    <x-laravel-admin::add-link href="{{ route('admin.menu.item.create', $menu->id) }}">
        {{ __('Add Menu Item') }}
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
                            {{ __('Enabled') }}
                        </x-laravel-admin::grid.th>
                        @canany(['adminUpdate', 'adminDelete'], new \BalajiDharma\LaravelMenu\Models\MenuItem)
                        <x-laravel-admin::grid.th>
                            {{ __('Actions') }}
                        </x-laravel-admin::grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($items as $item)
                        <x-laravel-admin::grid.index-menu-item :item="$item" :menu="$menu" level="0"/>
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
