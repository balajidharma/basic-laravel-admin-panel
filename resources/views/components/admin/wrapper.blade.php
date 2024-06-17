<x-admin.layout>
    <x-slot name="header">
        {{ $title }}
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto">
            <x-admin.message />
            <div class="bg-base-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 border-b border-base-200">
                    <div class="flex flex-col">
                        <div>
                            <x-admin.breadcrumb />
                            <x-admin.form.errors />
                        </div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>
