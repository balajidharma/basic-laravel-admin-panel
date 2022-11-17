<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Permissions') }}
    </x-slot>

    <div class="d-print-none with-border">
        <x-admin.breadcrumb href="{{route('permission.index')}}" title="{{ __('View permission') }}">{{ __('<< Back to all permissions') }}</x-admin.breadcrumb> 
    </div>
    <div class="w-full py-2">
        <div class="min-w-full border-b border-gray-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody class="bg-white">
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Name') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$permission->name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Created') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$permission->created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>
