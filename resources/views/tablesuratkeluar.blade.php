@extends('components.layouts.app')

@section('content')

@if (session('success'))
    <div id="success-notification" class="mb-4 p-4 rounded bg-green-100 text-green-800 border border-green-300">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            const notification = document.getElementById('success-notification');
            if (notification) notification.style.display = 'none';
        }, 3000);
    </script>
@endif

<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Daftar Surat Keluar</h2>
        <form id="searchForm" method="GET" class="flex">
            <input type="text" name="search" id="searchInput" value="{{ request('search') }}" placeholder="Cari surat..." class="border border-gray-300 rounded-l px-3 py-2 focus:outline-none focus:ring focus:border-blue-300" {{ request('search') ? 'autofocus' : '' }}>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">Cari</button>
        </form>
        <script>
            const input = document.getElementById('searchInput');
            const form = document.getElementById('searchForm');
            let timeout = null;

            input.addEventListener('input', function () {
                clearTimeout(timeout);
                timeout = setTimeout(() => { form.submit(); }, 700);
            });
        </script>
    </div>

    <div class="mb-4">
        <a href="{{ route('halamanutama') }}" class="text-blue-600 hover:underline text-sm">← Kembali ke Halaman Utama</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nomor Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tanggal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Sifat Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Lampiran</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Hal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tujuan Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @if($suratKeluar->count() > 0)
                    @foreach ($suratKeluar as $index => $surat)
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $suratKeluar->firstItem() + $index }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->nomor_surat }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->tanggal_surat }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->sifat_surat }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->lampiran }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->hal }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $surat->tujuan_surat }}</td>
                        <td class="px-4 py-2 text-sm">
                            <div class="flex space-x-2">
                                <a href="{{ route('suratkeluar.show', $surat->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded shadow"
                                title="Lihat Surat">🔍</a>
                                <a href="{{ route('suratkeluar.edit', $surat->id) }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white text-xs font-semibold px-3 py-1.5 rounded shadow"
                                title="Edit Surat">✏️</a>
                                <form action="{{ route('suratkeluar.destroy', $surat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus surat ini?')" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1.5 rounded shadow" title="Hapus Surat">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-sm text-gray-500 text-center">Tidak ada data surat keluar.</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="px-4 py-2 text-sm text-gray-500 text-center">Tidak ada data surat keluar.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $suratKeluar->withQueryString()->links('pagination::tailwind') }}
    </div>
</div>
@endsection
