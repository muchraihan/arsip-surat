@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Detail Surat Masuk</h2>
        <a href="{{ route('suratmasuk.index') }}" class="text-blue-600 hover:underline text-sm">← Kembali</a>
    </div> 

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <div>
            <p class="text-sm text-gray-600">Nomor Surat</p>
            <p class="font-medium text-gray-800">{{ $surat->nomor_surat }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Tanggal Surat</p>
            <p class="font-medium text-gray-800">{{ $surat->tanggal_surat }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Pengirim</p>
            <p class="font-medium text-gray-800">{{ $surat->pengirim }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Perihal</p>
            <p class="font-medium text-gray-800">{{ $surat->perihal }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Kategori</p>
            <p class="font-medium text-gray-800">{{ $surat->kategori }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Status Surat</p>
            <p class="font-medium text-gray-800">{{ $surat->status_surat }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Sifat Surat</p>
            <p class="font-medium text-gray-800">{{ $surat->sifat_surat }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Tujuan Surat</p>
            <p class="font-medium text-gray-800">{{ $surat->tujuan_surat }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Petunjuk</p>
            <p class="font-medium text-gray-800">{{ $surat->petunjuk }}</p>
        </div>
        <div>
            <p class="text-sm text-gray-600">Catatan</p>
            <p class="font-medium text-gray-800">{{ $surat->catatan ?? '-' }}</p>
        </div>
        <div class="md:col-span-2">
            <p class="text-sm text-gray-600">Isi Disposisi</p>
            <p class="font-medium text-gray-800 whitespace-pre-line">{{ $surat->isi_disposisi ?? '-' }}</p>
        </div>
        <div class="md:col-span-2">
            <p class="text-sm text-gray-600">Disposisi Kasubbag</p>
            <p class="font-medium text-gray-800 whitespace-pre-line">{{ $surat->disposisi_kasubbag ?? '-' }}</p>
        </div>
    </div>

    {{-- File surat --}}
    <div class="mt-6">
        <p class="text-sm text-gray-600 mb-2 font-semibold">📄 File Surat:</p>

        @if($surat->file)
            <div class="flex flex-col md:flex-row items-start md:items-center gap-3">
                <a href="{{ asset('storage/' . $surat->file) }}" 
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-green-700 transition"
                target="_blank">
                    🔍 Buka Surat
                </a>

                <a href="{{ asset('storage/surat_masuk/' . $surat->file) }}" 
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow hover:bg-blue-700 transition"
                download>
                    ⬇️ Download Surat
                </a>
            </div>
        @else
            <p class="text-red-500 italic">File surat tidak tersedia.</p>
        @endif
    </div>
</div>
@endsection
