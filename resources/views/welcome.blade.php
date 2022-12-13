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
<div class="bg-gray-100">



<!-- Page Heading -->


    <!-- Page Content -->
    <main >
        <!-- component -->
        <!-- component -->
        <!-- follow me on twitter @asad_codes -->

        <!-- component -->
        <nav class="relative select-none bg-grey lg:flex lg:items-stretch w-full">
            <div class="flex flex-no-shrink items-stretch h-12">
                <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Tailwind</a>
                <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Css</a>
                <button class="block lg:hidden cursor-pointer ml-auto relative w-12 h-12 p-4">
sdfsdf
                </button>
            </div>
            <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
                <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                    <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Item 1</a>
                    <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Item 2</a>
                    <a href="#" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Item 3</a>
                </div>
            </div>
        </nav>
        <div class="p-4 w-12 border-2 text-gray-500">
        </div>
    </main>


</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')

</body>
</html>
