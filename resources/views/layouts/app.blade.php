<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <main x-data="{ showSidebar: false }" class="relative flex w-full flex-col md:flex-row overflow-hidden">
        {{-- overlay for when the Sidebar is open on Smaller Screens --}}

        <div x-cloak x-show="showSidebar" class="fixed inset-0 z-10 bg-slate-900/10 backdrop-blur-sm md:hidden"
            @click="showSidebar = false" x-transition.opacity>
        </div>

        @include('layouts.sidebar')

        <div class="h-svh w-full overflow-y-auto bg-slate-100 dark:bg-slate-900 ">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </main>

    <x-notification-system />

    @stack('scripts')
</body>

</html>
