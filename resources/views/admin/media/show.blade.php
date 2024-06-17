<x-admin.wrapper>
    <x-slot name="title">
            {{ __('Media') }}
    </x-slot>

    <div class="w-full py-2">
        <div class="min-w-full border-base-200 shadow">
            <table class="table-fixed w-full text-sm">
                <tbody>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Type') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$media->variant_name}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Name') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$media->basename}}</td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('File') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">
                        <div class="avatar">
                            <div class="w-32 rounded">
                                @if ($media->aggregate_type != 'image')
                                    {!! media_type_icon($media) !!}
                                @else    
                                <image src="{{ $media->getUrl() }}" alt="{{ $media->alt }}">
                                @endif
                            </div>
                        </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ __('Created') }}</td>
                        <td class="border-b border-slate-100 p-4 text-slate-500">{{$media->created_at->toDateTimeString()}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-admin.wrapper>
