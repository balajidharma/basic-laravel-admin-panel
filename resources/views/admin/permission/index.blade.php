<x-admin.wrapper>
    <x-slot name="title">
        {{ Breadcrumbs::render('permission.index') }}
    </x-slot>



    <div class="py-2">
        <div class="min-w-full border-b border-gray-200  overflow-x-auto">
            <div class="flex justify-between  items-center mb-5">

                <x-admin.grid.search action="{{ route('permission.index') }}" />
                @can('permission create')
                    <x-admin.add-link href="{{ route('permission.create') }}">
                        {{ __('Add Permission') }}
                    </x-admin.add-link>
                @endcan
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg ">
                <div class="w-full overflow-x-auto">
                    <x-admin.grid.table>
                <x-slot name="head">
                    <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        @canany(['permission edit', 'permission delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($permissions as $permission)
                    <tr class="text-gray-700">
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('permission.show', $permission->id)}}" class="no-underline hover:underline text-cyan-600">{{ $permission->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        @canany(['permission edit', 'permission delete'])
                            <x-admin.grid.td style="width: 150px">
                            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST">
                                <div class="flex">
                                    @can('permission edit')
                                    <a href="{{route('permission.edit', $permission->id)}}" >
                                        <x-icons.edit />
                                    </a>
                                    @endcan

                                    @can('permission delete')
                                    @csrf
                                    @method('DELETE')
                                        <button  onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                             <x-icons.delete />
                                        </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                    @if($permissions->isEmpty())
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
            </div>
        </div>


            <div class="py-8">
                {{ $permissions->appends(request()->query())->links() }}
            </div>

    </div>
</x-admin.wrapper>
