<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Amafilimi.xyz')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-900 text-white font-sans antialiased">

    <x-navigations></x-navigations>

    <main class="w-full">
        @yield('content')
    </main>

    <x-footer></x-footer>

</body>

</html>