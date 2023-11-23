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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
       <nav  class="sticky top-0">
        @include('layouts.navigation')
       </nav>
        <div class="min-h-screen justify-center bg-gray-100">
            <!-- Page Content -->
            <main class="flex items-center justify-center sticky top-20">
                    <div class="card card-compact w-72 bg-base-100 shadow-xl">
                        @foreach ($siarans as $siarans)
                            <figure><img src="{{ asset('storage/'.$siarans->poster) }}" alt="SS-siaran" /></figure>
                        <div class="card-body">
                        <p>{{ $siarans->judul }}</p>
                        @endforeach
                        </div>
                    </div>
            </main>
            
        </div>
       
        <footer class="sticky bottom-0">
            @include('layouts.navigation-bottom')
        </footer>
    </body>
</html>
