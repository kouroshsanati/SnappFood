<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner/>


<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->


    <main>
        <div class="py-12">


            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if($errors->any())
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2 mb-8">
                        <x-validation-errors/>
                    </div>
                @endif
                @if( $message = session('success'))
                    <div class="color-white overflow-hidden bg-green-600 shadow-xl sm:rounded-lg p-2 mb-8">
                        {{$message}}
                    </div>
                @endif
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-2">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </main>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
