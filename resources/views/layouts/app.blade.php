<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
        />
        <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    @stack('styles')
        <!-- Scripts -->
    </head>
    <body class="font-sans antialiased">
        <div class="flex flex-wrap bg-gray-100">

            @include('layouts.sidbare')

            <!-- Page Heading -->


            <!-- Page Content -->
            <main class="w-10/12">

                @include('layouts.navigation')
                <div class="p-4 text-gray-500">
                    @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-8xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                    {{ $slot }}
                </div>
            </main>


        </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        @stack('scripts')

    </body>
</html>
