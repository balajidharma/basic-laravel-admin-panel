<tr>
    <x-admin.grid.td>
        <div class="text-sm text-gray-900" style="margin-left:{{$level*20}}px;">
            {{ $item['name'] }}
        </div>
    </x-admin.grid.td>
    <x-admin.grid.td>
        <div class="text-sm text-gray-900">
            {{ $item['enabled'] ? 'Enabled' : 'Disabled' }}
        </div>
    </x-admin.grid.td>
    @canany(['menu edit', 'menu delete', 'menu.item list'])
    <x-admin.grid.td>
        <form action="{{ route('menu.item.destroy', ['menu' => $menu->id, 'item' => $item['id']]) }}" method="POST">
            <div class="flex">

                @can('menu.item edit')
                <a href="{{route('menu.item.edit', ['menu' => $menu->id, 'item' => $item['id']]) }}" class="inline-flex items-center px-4 py-2 mr-4 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
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
@isset($item['children'])
    @foreach($item['children'] as $child)
        <x-admin.grid.index-menu-item :item="$child" :menu="$menu" :level="($level+1)" />
    @endforeach
@endisset