@props(['title' => ''])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{$title}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
    @stack('styles')
    <script type="text/javascript" src="{{asset('/js/app.js')}}" defer></script>
    <!-- Scripts -->
    @stack('script')
    <style>
        *{
            transition : all 0.2s;
        }
        [x-cloak]{
            display:  none;
        }
    </style>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">
    <!-- Page Content -->
    <main>
        {{ $slot }}
        <x-notification-tracker></x-notification-tracker>
    </main>
</div>
@stack('modals')
@livewireScripts
@stack('body-script')
</body>

</html>
