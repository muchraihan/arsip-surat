<aside class="w-64 bg-gray-800 text-white min-h-screen p-6 flex flex-col">
    <div class="mb-6">
        <h2 class="text-yellow-400 font-bold">{{ Auth::user()->name }}</h2>
        <p class="text-gray-400 text-sm">{{ Auth::user()->role ?? 'No Role' }}</p>
    </div>

    <nav class="space-y-2 flex-1">
        <a href="{{ route('halamanutama') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('halamanutama') ? 'bg-green-600 hover:bg-green-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">dashboard</span> Dashboard
        </a>

        <a href="{{ route('inputsuratmasuk') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('inputsuratmasuk') ? 'bg-green-600 hover:bg-green-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">mail</span> Input Surat Masuk
        </a>

        <a href="{{ route('inputsuratkeluar') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('inputsuratkeluar') ? 'bg-green-600 hover:bg-green-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">mail</span> Input Surat Keluar
        </a>

        <!-- @auth
        @if(Auth::user()->role=='admin')
        <a href="{{route('register')}}"
           class="flex items-center p-2 rounded {{ request()->routeIs('.') ? 'bg-green-600 hover:bg-green-700': 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">person_add</span> Input User
        </a>
        @endif
        @endauth -->

        <a href="{{ route('laporan.index') }}"
           class="flex items-center p-2 rounded {{ request()->is('laporan') ? 'bg-green-600 hover:bg-green-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">assessment</span> Report
        </a>

        <!-- <a href="#"
           class="flex items-center p-2 rounded {{ request()->is('backup') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">cloud_download</span> Backup Database
        </a> -->
    </nav>
</aside>
