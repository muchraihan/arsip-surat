<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arsip-Surat Kemenag</title>
    <link rel="icon" type="image/png" href="{{ asset('logokemenag.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @include('partials.header')
    <div class="flex">
        @include('partials.sidebar')
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
    @include('partials.footer')
</body>
</html>
