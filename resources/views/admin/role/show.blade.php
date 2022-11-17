<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Roles') }}
    </x-slot>

    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('role.index')}}" title="{{ __('View role') }}">{{ __('<< Back to all roles') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white">
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Name') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$role->name}}</td>
                    </tr>
                    <tr>
                    @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Permissions') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">

                        <div class="py-2">
                            <div class="grid grid-cols-4 gap-4">
                                @forelse ($permissions as $permission)
                                    <div class="col-span-4 sm:col-span-2 md:col-span-2">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ in_array($permission->id, $roleHasPermissions) ? 'checked' : '' }} disabled="disabled" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @empty
                                    ----
                                @endforelse
                            </div>
                        </div>
                        </td>
                    </tr>
                    @endunless
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Created') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$role->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>

