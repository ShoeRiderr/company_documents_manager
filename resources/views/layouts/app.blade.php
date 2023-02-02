<html>

<head>
    <title>App Name - @yield('title')</title>
    @livewireStyles
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>
</head>

<body>
    @section('navbar')
        @include('layouts.navbar')
    @show

    <div class="flex sm:flex-row flex-col h-full">
        @section('sidebar')
            @include('layouts.sidebar')
        @show

        <div class="container">
            @yield('content')
        </div>
    </div>
    @livewireScripts
</body>

</html>
