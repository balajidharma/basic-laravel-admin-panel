<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Menus') }}
    </x-slot>
    
    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('menu.index')}}" title="{{ __('Menu Items') }}">{{ __('<< Back to all menus') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white">
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Name') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$menu->name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Machine name') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$menu->machine_name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @can('menu create')
    <x-admin.add-link href="{{ route('menu.item.create', $menu->id) }}">
        {{ __('Add Menu Item') }}
    </x-admin.add-link>
    @endcan
    
    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                        {{ __('Name') }}
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Enabled') }}
                        </x-admin.grid.th>
                        @canany(['menu.item edit', 'menu.item delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                    @foreach($items as $item)
                        <x-admin.grid.index-menu-item :item="$item" :menu="$menu" level="0"/>
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
