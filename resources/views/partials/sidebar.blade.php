<aside class="w-64 bg-black text-white min-h-screen p-4">
    <div class="mb-6">
        <h2 class="text-yellow-400 font-bold">Raja Putra Media</h2>
        <p class="text-gray-400 text-sm">Superadmin</p>
    </div>

    <nav class="space-y-2">
        <a href="{{ route('halamanutama') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('halamanutama') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">dashboard</span> Dashboard
        </a>

        <!-- <a href="#" class="flex items-center p-2 hover:bg-gray-800 rounded">
            <span class="material-icons mr-2">settings</span> Setup Management
        </a> -->

        <!-- <a href="#" class="flex items-center p-2 hover:bg-gray-800 rounded">
            <span class="material-icons mr-2">folder</span> Data Master
        </a> -->

        <a href="{{ route('inputsuratmasuk') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('inputsuratmasuk') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">mail</span> Input Surat Masuk
        </a>

        <a href="{{ route('inputsuratkeluar') }}"
           class="flex items-center p-2 rounded {{ request()->routeIs('inputsuratkeluar') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">mail</span> Input Surat Keluar
        </a>

        <!-- <a href="#" class="flex items-center p-2 hover:bg-gray-800 rounded">
            <span class="material-icons mr-2">send</span> Surat Keluar
        </a> -->

        <a href="#"
           class="flex items-center p-2 rounded {{ request()->is('report') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">assessment</span> Report
        </a>

        <a href="#"
           class="flex items-center p-2 rounded {{ request()->is('backup') ? 'bg-blue-600 hover:bg-blue-700' : 'hover:bg-gray-800' }}">
            <span class="material-icons mr-2">cloud_download</span> Backup Database
        </a>
    </nav>
</aside>
