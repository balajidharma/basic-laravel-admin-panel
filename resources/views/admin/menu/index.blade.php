<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Menus') }}
    </x-slot>

    @can('menu create')
    <x-admin.add-link href="{{ route('menu.create') }}">
        {{ __('Add Menu') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('menu.index') }}" />
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            {{ __('Description') }}
                        </x-admin.grid.th>
                        @canany(['menu edit', 'menu delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($menus as $menu)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $menu->name }}
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $menu->description }}
                            </div>
                        </x-admin.grid.td>
                        @canany(['menu edit', 'menu delete', 'menu.item list'])
                        <x-admin.grid.td>
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST">
                                <div class="flex">
                                    @can('menu.item list')
                                    <a href="{{route('menu.item.index', $menu->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-emerald-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-600 active:bg-emerald-700 focus:outline-none focus:border-emerald-700 focus:ring ring-emerald-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Manage') }}
                                    </a>
                                    @endcan

                                    @can('menu edit')
                                    <a href="{{route('menu.edit', $menu->id)}}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan

                                    @can('menu delete')
                                    @csrf
                                    @method('DELETE')
                                    <button class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        {{ __('Delete') }}
                                    </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                    @if($menus->isEmpty())
                        <tr>
                            <td colspan="2">
                                <div class="flex flex-col justify-center items-center py-4 text-lg">
                                    {{ __('No Result Found') }}
                                </div>
                            </td>
                        </tr>
                    @endif
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $menus->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
