<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arsip-Surat Kemenag</title>
    <link rel="icon" type="image/png" href="{{ asset('logokemenag.png') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    @include('partials.header')

    <div class="flex flex-1">
        @include('partials.sidebar')

        <main class="flex-1 p-6 pb-28"> {{-- Tambah padding bawah untuk cegah bentrok dengan footer --}}
            @yield('content')
        </main>
    </div>

    @include('partials.footer')
</body>
</html>
