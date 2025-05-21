@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Daftar Surat Keluar</h2>
        <form method="GET" class="flex">
            <input
                type="text"
                name="search"
                placeholder="Cari surat..."
                class="border border-gray-300 rounded-l px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
            >
            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700"
            >
                Cari
            </button>
        </form>
    </div>

    {{-- Tombol Kembali --}}
    <div class="mb-4">
        <a href="{{ route('halamanutama') }}" class="text-blue-600 hover:underline text-sm">← Kembali ke Halaman Utama</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">#</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nomor Surat</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Tanggal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Pengirim</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Perihal</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                {{-- Contoh data statis --}}
                @for ($i = 1; $i <= 5; $i++)
                <tr>
                    <td class="px-4 py-2 text-sm text-gray-700">{{ $i }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">SM-00{{ $i }}/2025</td>
                    <td class="px-4 py-2 text-sm text-gray-700">2025-05-1{{ $i }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">Instansi {{ $i }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700">Perihal Surat {{ $i }}</td>
                    <td class="px-4 py-2 text-sm">
                        <a href="{{ route('suratkeluar') }}" class="text-blue-600 hover:underline text-sm">Lihat</a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
@endsection
