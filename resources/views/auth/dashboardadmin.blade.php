<!-- resources/views/dashboard.blade.php -->
<x-layouts.app>
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-black text-white flex flex-col px-6 py-6">
            <div class="mb-6">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('public.logokemenag.png') }} alt="Logo" class="h-8 w-8">
                    <h1 class="font-bold text-lg">
                        <span class="text-white">Arsip-Surat</span> <span class="text-green-400">Kemenag</span>
                    </h1>
                </div>
            </div>

            <div class="mb-8">
                <p class="font-semibold text-yellow-400">{{ Auth::user()->name }}</p>
                <p class="text-sm text-gray-400">Superadmin</p>
            </div>

            <nav class="flex-1 space-y-2">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2 px-3 py-2 bg-blue-600 rounded text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 13h8V3H3v10zm10 8h8v-6h-8v6zm0-8h8v-2h-8v2zm0-4h8V7h-8v2z"/></svg>
                    Dashboard
                </a>
                <a href="{{ route('suratmasuk.create') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-700 rounded">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M2 6h20v2H2zm0 5h20v2H2zm0 5h14v2H2z"/></svg>
                    Input Surat Masuk
                </a>
                <a href="{{ route('suratkeluar.create') }}" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-700 rounded">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M2 6h20v2H2zm0 5h20v2H2zm0 5h14v2H2z"/></svg>
                    Input Surat Keluar
                </a>
                <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-700 rounded">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h2v18H3zm16 0h2v18h-2zM8 9h8v2H8zm0 4h8v2H8z"/></svg>
                    Report
                </a>
                <a href="#" class="flex items-center gap-2 px-3 py-2 hover:bg-gray-700 rounded">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a10 10 0 100 20 10 10 0 000-20zM6 11h12v2H6v-2z"/></svg>
                    Backup Database
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">
                    Dashboard <span class="text-sm text-gray-500">Overview & statistic</span>
                </h2>
                <div class="text-sm text-gray-600">
                    Welcome, <strong>{{ Auth::user()->name }}</strong>
                    <svg class="inline w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                    </svg>
                </div>
            </header>

            <!-- Cards -->
            <main class="flex-1 p-6 bg-gray-100">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Surat Masuk -->
                    <div class="bg-purple-600 text-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">SURAT MASUK</h3>
                            <svg class="w-6 h-6 text-purple-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M2 6h20v2H2zm0 5h20v2H2z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold">6</p>
                        <a href="#" class="mt-4 inline-block text-sm underline hover:text-purple-200">View Detail</a>
                    </div>

                    <!-- Surat Keluar -->
                    <div class="bg-orange-500 text-white p-6 rounded-lg shadow">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold">SURAT KELUAR</h3>
                            <svg class="w-6 h-6 text-orange-200" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M3 6h18v2H3zm0 5h12v2H3zm0 5h18v2H3z"/>
                            </svg>
                        </div>
                        <p class="text-3xl font-bold">6</p>
                        <a href="#" class="mt-4 inline-block text-sm underline hover:text-orange-200">View Detail</a>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.app>
