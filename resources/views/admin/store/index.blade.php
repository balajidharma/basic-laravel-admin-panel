<x-admin.wrapper>

    <x-slot name="title">
        {{ Breadcrumbs::render('store.index') }}
    </x-slot>



    <div class="py-2">
        <div class="min-w-full border-b border-gray-200 shadow overflow-x-auto">
            <div class="flex justify-between  items-center mb-5">
                <x-admin.grid.search action="{{ route('store.index') }}" />
                @can('user create')
                    <x-admin.add-link href="{{ route('store.create') }}">
                        {{ __('Add User') }}
                    </x-admin.add-link>
                @endcan
            </div>
            <x-admin.grid.table>
                <x-slot name="head">
                    <tr>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Name', 'attribute' => 'name'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Email', 'attribute' => 'email'])
                        </x-admin.grid.th>
                        <x-admin.grid.th>
                            @include('admin.includes.sort-link', ['label' => 'Create', 'attribute' => 'created_at'])
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
                                <a href="{{route('store.show', $user->id)}}" class="no-underline hover:underline text-cyan-600">{{ $user->name }}</a>
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $user->email }}
                            </div>
                        </x-admin.grid.td>
                        <x-admin.grid.td>
                            <div class="text-sm text-gray-900">
                                {{ $user->created_at }}
                            </div>
                        </x-admin.grid.td>
                            <x-admin.grid.td style="width: 150px">

                                <x-admin.form.groupe-buttons>
                                    @can('user edit')
                                    <x-admin.form.button-link href="{{route('user.edit', $user->id)}}" >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                    </x-admin.form.button-link>

                                    @endcan
                                    @can('user delete')
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">

                                                    @csrf
                                                    @method('DELETE')
                                                    <x-admin.form.button class="text-slate-800 hover:text-blue-900 text-sm  hover:bg-slate-600 border border-slate-200 rounded-l-lg font-medium  px-4 py-2  inline-flex space-x-1 items-center ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    </x-admin.form.button>
                                        </form>
                                    @endcan

                                </x-admin.form.groupe-buttons>
                            </x-admin.grid.td>
                    </tr>
                    @endforeach
                    @if($users->isEmpty())
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
        <div class="py-8">
            {{ $users->appends(request()->query())->links() }}
        </div>
    </div>
</x-admin.wrapper>
