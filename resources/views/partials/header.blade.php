<head>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<header class="bg-green-700 shadow p-4 flex justify-between items-center">
    <div class="flex items-center">
        <img src="{{ asset('logokemenag.png') }}" alt="Logo Kemenag" class="w-8 h-8 mr-2">
        <span class="font-bold text-lg text-white">Arsip-Surat <span class="text-white">Kemenag</span></span>
    </div>

    @auth
    <div class="relative" x-data="{ open: false }" @click.away="open = false">
        {{-- Tombol pemicu dropdown --}}
        <button @click="open = !open" class="focus:outline-none">
            <span class="material-icons text-white text-2xl">account_circle</span>
        </button>

        {{-- KODE PENTING: HAPUS KELAS 'hidden' DARI SINI --}}
        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg py-1 z-50">
            {{-- Konten dropdown tetap sama --}}
            <div class="block px-4 py-2 text-sm text-gray-700">
                <p class="font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->role ?? 'No Role' }}</p>
            </div>
            <div class="border-t border-gray-100 my-1"></div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                    Logout
                </button>
            </form>
        </div>
    </div>
    @endauth
</header>