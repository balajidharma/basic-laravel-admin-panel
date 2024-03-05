@isset($menus)
<ul class="menu pt-2 w-80 bg-base-100 text-base-content min-h-full">
    <label for="drawer" class="btn btn-ghost bg-base-300 btn-circle z-50 top-0 right-0 mt-2 mr-2 absolute lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-5 inline-block w-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
    </label>
    <li class="mb-2 font-semibold text-xl">
        <a href="{{ route('admin.dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current" />Admin Panel
        </a>
    </li>
    @foreach($menus as $menu)
    <li>
        <a href="{{ $menu['link'] }}" class="{{ (request()->is(ltrim($menu['link'], '/'))) ? 'active' : '' }}">
            @if($menu['icon'])
            <x-admin.base-icon path="{{$menu['icon']}}" />
            @endif
            {{ $menu['name'] }}
        </a>
        @isset($menu['children'])
        <ul class="bg-base-100 p-2">
            @foreach($menu['children'] as $child)
            <li><a href="{{ $child['link'] }}" class="{{ (request()->is(ltrim($child['link'], '/'))) ? 'active' : '' }}">{{ $child['name'] }}</a></li>
            @endforeach
        </ul>
        @endisset
    </li>
    @endforeach
</ul>
@endisset
    