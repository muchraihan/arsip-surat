@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Edit Surat Keluar</h2>
        <a href="{{ route('suratkeluar.index') }}" class="text-blue-600 hover:underline text-sm">← Kembali</a>
    </div>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('suratkeluar.update', $surat->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Kolom Kiri --}}
            <div>
                <div class="mb-4">
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ $surat->nomor_surat }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ $surat->tanggal_surat }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="sifat_surat" class="block text-sm font-medium text-gray-700">Sifat Surat</label>
                    <select name="sifat_surat" id="sifat_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @foreach(['Penting', 'Segera', 'Biasa'] as $sifat)
                            <option value="{{ $sifat }}" {{ $surat->sifat_surat == $sifat ? 'selected' : '' }}>{{ $sifat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran</label>
                    <input type="text" name="lampiran" id="lampiran" value="{{ $surat->lampiran }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div>
                <div class="mb-4">
                    <label for="hal" class="block text-sm font-medium text-gray-700">Hal</label>
                    <input type="text" name="hal" id="hal" value="{{ $surat->hal }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                    <select name="tujuan_surat" id="tujuan_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @php
                            $tujuanList = ['Kepala kantor', 'Kasubbag TU', 'PHU', 'Bimas Islam', 'Pend. Agama & Keagamaaan Islam', 'Pend. Madrasah', 'Penyelenggara Zakat dan Wakaf', 'Penyelenggara Kristen', 'Penyelenggara Katolik', 'Perencana', 'Keuangan', 'Kepegawaian', 'Barang Milik Negara', 'Humas', 'Umum'];
                        @endphp
                        @foreach($tujuanList as $tujuan)
                            <option value="{{ $tujuan }}" {{ $surat->tujuan_surat == $tujuan ? 'selected' : '' }}>{{ $tujuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="file" class="block text-sm font-medium text-gray-700">Ganti File Surat (opsional)</label>
                    <input type="file" name="file" id="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <p class="text-xs text-gray-500 mt-1">* Kosongkan jika tidak ingin mengganti file</p>
                </div>
            </div>
        </div>

        {{-- Tombol --}}
        <div class="mt-6 flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            <a href="{{ route('suratkeluar.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
        </div>
    </form>
</div>
@endsection
