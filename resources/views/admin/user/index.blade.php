<x-admin.wrapper>
    <x-slot name="title">
        {{ __('Users') }}
    </x-slot>

    @can('user create')
    <x-admin.add-link href="{{ route('user.create') }}">
        {{ __('Add User') }}
    </x-admin.add-link>
    @endcan

    <div class="py-2">
        <x-admin.message />
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <x-admin.grid.search action="{{ route('user.index') }}" />
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Email', 'attribute' => 'email'])
                        </x-admin.grid.th>
                        @canany(['user edit', 'user delete'])
                        <x-admin.grid.th>
                            {{ __('Actions') }}
                        </x-admin.grid.th>
                        @endcanany
                    </tr>
                </x-slot>
                <x-slot name="body">
                @foreach($users as $user)
                    <tr>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                <a href="{{route('user.show', $user->id)}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ $user->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $user->email }}
                            </div>
                        </x-admin.grid.td>
                        @canany(['user edit', 'user delete'])
                        <x-admin.grid.td>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                <div class="flex">
                                    @can('user edit')
                                    <a href="{{route('user.edit', $user->id)}}" class="px-4 py-2 text-white mr-4 bg-blue-600">
                                        {{ __('Edit') }}
                                    </a>
                                    @endcan

                                    @can('user delete')
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 text-white bg-red-600" onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                        {{ __('Delete') }}
                                    </button>
                                    @endcan
                                </div>
                            </form>
                        </x-admin.grid.td>
                        @endcanany
                    </tr>
                    @endforeach
                </x-slot>
            </x-admin.grid.table>
        </div>
        <div class="py-8">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
