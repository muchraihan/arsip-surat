@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Detail Surat Masuk</h2>
        <a href="{{ route('tablesuratmasuk') }}" class="text-blue-600 hover:underline text-sm">← Kembali</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-sm text-gray-600">Nomor Surat</p>
            <p class="font-medium text-gray-800">SM-001/2025</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Tanggal Surat</p>
            <p class="font-medium text-gray-800">2025-05-18</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Pengirim</p>
            <p class="font-medium text-gray-800">Dinas Pendidikan</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Perihal</p>
            <p class="font-medium text-gray-800">Undangan Rapat Koordinasi</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Disposisi</p>
            <p class="font-medium text-gray-800">Kepala</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Isi Disposisi</p>
            <p class="font-medium text-gray-800">Mohon ditindaklanjuti oleh bagian umum</p>
        </div>
    </div>

    <div class="mt-4">
        <p class="text-sm text-gray-600 mb-2">File Surat:</p>

        <iframe src="/storage/surat/contoh-surat.pdf" class="w-full h-64 border rounded"></iframe>

        <div class="mt-3 relative z-10">
            <a
                href="/storage/surat/contoh-surat.pdf"
                download
                class="bg-green-600 text-black px-4 py-2 rounded hover:bg-green-700 inline-block"
            >
                Download Surat
            </a>
        </div>
    </div>
</div>
@endsection
