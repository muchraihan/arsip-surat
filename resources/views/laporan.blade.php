@extends('components.layouts.app') {{-- Pastikan ini sesuai dengan layout kamu --}}

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4 text-gray-800">Unduh Laporan Surat Masuk & Surat Keluar</h2>

    {{-- Form Surat Masuk --}}
    <form method="GET" action="{{ route('laporan.suratmasuk') }}" class="mb-6">
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal Awal Surat Masuk:</label>
            <input type="date" name="start_date" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal Akhir Surat Masuk:</label>
            <input type="date" name="end_date" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Unduh Surat Masuk (CSV)
        </button>
    </form>

    {{-- Form Surat Keluar --}}
    <form method="GET" action="{{ route('laporan.suratkeluar') }}">
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal Awal Surat Keluar:</label>
            <input type="date" name="start_date" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <div class="mb-2">
            <label class="block text-sm font-medium text-gray-700">Tanggal Akhir Surat Keluar:</label>
            <input type="date" name="end_date" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Unduh Surat Keluar (CSV)
        </button>
    </form>
</div>
@endsection
