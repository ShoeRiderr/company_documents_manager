<html>

<head>
    <title>App Name - @yield('title')</title>
    @livewireStyles
    @vite('resources/css/app.css')
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
