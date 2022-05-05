<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6">
                    <h1 class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">{{ __('View role') }}</h1>
                    <a href="{{route('role.index')}}" class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ __('<< Back to all role') }}</a>
                    @if ($errors->any())
                        <ul class="mt-3 list-none list-inside text-sm text-red-400">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="w-full px-6 py-4">
                    <div class="min-w-full border-b border-gray-200 shadow">
                        <table class="table-fixed w-full text-sm">
                            <tbody class="bg-white dark:bg-slate-800">
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Name') }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$role->name}}</td>
                                </tr>
                                <tr>
                                @unless ($role->name == env('APP_SUPER_ADMIN', 'super-admin'))
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Permissions') }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">

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
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ __('Created') }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">{{$role->created_at}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
