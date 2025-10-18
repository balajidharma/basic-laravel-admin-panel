<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/vendor/laravel-admin/app.scss', 'resources/js/vendor/laravel-admin/app.js', 'resources/js/vendor/laravel-admin/form-builder/field.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="bg-base-100 drawer lg:drawer-open">
            <input id="drawer" type="checkbox" class="drawer-toggle">
            <div class="drawer-content flex flex-col">
                <!-- Page Heading -->
                <div class="navbar flex justify-between bg-base-100 z-10 shadow-md">
                    <div class="">
                        <label for="drawer" class="btn btn-primary drawer-button lg:hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="h-5 inline-block w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                            </svg>
                        </label>
                        <h1 class="text-2xl font-semibold ml-2">{{ $header }}</h1>
                    </div>
                    <div class="order-last">
                        <label class="swap">
                            <input class="hidden" id="theme-change" type="checkbox" />
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                                data-set-theme="light"
                                data-act-class="ACTIVECLASS"
                                class="fill-current w-6 h-6 swap-off ACTIVECLASS"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                ></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true"
                                data-set-theme="dark"
                                data-act-class="ACTIVECLASS"
                                class="fill-current w-6 h-6 swap-on">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                                ></path>
                            </svg>
                        </label>
                        <div class="dropdown dropdown-end ml-4">
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
                            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
                                <li class="justify-between">
                                    <a href="{{ route('profile.edit') }}">
                                        {{ __('Profile') }}
                                    </a>
                                </li>
                                <div class="divider mt-0 mb-0"></div>
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
                <!-- Page Content -->
                <main class="flex-1 overflow-y-auto p-4 bg-base-200">
                    {{ $slot }}
                </main>
            </div>
            <div class="drawer-side z-40">
                <label for="drawer" class="drawer-overlay" aria-label="Close menu"></label>
                @include('laravel-admin::layouts.navigation')
            </div>
        </div>
    </body>
</html>
