@extends('components.layouts.app')

@section('content')

@if (session('success'))
    <div 
        id="success-notification" 
        class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300"
    >
        {{ session('success') }}
    </div>

    <script>
        // Setelah 3 detik, sembunyikan notifikasi
        setTimeout(() => {
            const notification = document.getElementById('success-notification');
            if (notification) {
                // Bisa kamu tambahkan animasi fade out dengan CSS jika mau
                notification.style.display = 'none';
            }
        }, 3000);
    </script>
@endif

<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Daftar Surat Masuk</h2>
        <form id="searchForm" method="GET" class="flex">
            <input
                type="text"
                name="search"
                id="searchInput"
                value="{{ request('search') }}"
                placeholder="Cari surat..."
                class="border border-green-700 rounded-l px-3 py-2 focus:outline-none focus:ring focus:border-green-300"
                {{ request('search') ? 'autofocus' : '' }}
            >
            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-r hover:bg-green-700"
            >
                Cari
            </button>
        </form>

        <script>
            const input = document.getElementById('searchInput');
            const form = document.getElementById('searchForm');
            let timeout = null;

            input.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    form.submit();
                }, 700);
            });

            window.addEventListener('DOMContentLoaded', () => {
                if (input.value.length > 0) {
                    input.focus();
                    input.setSelectionRange(input.value.length, input.value.length);
                }
            });
        </script>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('halamanutama') }}" class="text-blue-600 hover:underline text-sm">← Kembali ke Halaman Utama</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-red-200">
            <thead class="bg-green-700">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Nomor Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Tanggal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Pengirim</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Perihal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Tujuan Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Petunjuk Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($suratMasuk as $index => $surat)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $suratMasuk->firstItem() + $index }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->nomor_surat }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->tanggal_surat }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->pengirim }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->perihal }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->tujuan_surat }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->petunjuk }}</td>
                    <td class="px-4 py-2 text-sm">
                        <div class="flex space-x-2">
                            <a href="{{ route('suratmasuk.show', $surat->id) }}"
                                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded shadow transition duration-200"
                                title="Lihat Surat">
                                🔍
                            </a>
                            <a href="{{ route('suratmasuk.edit', $surat->id) }}"
                                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded shadow transition duration-200"
                                title="Edit Surat">
                                ✏️
                            </a>
                            <form action="{{ route('suratmasuk.destroy', $surat->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus surat ini?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1.5 rounded shadow transition duration-200"
                                    title="Hapus Surat">
                                    🗑️
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-4 py-2 text-sm text-gray-500 text-center">Tidak ada data surat masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $suratMasuk->withQueryString()->links('pagination::tailwind') }}
    </div>
</div>
@endsection
