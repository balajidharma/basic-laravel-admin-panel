<nav class="bg-white border-b border-gray-100">
    <div class="navbar bg-base-100 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                @isset($menus)
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    @foreach($menus as $menu)
                    <li>
                        <a href="{{ $menu['link'] }}">
                            {{ $menu['name'] }}
                            @isset($menu['children'])
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                            </svg>
                            @endisset
                        </a>
                        @isset($menu['children'])
                        <ul class="bg-base-100 p-2">
                            @foreach($menu['children'] as $child)
                            <li><a href="{{ $child['link'] }}">{{ $child['name'] }}</a></li>
                            @endforeach
                        </ul>
                        @endisset
                    </li>
                    @endforeach
                </ul>
                @endisset
            </div>
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <div class="navbar-center hidden lg:flex">
            @isset($menus)
            <ul class="menu menu-horizontal px-1">
                @foreach($menus as $menu)
                <li>
                    <a href="{{ $menu['link'] }}">
                        {{ $menu['name'] }}
                        @isset($menu['children'])
                        <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 24 24">
                            <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                        </svg>
                        @endisset
                    </a>
                    @isset($menu['children'])
                    <ul class="bg-base-100 p-2">
                        @foreach($menu['children'] as $child)
                        <li><a href="{{ $child['link'] }}">{{ $child['name'] }}</a></li>
                        @endforeach
                    </ul>
                    @endisset
                </li>
                @endforeach
            </ul>
            @endisset
        </div>
        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="justify-between">
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
