<!DOCTYPE html>
<html>
<head>
    <title>PSM</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

</body>
</html>
